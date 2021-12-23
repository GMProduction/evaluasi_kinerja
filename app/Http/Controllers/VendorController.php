<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\AccessorPPK;
use App\Models\Package;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $vendors = Vendor::with('user')->get();
        return $vendors->toArray();
    }

    public function getVendorPackage(){
        $roles = auth()->user()->roles[0];
        $package = User::with(['vendor','packageVendorGoing'])->vendor(request('name'))->whereJsonContains('roles', 'vendor');
//        if ($roles == 'accessor'){
////            $package = $package->has('package');
//        }else if ($roles == 'admin' ||$roles == 'superadmin'){
//            $package = $package->has('package');
//        }else{
//            $package = $package->whereHas('package.ppk.accessorppk.user', function ($query){
//               $query->where('id',Auth::id());
//            });
//        }

        if ($roles == 'accessorppk'){
            $package = $package->whereHas('package.ppk.accessorppk.user', function ($query){
                $query->where('id',Auth::id());
            });
        }

        return $package->get();
    }

    public function store()
    {
        try {
            DB::transaction(function (){
                $user = new User();
                $user->email = $this->postField('email');
                $user->username = $this->postField('username');
                $user->password = Hash::make($this->postField('password'));
                $user->roles = ["ROLE_VENDOR"];
                $user->save();

                $vendor = new Vendor();
                $vendor->name = $this->postField('name');
                $vendor->user_id = $user->id;
                $vendor->save();
            });
            return response()->json('success', 200);
        }catch (\Exception $e){
            return response()->json($e, 500);
        }
    }

    public function detailVendor($id)
    {
        $vendor = User::with('vendor')->where('id', $id)->firstOrFail();
        $data = Package::with(['vendor'])
            ->where(
                [
                    ['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))],
                    ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]
                ]
            )->where('vendor_id', $id)
            ->get();
        if (request('st') == 'past'){
            $data = Package::with(['vendor'])
                          ->where('finish_at', '<', date('Y-m-d', strtotime(now('Asia/Jakarta'))))->where('vendor_id', $id)
                          ->get();
        }
        return view('superuser/penilaian/index')->with(['data' => $data, 'vendor' => $vendor]);
    }

    public function detailThisVendor(){
        $id = Auth::id();
        $vendor = User::with('vendor')->where('id', $id)->firstOrFail();
        $data = Package::with(['vendor'])
                       ->where(
                           [
                               ['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))],
                               ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]
                           ]
                       )->where('vendor_id', $id)
                       ->get();
        if (request('st') == 'past'){
            $data = Package::with(['vendor'])
                           ->where('finish_at', '<', date('Y-m-d', strtotime(now('Asia/Jakarta'))))->where('vendor_id', $id)
                           ->get();
        }
        return view('superuser/penilaian/index')->with(['data' => $data, 'vendor' => $vendor]);
    }

    public function cetakPenilaian($id)
    {
        $html = $this->postField('hidden_html');
        $vendor = User::with('vendor')->where('id', $id)->firstOrFail();
//        dump($html);
//        die();
        return $this->convertToPdf('superuser.penilaian.cetak', ['html' => $html, 'vendor' => $vendor]);
    }

}
