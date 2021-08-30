<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Package;
use App\Models\PPK;
use App\Models\Vendor;

class PackageController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $package = Package::with(['vendor.vendor', 'ppk'])->get();
        $ppk = PPK::all();
        $vendor = Vendor::with('user')->get();
//        return $package->toArray();
        return view('superuser/paket-konstruksi/paketKonstruksi')->with(['ppk' => $ppk, 'vendor' => $vendor]);
    }

    public function store()
    {
        $package = new Package();
        $package->name = $this->postField('name');
        $package->vendor_id = $this->postField('vendor');
        $package->ppk_id = $this->postField('ppk');
        $package->start_at = $this->postField('start');
        $package->finish_at = $this->postField('finish');
        $package->save();
        return redirect('/superuser/paket-konstruksi');
    }
}
