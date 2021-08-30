<?php


namespace App\Http\Controllers\Superadmin;


use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Models\Accessor;
use App\Models\Indicator;
use App\Models\SubIndicator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndicatorController extends Controller
{

    public function index()
    {
        if (request()->isMethod('POST')){
            return $this->store();
        }
       return view('superuser.indikator.indikator');
    }

    public function store()
    {
        if (request('id')){
            $indikator = Indicator::find(request('id'));
            $indikator->update(request()->all());
        }else{
            Indicator::create(request()->all());
        }
        return response()->json(['msg' => 'berhasil']);
    }

    public function getIndicator(){
        $indicator = Indicator::with('subIndicator')->get();
        return $indicator;
    }

    public function storeSubIndikator($idIndikator){
        $indikator = Indicator::find($idIndikator);
        if (request('id')){
            $indikator->subIndicator()->update(request()->all());
        }else{
            $indikator->subIndicator()->create(request()->all());
        }

        return response()->json(['msg' => 'success', 'data' => $idIndikator]);
    }

    public function getSubIndicator($id){
        $indicator = SubIndicator::where('indicator_id','=',$id)->get();
        return $indicator;
    }
}
