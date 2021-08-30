<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Package;
use App\Models\PPK;
use App\Models\Vendor;
use Yajra\DataTables\DataTables;

class PackageController extends CustomController
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
        if (\request()->isMethod('POST')) {
            return $this->store();
        }
        $package = Package::with(['vendor.vendor', 'ppk'])->get();
        $ppk = PPK::all();
        $vendor = Vendor::with('user')->get();
//        return $package->toArray();
        return view('superuser/paket-konstruksi/paketKonstruksi')->with(['ppk' => $ppk, 'vendor' => $vendor]);
    }

    public function store()
    {
        try {
            $start = strtotime($this->postField('start'));
            $finish = strtotime($this->postField('finish'));
            $date_contract = strtotime($this->postField('date_contract'));

            $package = new Package();
            $package->name = $this->postField('name');
            $package->vendor_id = $this->postField('vendor');
            $package->ppk_id = $this->postField('ppk');
            $package->no_reference = $this->postField('reference');
            $package->start_at = date('Y-m-d', $start);
            $package->finish_at = date('Y-m-d', $finish);
            $package->date = date('Y-m-d', $date_contract);
            $package->save();
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan Pada Server'], 500);
        }

    }
}
