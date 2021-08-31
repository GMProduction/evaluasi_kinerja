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
            foreach ($arrData as $v) {
                $index = $v['name'];
                $value = 0;
                foreach ($v['sub_indicator'] as $sub)
                {
                    $tmpScore = $sub['single_score'] !== null ? $sub['single_score']['score'] : 0;
                    $value += $tmpScore;
                }
                $transform = [
                    'index' => $index,
                    'value' => $value
                ];
                array_push($result, $transform);
            }
            return response()->json([
                'msg' => 'success',
                'data' => $result
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Server..' . $e], 500);
        }
    }
}
