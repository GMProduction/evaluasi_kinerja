<?php


namespace App\Helper;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    /** @var Request  */
    protected $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function postField($key)
    {
        return $this->request->request->get($key);
    }

    public function isAuth($credentials = [])
    {
        if (count($credentials) > 0 && Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
}
