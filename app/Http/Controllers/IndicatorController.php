<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Indicator;

class IndicatorController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $indicators = Indicator::with('subIndicator')->get();
        return $indicators->toArray();
    }
}
