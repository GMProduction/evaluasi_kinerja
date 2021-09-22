<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Indicator;
use App\Models\Package;
use App\Models\Score;
use App\Models\ScoreHistory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ScoreController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDatatable()
    {
        $query = Package::with(['vendor.vendor', 'ppk'])->where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]]);
        return $query;
    }

    public function datatable()
    {
        $roles = auth()->user()->roles[0];
        $userId = Auth::id();
        $query = $this->getDatatable();
        if ($roles === 'vendor') {
            $query->where('vendor_id', $userId);
        }

        if ($roles === 'accessorppk') {
            $query->whereHas('ppk.accessorppk.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            });
        }
        return DataTables::of($query)->make(true);
    }

    public function datatableByVendorId($id)
    {
        $roles = auth()->user()->roles[0];
        $query = $this->getDatatable();
        if ($roles === 'accessor') {
            $query->where('vendor_id', '=', $id);
        }
//        $data = $this->getDatatable();
        return DataTables::of($query)->make(true);
    }

    public function index()
    {
        return view('superuser.penilaian.penilaian');
    }

    public function detail($id)
    {
        $roles = auth()->user()->roles[0];
        $userId = Auth::id();
        $query = Package::with(['vendor.vendor', 'ppk'])
            ->where(
                [
                    ['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))],
                    ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]
                ]
            )->where('id', $id);
        if ($roles === 'vendor') {
            $query->where('vendor_id', $userId);
        }

        if ($roles === 'accessorppk') {
            $query->whereHas('ppk.accessorppk.user', function ($query) use ($userId) {
                $query->where('id', $userId);
            });
        }
//        $data = Package::with(['vendor.vendor', 'ppk'])->where('id', $id)->firstOrFail();
        $data = $query->firstOrFail();
        return view('superuser/penilaian/detail-penilaian')->with(['data' => $data]);
    }

    public function lastUpdate()
    {
        try {
            $packageId = request()->query->get('package');
            $type = request()->query->get('type');
            $score = Score::with('subIndicator')->where('package_id', $packageId)->where('type', $type)->orderBy('updated_at', 'DESC')->first();
            return response()->json([
                'msg' => 'success',
                'data' => $score
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..'], 500);
        }
    }

    public function getScore()
    {
        try {
            $packageId = request()->query->get('package');
            $type = request()->query->get('type');
            $data = Indicator::with(['subIndicator.singleScore' => function ($query) use ($packageId, $type) {
                $query->where('package_id', $packageId)->where('type', $type);
            }, 'subIndicator.scoreHistory' => function ($query) use ($packageId, $type) {
                $query->where('package_id', $packageId)->where('type', $type);
            }])->get();
            return response()->json([
                'msg' => 'success',
                'data' => [
                    'indicator' => $data->toArray()
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..'], 500);
        }
    }

    public function setScore()
    {
        try {
            $subIndicatorId = $this->postField('sub_indicator');
            $packageId = $this->postField('package');
            $value = (int)$this->postField('value');
            $type = $this->postField('index');
            $authorId = Auth::id();
            $scoreText = 'bad';
            switch ($value) {
                case 1:
                    $scoreText = 'bad';
                    break;
                case 2:
                    $scoreText = 'medium';
                    break;
                case 3:
                    $scoreText = 'good';
                    break;
                default:
                    break;
            }

            $vType = 'default';
            switch ($type) {
                case 'vendor':
                    $vType = 'vendor';
                    break;
                case 'accessor':
                    $vType = 'office';
                    break;
                case 'accessorppk':
                    $vType = 'ppk';
                    break;
                default:
                    break;
            }
            $score = Score::where('package_id', $packageId)->where('type', $vType)->where('sub_indicator_id', $subIndicatorId)->first();
            DB::beginTransaction();
            if ($score !== null) {
                $cumulativeBefore = $this->getCumulative($packageId, $vType);
                $scoreBefore = $score->score;
                $scoreTextBefore = $score->text;
                $scoreFileBefore = $score->file;
                $score->score = $value;
                $score->text = $scoreText;
                $score->save();
                $cumulativeAfter = $this->getCumulative($packageId, $vType);

                $data = [
                    'package_id' => $packageId,
                    'author_id' => $authorId,
                    'sub_indicator_id' => $subIndicatorId,
                    'type' => $vType,
                    'score_before' => $scoreBefore,
                    'score_text_before' => $scoreTextBefore,
                    'file_before' => $scoreFileBefore,
                    'score_after' => $value,
                    'score_text_after' => $scoreText,
                    'file_after' => $scoreFileBefore,
                    'cumulative_before' => $cumulativeBefore,
                    'cumulative_after' => $cumulativeAfter,
                ];

                $this->saveHistory($data);
            } else {
                $newScore = new Score();
                $newScore->package_id = $packageId;
                $newScore->evaluator_id = $authorId;
                $newScore->author_id = $authorId;
                $newScore->sub_indicator_id = $subIndicatorId;
                $newScore->score = $value;
                $newScore->text = $scoreText;
                $newScore->type = $vType;
                $newScore->save();
            }
            DB::commit();
            return response()->json(['msg' => 'success'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }

    private function saveHistory($data)
    {
        $packageId = $data['package_id'];
        $authorId = $data['author_id'];
        $subIndicatorId = $data['sub_indicator_id'];
        $type = $data['type'];
        $scoreBefore = $data['score_before'];
        $scoreTextBefore = $data['score_text_before'];
        $fileBefore = $data['file_before'];
        $scoreAfter = $data['score_after'];
        $scoreTextAfter = $data['score_text_after'];
        $fileAfter = $data['file_after'];
        $cumulativeBefore = $data['cumulative_before'];
        $cumulativeAfter = $data['cumulative_after'];

        $history = new ScoreHistory();
        $history->package_id = $packageId;
        $history->author_id = $authorId;
        $history->sub_indicator_id = $subIndicatorId;
        $history->type = $type;
        $history->score_before = $scoreBefore;
        $history->text_before = $scoreTextBefore;
        $history->file_before = $fileBefore;
        $history->score_after = $scoreAfter;
        $history->text_after = $scoreTextAfter;
        $history->file_after = $fileAfter;
        $history->score_total_before = $cumulativeBefore;
        $history->score_total_after = $cumulativeAfter;
        $history->save();
    }

    private function getCumulative($packageId, $type)
    {
        $data = Indicator::with(['subIndicator.singleScore' => function ($query) use ($packageId, $type) {
            $query->where('package_id', $packageId)->where('type', $type);
        }])->get();
        $arrData = $data->toArray();
        $result = [];
        $chkSum = 0;
        $scoreMin = 1;
        $scoreMax = 3;
        $comulativeTotal = 0;
        $goodScore = 0;
        $mediumScore = 0;
        $badScore = 0;
        $emptyScore = 0;
        foreach ($arrData as $v) {
            $index = $v['name'];
            $weight = $v['weight'];
            $value = 0;
            $subLength = count($v['sub_indicator']);
            $chkSum += $v['weight'];
            $min = ($scoreMin * $subLength);
            $max = ($scoreMax * $subLength);
            $maxFactor = round((100 * $weight), 2, PHP_ROUND_HALF_UP);
            $radarMin = 0;
            $radarMax = 10;
            $a = round(($radarMax - $radarMin) / ($max - $min), 3, PHP_ROUND_HALF_UP);
            $b = round($radarMax - ($max * $a), 0, PHP_ROUND_HALF_UP);
            foreach ($v['sub_indicator'] as $sub) {
                $tmpScore = $sub['single_score'] !== null ? $sub['single_score']['score'] : 0;
                $value += $tmpScore;
                if ($sub['single_score'] !== null) {
                    switch ($sub['single_score']['score']) {
                        case 1:
                            $badScore += 1;
                            break;
                        case 2:
                            $mediumScore += 1;
                            break;
                        case 3:
                            $goodScore += 1;
                            break;
                        default:
                            break;
                    }
                } else {
                    $emptyScore += 1;
                }
            }
            $checkConversion = ($a * $max) + $b;
            $a_cumulative = round(($maxFactor / ($max - $min)), 3, PHP_ROUND_HALF_UP);
            $b_cumulative = round(($maxFactor - ($max * $a_cumulative)), 3, PHP_ROUND_HALF_UP);
            $radar = 0;
            $cumulative = 0;
            if ($value > 0) {
                $radar = ($a * $value) + $b;
                $cumulative = ($a_cumulative * $value) + $b_cumulative;
                $comulativeTotal += round($cumulative, 2, PHP_ROUND_HALF_UP);
            }
            $transform = [
                'index' => $index,
                'weight' => $weight,
                'sub_length' => $subLength,
                'min' => $min,
                'max' => $max,
                'max_factor' => $maxFactor,
                'check_conversion' => round($checkConversion, 0, PHP_ROUND_HALF_UP),
                'a' => $a,
                'b' => $b,
                'a_cumulative' => $a_cumulative,
                'b_cumulative' => $b_cumulative,
                'value' => $value,
                'radar' => round($radar, 2, PHP_ROUND_HALF_UP),
                'cumulative' => round($cumulative, 2, PHP_ROUND_HALF_UP),
            ];
            array_push($result, $transform);
        }

        return round($comulativeTotal, 2, PHP_ROUND_HALF_UP);
    }

    public function getRadarChart()
    {
        try {
            $packageId = request()->query->get('package');
            $type = request()->query->get('type');
            $data = Indicator::with(['subIndicator.singleScore' => function ($query) use ($packageId, $type) {
                $query->where('package_id', $packageId)->where('type', $type);
            }])->get();
            $arrData = $data->toArray();
            $result = [];
            $chkSum = 0;
            $scoreMin = 1;
            $scoreMax = 3;
            $comulativeTotal = 0;
            $goodScore = 0;
            $mediumScore = 0;
            $badScore = 0;
            $emptyScore = 0;
            foreach ($arrData as $v) {
                $index = $v['name'];
                $weight = $v['weight'];
                $value = 0;
                $subLength = count($v['sub_indicator']);
                $chkSum += $v['weight'];
                $min = ($scoreMin * $subLength);
                $max = ($scoreMax * $subLength);
                $maxFactor = round((100 * $weight), 2, PHP_ROUND_HALF_UP);
                $radarMin = 0;
                $radarMax = 10;
                $a = round(($radarMax - $radarMin) / ($max - $min), 3, PHP_ROUND_HALF_UP);
                $b = round($radarMax - ($max * $a), 0, PHP_ROUND_HALF_UP);
                foreach ($v['sub_indicator'] as $sub) {
                    $tmpScore = $sub['single_score'] !== null ? $sub['single_score']['score'] : 0;
                    $value += $tmpScore;
                    if ($sub['single_score'] !== null) {
                        switch ($sub['single_score']['score']) {
                            case 1:
                                $badScore += 1;
                                break;
                            case 2:
                                $mediumScore += 1;
                                break;
                            case 3:
                                $goodScore += 1;
                                break;
                            default:
                                break;
                        }
                    } else {
                        $emptyScore += 1;
                    }
                }
                $checkConversion = ($a * $max) + $b;
                $a_cumulative = round(($maxFactor / ($max - $min)), 3, PHP_ROUND_HALF_UP);
                $b_cumulative = round(($maxFactor - ($max * $a_cumulative)), 3, PHP_ROUND_HALF_UP);
                $radar = 0;
                $cumulative = 0;
                if ($value > 0) {
                    $radar = ($a * $value) + $b;
                    $cumulative = ($a_cumulative * $value) + $b_cumulative;
                    $comulativeTotal += round($cumulative, 2, PHP_ROUND_HALF_UP);
                }
                $transform = [
                    'index' => $index,
                    'weight' => $weight,
                    'sub_length' => $subLength,
                    'min' => $min,
                    'max' => $max,
                    'max_factor' => $maxFactor,
                    'check_conversion' => round($checkConversion, 0, PHP_ROUND_HALF_UP),
                    'a' => $a,
                    'b' => $b,
                    'a_cumulative' => $a_cumulative,
                    'b_cumulative' => $b_cumulative,
                    'value' => $value,
                    'radar' => round($radar, 2, PHP_ROUND_HALF_UP),
                    'cumulative' => round($cumulative, 2, PHP_ROUND_HALF_UP),
                ];
                array_push($result, $transform);
            }
            return response()->json([
                'msg' => 'success',
                'data' => [
                    'indicator' => $result,
                    'chk_summary' => round($chkSum, 0, PHP_ROUND_HALF_UP),
                    'score_count' => [$emptyScore, $badScore, $mediumScore, $goodScore]
                ],
                'comulative' => round($comulativeTotal, 2, PHP_ROUND_HALF_UP)
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }

    public function getComutative($id)
    {
        $score = Score::where([['package_id', '=', $id], ['evaluator_id', '=', Auth::id()]])->groupBy(['score', 'text'])->selectRaw('sum(score) as score, text')->get();
        $total = 0;
        foreach ($score as $sc) {
            $total = $total + (int)$sc['score'];
        }
        Arr::set($score, 'total', $total);
        return $score;
    }

    public function uploadFile($id)
    {
        try {
            $authorId = Auth::id();
            $score = Score::with(['package', 'subIndicator'])->find(request('id'));
            if ($score === null) {
                return response()->json(['msg' => 'Penilaian Sub Indicator Tidak Ditemukan...'], 202);
            }
            DB::beginTransaction();
//            if ($score->file) {
//                if (file_exists('../public' . $score->file)) {
//                    unlink('../public' . $score->file);
//                }
//            }
            $files = $this->request->file('file');
            $extension = $files->getClientOriginalExtension();
            $name = str_replace(' ', '-', $score->package->name) . '-' . str_replace(' ', '-', $score->subIndicator->name) . strtotime("now");
            $value = $name . '.' . $extension;

            $stringImg = '/files/' . $value;
            $this->uploadImage('file', $value, 'filesUpload');

            $scoreBefore = $score->score;
            $scoreTextBefore = $score->text;
            $scoreFileBefore = $score->file;
            $packageId = $score->package_id;
            $vType = $score->type;
            $subIndicatorId = $score->sub_indicator_id;

            $cumulativeBefore = $this->getCumulative($packageId, $vType);
            $score->update(['file' => $stringImg]);
            $cumulativeAfter = $this->getCumulative($packageId, $vType);

            $data = [
                'package_id' => $packageId,
                'author_id' => $authorId,
                'sub_indicator_id' => $subIndicatorId,
                'type' => $vType,
                'score_before' => $scoreBefore,
                'score_text_before' => $scoreTextBefore,
                'file_before' => $scoreFileBefore,
                'score_after' => $scoreBefore,
                'score_text_after' => $scoreTextBefore,
                'file_after' => $stringImg,
                'cumulative_before' => $cumulativeBefore,
                'cumulative_after' => $cumulativeAfter,
            ];
            $this->saveHistory($data);
            DB::commit();
            return response()->json(['msg' => 'success'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }

    public function getScoreHistory()
    {
        try {
            $packageId = request()->query->get('package');
            $type = request()->query->get('type');
            $subIndicatorId = request()->query->get('sub');
            $history = ScoreHistory::with(['package', 'subIndicator'])
                ->where('package_id', $packageId)
                ->where('type', $type)
                ->where('sub_indicator_id', $subIndicatorId)
                ->orderBy('id', 'DESC')
                ->get();
            return response()->json(['msg' => 'success', 'data' => $history], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }

    public function getLastScoreHistory()
    {

        try {
            $packageId = request()->query->get('package');
            $type = request()->query->get('type');
            $subIndicatorId = request()->query->get('sub');
            $history = ScoreHistory::with(['package', 'subIndicator'])
                ->where('package_id', $packageId)
                ->where('type', $type)
                ->where('sub_indicator_id', $subIndicatorId)
                ->first();
            if ($history === null) {
                return response()->json(['msg' => 'Tidak Ada Riwayat...', 'code' => 202], 202);
            }
            return response()->json(['msg' => 'success', 'data' => $history, 'code' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }
}
