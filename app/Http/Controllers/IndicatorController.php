<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Accessor;
use App\Models\Indicator;
use App\Models\SubIndicator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndicatorController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $indicators = Indicator::with('subIndicator')->get();
        return $indicators->toArray();
    }

    public function store()
    {
//        return response()->json($this->postField('sub_indicator'), 200);
        try {
            DB::transaction(function (){
                $indicator = new Indicator();
                $indicator->name = $this->postField('name');
                $indicator->save();

                $reqSubIndicator = $this->postField('sub_indicator');
                foreach ($reqSubIndicator as $req)
                {
                    $subIndicator = new SubIndicator();
                    $subIndicator->name = $req;
                    $subIndicator->indicator_id = $indicator->id;
                    $subIndicator->save();
                }
            });
            return response()->json('success', 200);
        }catch (\Exception $e){
            return response()->json($e, 500);
        }
    }
}
