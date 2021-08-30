<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;

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
}
