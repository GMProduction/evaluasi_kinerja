<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;

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

    
}
