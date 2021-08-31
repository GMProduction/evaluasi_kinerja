<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Indicator;
use App\Models\Score;

class ScoreController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('superuser.penilaian.penilaian');
    }

    public function getScore()
    {
        $data = Indicator::with(['subIndicator.singleScore' => function($query){
            $query->where('package_id', 1);
        }])->get();
        return $data->toArray();
    }
}
