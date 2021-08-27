<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Package;

class PackageController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $package = Package::with(['vendor.vendor', 'ppk'])->get();
        return $package->toArray();
    }
}
