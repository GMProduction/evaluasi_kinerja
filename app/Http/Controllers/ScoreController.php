<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Indicator;
use App\Models\Package;
use App\Models\Score;
use Yajra\DataTables\DataTables;

class ScoreController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function datatable()
    {
        $data = Package::with(['vendor.vendor', 'ppk'])->get();
        return DataTables::of($data)->make(true);
    }

    public function index()
    {
        $data = Package::with(['vendor.vendor', 'ppk'])->get();
        return view('superuser.penilaian.penilaian')->with(['data' => $data]);
    }

    public function detail($id)
    {
        $data = Package::with(['vendor.vendor', 'ppk'])->where('id', $id)->firstOrFail();
        return view('superuser/penilaian/detail-penilaian')->with(['data' => $data]);
    }

    public function getScore()
    {
        try {
            $data = Indicator::with(['subIndicator.singleScore' => function ($query) {
                $query->where('package_id', 1);
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

    public function getRadarChart()
    {
        try {
            $data = Indicator::with(['subIndicator.singleScore' => function ($query) {
                $query->where('package_id', 1);
            }])->get();
            $arrData = $data->toArray();
            $result = [];
            $chkSum = 0;
            $scoreMin = 1;
            $scoreMax = 3;
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
                }


                $checkConversion = ($a * $max) + $b;
                $a_cumulative = round(($maxFactor / ($max - $min)), 3, PHP_ROUND_HALF_UP);
                $b_cumulative = round(($maxFactor - ($max * $a_cumulative)), 3, PHP_ROUND_HALF_UP);
                $radar = 0;
                $cumulative = 0;
                if ($value > 0) {
                    $radar = ($a * $value) + $b;
                    $cumulative = ($a_cumulative * $value) + $b_cumulative;
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
                    'radar' => $radar,
                    'cumulative' => $cumulative,
                ];
                array_push($result, $transform);
            }
            return response()->json([
                'msg' => 'success',
                'data' => [
                    'indicator' => $result,
                    'chk_summary' => round($chkSum, 0, PHP_ROUND_HALF_UP)
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }
}
