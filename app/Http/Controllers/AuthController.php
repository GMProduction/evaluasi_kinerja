<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pageLogin()
    {
        return view('auth.login');
    }

    public function login(){
        $credentials = [
            'password' => $this->request->get('password'),
        ];

        if (strpos(request('username'), '@') == false){
            Arr::set($credentials, 'username', request('username'));
        }else{
            Arr::set($credentials, 'email', request('username'));
        }

        if ($this->isAuth($credentials)) {
            $redirect = '/';

            return redirect($redirect);
        }
        return Redirect::back()->withErrors(['failed', 'Periksa Kembali Username dan Password Anda']);
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

}
