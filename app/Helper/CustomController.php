<?php


namespace App\Helper;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
