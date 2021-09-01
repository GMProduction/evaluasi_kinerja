<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Package;
use App\Models\PPK;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    //
    public function getAllCountUser()
    {
        $user = User::count('*');

        return $user;
    }

    public function getAllCountPackage()
    {
        $package = Package::count('*');

        return $package;
    }

    public function getAllCountPPK()
    {
        $ppk = PPK::count('*');

        return $ppk;
    }

    public function getAllCountIndikator()
    {
        $indikator = Indicator::count('*');

        return $indikator;
    }

    public function getAllCountData()
    {
        $data = [
            'user'      => $this->getAllCountUser(),
            'package'   => $this->getAllCountPackage(),
            'ppk'       => $this->getAllCountPPK(),
            'indicator' => $this->getAllCountIndikator(),
        ];

        return $data;
    }

    public function datatable()
    {
        $data = Package::with(['vendor.vendor', 'ppk'])->where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]])->get();

        return DataTables::of($data)->make(true);

    }
}
