<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\AccessorPPK;
use App\Models\User;
use App\Models\Vendor;
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

}
