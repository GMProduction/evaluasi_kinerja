<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Indicator;

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
        $data = Indicator::with(['subIndicator.singleScore'])->addSelect()->get();
        return $data->toArray();
    }
}
