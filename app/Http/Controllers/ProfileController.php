<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProfileController extends CustomController
{
    //

    public function profile()
    {
        $roles = auth()->user()->roles[0];
        $user  = User::with("$roles")->find(Auth::id());

        return $user;
    }

    public function package()
    {
        $roles  = auth()->user()->roles[0];
        $pakage = [];
        if ($roles == 'accessorppk') {
            $packageGoing = Package::whereHas(
                'ppk.accessorppk',
                function ($q) {
                    $q->where('user_id', '=', Auth::id());
                }
            )->where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]])->count('*');
            $packagePast  = Package::whereHas(
                'ppk.accessorppk',
                function ($q) {
                    $q->where('user_id', '=', Auth::id());
                }
            )->where('finish_at', '<', date('Y-m-d', strtotime(now('Asia/Jakarta'))))->count('*');
            $vendor       = Package::whereHas(
                'ppk.accessorppk',
                function ($q) {
                    $q->where('user_id', '=', Auth::id());
                }
            )->where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]])
                                   ->selectRaw('vendor_id')->groupBy(['vendor_id'])->get();
            Arr::set($pakage, 'packageGoing', $packageGoing);
            Arr::set($pakage, 'packagePast', $packagePast);
            Arr::set($pakage, 'vendor', count($vendor));
        } elseif ($roles == 'accessor') {
            $packageGoing = Package::where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]])->count('*');
            $packagePast  = Package::where('finish_at', '<', date('Y-m-d', strtotime(now('Asia/Jakarta'))))->count('*');
            $vendor       = Package::where([['start_at', '<=', date('Y-m-d', strtotime(now('Asia/Jakarta')))], ['finish_at', '>=', date('Y-m-d', strtotime(now('Asia/Jakarta')))]])
                                   ->selectRaw('vendor_id')->groupBy(['vendor_id'])->get();
            Arr::set($pakage, 'packageGoing', $packageGoing);
            Arr::set($pakage, 'packagePast', $packagePast);
            Arr::set($pakage, 'vendor', count($vendor));

        }

        return $pakage;
    }

    public function updateImg()
    {
        $user  = User::find(Auth::id());
        $files = \request()->file('profile');
        if ($user->image) {
            if (file_exists('../public'.$user->image)) {
                unlink('../public'.$user->image);
            }
        }
        $extension = $files->getClientOriginalExtension();
        $name      = $this->uuidGenerator().'.'.$extension;
        $stringImg = '/images/profile/'.$name;
        $this->uploadImage('profile', $name, 'imagesProfile');
        $user->update(['image' => $stringImg]);
        return response()->json(['msg' => 'berhasil']);
    }
}
