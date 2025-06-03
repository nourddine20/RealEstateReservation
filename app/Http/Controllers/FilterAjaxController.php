<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Client;
use App\Models\Commercial;
use App\Models\Ilo;
use App\Models\IlotLot;
use App\Models\Reservation;
use App\Models\Type;
use App\Models\ReservationLot;
use App\Models\Statu;
use App\Models\Tranche;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FilterAjaxController extends Controller
{
    //
    public function getajaxselectedfromtranche(Request $request){




        $ajaxdata = Tranche::find($request->selected_id)->ilots;

        return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' ilots was geting successfully ']);





    }

    public function getajaxsinglelot(Request $request)
    {

      $ajaxdata = Lot::where('id',$request->selected_id)->first();



      return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' ilots was geting successfully ']);


    }

    public function getajaxfromtypeclient(Request $request){


      $ajaxdata = Client::where('type',$request->selected_id)->get();


      return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' clients was geting successfully ']);


    }

    public function getajaxselectedfromilot(Request $request)
    {

      $listlots = Ilo::find($request->selected_id)->lots;


      $arraylots = [];

      foreach ($listlots as $lot) {
        # code...

        if($lot->statu_id == 53){
          array_push($arraylots,$lot);

        }

      }




      return response()->json(['status'=>200,'data'=>$arraylots,'success'=>'lots was geting successfully ']);

    }


}