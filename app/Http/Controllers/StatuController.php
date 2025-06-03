<?php

namespace App\Http\Controllers;

use App\Models\Statu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Reservation;

class StatuController extends Controller
{
    //

    public function getreservationstatus()
    {
        $allreservationstatus = Statu::where('type','RES')->get();


        return view('contents.reservations.status',compact('allreservationstatus'));
    }



   public function getdemandestatus()
   {
    $alldemandestatus = Statu::where('type','DEM')->get();


    return view('contents.demandes.status',compact('alldemandestatus'));

   }


   public function changestatu(Request $request)
   {


    if($request->type_statu == "DEM")
    {
        if($request->ids_orders[0] != null)
        {

          $ids_array =  explode(',',$request->ids_orders[0]);

          if(count($ids_array)>0){
            foreach($ids_array as $item)
            {
               Demande::find($item)->update(['statu_id'=>$request->selectedstatu]);

            }

           }else{




                    return response()->json(['status'=>'error','msg'=>'order not found ']);

           }






           return response()->json(['status'=>'success','msg'=>'le statu des commandes selection va modifier  ']);
        }else{
          return response()->json(['status'=>'error','msg'=>'selecte at less it one order  ']);
        }


    }else if($request->type_statu == "RES"){

        if($request->ids_orders[0] != null)
        {

          $ids_array =  explode(',',$request->ids_orders[0]);

          if(count($ids_array)>0){
            foreach($ids_array as $item)
            {
               Reservation::find($item)->update(['statu_id'=>$request->selectedstatu]);

            }

           }else{




                    return response()->json(['status'=>'error','msg'=>'order not found ']);

           }






           return response()->json(['status'=>'success','msg'=>'le statu des commandes selection va modifier  ']);
        }else{
          return response()->json(['status'=>'error','msg'=>'selecte at less it one order  ']);
        }

    }



   }

   public function updateajaxstatu(Request $request)
   {

    $isupdated = [];

      $array_data = $request->statu_data;



    foreach($array_data as $ele){

        if($ele['label'] =='')
        {

            return response()->json(['status'=>'error','input'=>'label','loc'=>$ele['id_val'],'msg'=>'invalide label : please set value to label ']);
        }

        $array_data = [
            'label'=>$ele['label'],
            'color'=>$ele['color'],

        ];


       $isupdated =  Statu::find($ele['id_val'])->update($array_data);


  }



       if($isupdated){
        return response()->json(['status'=>'success','data'=>$request->statu_data,'msg'=>'Statu was updated successfully ']);
       }else{
        return response()->json(['status'=>'error','msg'=>'Statu was not found !! ']);
       }





   }



   public function addnewstatu(Request $request)
    {
        $createdstatu = [];


              $createdstatu =  Statu::create([


                    'label'=>$request->label,
                    'color'=>$request->color,
                    'type'=>$request->type_status,
                    'created_at'=>Carbon::now()

                ]);







            if($createdstatu){

                return response()->json(['status'=>'success','data'=>$createdstatu,'msg'=>'Statu was added successfully ']);
            }else{
                return response()->json(['status'=>'error','msg'=>'sorry cant  add statu  ']);
            }




    }

    function deleteajaxstatu($id)
    {
        $statuwantdelete = Statu::where('id',$id);

        $statuwantdelete->delete();

        if($statuwantdelete){
            return response()->json(['status'=>'success','msg'=>'Statu was added successfully ']);
        }else{
            return response()->json(['status'=>'error','msg'=>'cant found this statu ']);
        }
    }


}