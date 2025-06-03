<?php

namespace App\Http\Controllers;

use App\Models\Tranche;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Ilo;
use App\Models\IlotLot;
use App\Models\Lot;
use App\Models\Statu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{
    //
    public function viewallilos()
    {
        $allilos = Ilo::latest()->get();
        $alltranches = Tranche::all();
       return view('contents.ilos.index',compact('allilos','alltranches'));
    }

    public function simpleilodelete($id)
    {

        $Ilofordel = Ilo::where('id',$id);


        $Ilofordel->delete();

        if($Ilofordel)
        {
            return redirect()->back()->with('success','the Ilo was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Ilo !!');
        }


    }

    function updateilo(Request $request)
    {


        $oldid_tranche = Ilo::where('id',$request->id)->first()->id_tranche;


            // Response
            $arryaydata = [
                'label' => $request->label,
                'id_tranche'=>$request->id_tranche ?? $oldid_tranche

            ];




        Ilo::where('id',$request->id)->update($arryaydata);


        return response()->json(['status'=>'success','msg'=>'Ilo was updated successfully ']);





    }



    public function multideleteilos(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);



       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Ilo::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les Ilos selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les Ilos selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un Ilo  ']);
       }

    }



    public function createnewilot(Request $request)
    {

            $arryaydata = [
                'label' => $request->label,
                'id_tranche'=>$request->id_tranche

            ];

            // dd($arryaydata);



            Ilo::create($arryaydata);


            return response()->json(['status'=>'success','msg'=>'Ilo was added successfully ']);



    }




    public function viewalltypes()
    {
        $alltypes = type::latest()->get();
       return view('contents.types.index',compact('alltypes'));
    }

    public function simpletypedelete($id)
    {

        $Typefordel = Type::where('id',$id);


        $Typefordel->delete();

        if($Typefordel)
        {
            return redirect()->back()->with('success','the Type was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Type !!');
        }


    }

    function updatetype(Request $request)
    {




            // Response
            $arryaydata = [
                'label' => $request->label,


            ];




        Type::where('id',$request->id)->update($arryaydata);


        return response()->json(['status'=>200,'success'=>'Type was updated successfully ']);





    }



    public function multideletetypes(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);



       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Type::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les types selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les types selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un type  ']);
       }

    }


    public function createnewtype(Request $request)
    {



            $arryaydata = [
                'label' => $request->label,


            ];

            // dd($arryaydata);

            Type::create($arryaydata);


            return response()->json(['status'=>200,'success'=>'Type was added successfully ']);



    }

    public function viewalltranches()
    {
        $alltranches = Tranche::latest()->get();
       return view('contents.tranches.index',compact('alltranches'));
    }

    public function simpletranchedelete($id)
    {

        $Tranchefordel = Tranche::where('id',$id);


        $Tranchefordel->delete();

        if($Tranchefordel)
        {
            return redirect()->back()->with('success','the Tranche was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Tranche !!');
        }


    }

    function updatetranche(Request $request)
    {




            // Response
            $arryaydata = [
                'label' => $request->label,


            ];




        Tranche::where('id',$request->id)->update($arryaydata);


        return response()->json(['status'=>200,'success'=>'Tranche was updated successfully ']);





    }



    public function multideletetranches(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);



       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Tranche::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les tranches selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les tranches selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un tranche  ']);
       }

    }


    public function createnewtranche(Request $request)
    {



            $arryaydata = [
                'label' => $request->label,


            ];

            // dd($arryaydata);

            Tranche::create($arryaydata);


            return response()->json(['status'=>200,'success'=>'Tranche was added successfully ']);



    }



    // public function __construct()
    // {
    //     $this->middleware('adminauth:admin');
    // }



    public function index()
    {

        $alllots = Lot::all();



        $alltranches = Tranche::all();


    //     $statusids = [];
    //     foreach($alllots as $ele){

    //     array_push($statusids,$ele->etat['id']);

    //     }
    //    $statusids = array_unique($statusids);

    //    dd($statusids);


        $alltypes = Type::all();
        $allstatus = Statu::all();

        $allilots = Ilo::all();
        $getalllots = Lot::all();

       return view('contents.lots.index',compact('alllots','getalllots','allilots','allstatus','alltranches','alltypes'));

    }

    public function simplelotdelete($id)
    {

        $lotfordel = Lot::where('id',$id);



        $lotfordel->delete();

        if($lotfordel)
        {


            return redirect()->back()->with('success','the lot was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted lot !!');
        }


    }

    // public function ajaxdelete($id)
    // {
    //     $lotfordel = Supplier::where('id',$id);

    //     if(!$lotfordel)
    //     {
    //         return response()->json(['status'=>'error','error'=>'cant find supplier ']);
    //     }else{

    //         $lotfordel->delete();

    //         if($lotfordel){
    //             return response()->json(['status'=>200,'success'=>'supplier was added successfully ']);
    //         }else{
    //             return response()->json(['status'=>'error','error'=>'cant delete supplier ']);
    //         }
    //     }


    // }

    public function ajaxfilteralllots(Request $request)
    {
      $sumfilters = [];

      $getalllots = Lot::all();
      $alltranches = Tranche::all();



      $alltypes = Type::all();
      $allstatus = Statu::all();

      $allilots = Ilo::all();


      if($request->selected_fltranche != null && $request->selected_fltranche != 0 ){

        array_push($sumfilters,$request->selected_fltranche && $request->selected_fltranche != 0 );
      }

      if($request->selected_flilot != null && $request->selected_flilot != 0 ){

        array_push($sumfilters,$request->selected_flilot);
      }

      if($request->selected_fltype != null && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  ){

        array_push($sumfilters,$request->selected_fltype );
      }

      if($request->selected_fletat != null && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  ){

        array_push($sumfilters,$request->selected_fletat);
      }



      $i = 0;

      $lotsfound = [];


      switch (count($sumfilters)) {

        case 0:


         if($request->range_surface){

          $arraysurface = explode(";",$request->range_surface);

          $min_surface = $arraysurface[0];
          $max_surface = $arraysurface[1];



          $lotsfound = Lot::whereBetween('surface', [$min_surface, $max_surface])->get();


         }else{
          $lotsfound = Lot::all();
         }

        break;
        case 1:
          # code...

          if($request->selected_fltranche != 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) == 0  )
          {


            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){
                if($request->range_surface){

                  $arraysurface = explode(";",$request->range_surface);

                  $min_surface = $arraysurface[0];
                  $max_surface = $arraysurface[1];

                  if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                    array_push($lotsfound,$lot);

                  }


                }


              }



            }



          }else if($request->selected_fltranche == 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) == 0  ){


            $getlotsbytype = Lot::whereIn('type_id',$request->selected_fltype)->get();



            foreach($getlotsbytype as $lot){
              if($request->range_surface){

                $arraysurface = explode(";",$request->range_surface);

                $min_surface = $arraysurface[0];
                $max_surface = $arraysurface[1];

                if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                  array_push($lotsfound,$lot);

                }


              }


            }





          }else if($request->selected_fltranche == 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  )
          {
            $getlotsbyetat = Lot::whereIn('statu_id',$request->selected_fletat)->get();


            foreach($getlotsbyetat as $lot){
              if($request->range_surface){

                $arraysurface = explode(";",$request->range_surface);

                $min_surface = $arraysurface[0];
                $max_surface = $arraysurface[1];

                if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                  array_push($lotsfound,$lot);

                }


              }


            }


          }

          break;
          case 2:
          # code...

          if($request->selected_fltranche != 0 && $request->selected_flilot != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) == 0  ){

            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if($lot->ilot_id == $request->selected_flilot){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }


          }else if($request->selected_fltranche != 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) == 0  ){



            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if(in_array($lot->type_id, $request->selected_fltype)){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }


          }else if( $request->selected_fltranche != 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  ){


            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if(in_array($lot->statu_id, $request->selected_fletat)){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }


          }else if($request->selected_fltranche == 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0 ){


            $getlotsbyetat = Lot::whereIn('statu_id',$request->selected_fletat)->whereIn('type_id',$request->selected_fltype)->get();



            foreach($getlotsbyetat as $lot){
              if($request->range_surface){

                $arraysurface = explode(";",$request->range_surface);

                $min_surface = $arraysurface[0];
                $max_surface = $arraysurface[1];

                if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                  array_push($lotsfound,$lot);

                }


              }


            }


          }

          break;

          case 3:
          # code...
          if($request->selected_fltranche != 0 && $request->selected_flilot != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) == 0  ){

            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if($lot->ilot_id == $request->selected_flilot && in_array($lot->type_id, $request->selected_fltype) ){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }


          }else if($request->selected_fltranche != 0 && $request->selected_flilot != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  ){

            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if($lot->ilot_id == $request->selected_flilot && in_array($lot->statu_id, $request->selected_fletat) ){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }

          }else if($request->selected_fltranche != 0 && $request->selected_flilot == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  ){


            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if(in_array($lot->statu_id, $request->selected_fletat) && in_array($lot->type_id, $request->selected_fltype) ){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }

          }


          break;

          case 4:
          # code...
          if($request->selected_fltranche != 0 && $request->selected_flilot != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0  && count($request->selected_fletat != null ? $request->selected_fletat : [] ) > 0  ){

            $getselectedtranches = Tranche::where('id',$request->selected_fltranche)->first();

            $ilotsbytranche =  $getselectedtranches->ilots;

            foreach($ilotsbytranche as $ilot){

              foreach($ilot->lots as $lot){

                if($lot->ilot_id == $request->selected_flilot && in_array($lot->statu_id, $request->selected_fletat) && in_array($lot->type_id, $request->selected_fltype) ){

                  if($request->range_surface){

                    $arraysurface = explode(";",$request->range_surface);

                    $min_surface = $arraysurface[0];
                    $max_surface = $arraysurface[1];

                    if($lot->surface >= $min_surface && $lot->surface <= $max_surface){
                      array_push($lotsfound,$lot);

                    }


                  }

                }



              }



            }


          }


          break;

      }


      $alllots = $lotsfound;

      return view('contents.lots.index',compact('alllots','getalllots','allilots','allstatus','alltranches','alltypes'));


    }

    // public function getajaxlotnotapprove()
    // {
    //     $lotnotapprove = Supplier::where('status',0)->get();


    //     return response()->json(['status'=>200,'data'=>$lotnotapprove,'success'=>'supplier was geting successfully ']);

    // }

   function updatelot(Request $request)
    {





      if($request->num_lot ==''){
        return response()->json(['status'=>'error','input'=>'num_lot','msg'=>'invalid message :Num Lot is Require ']);
      }



      if($request->selected_upetat == null){
        return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid selected_upetat : selected_upetat is Require ']);
      }

      if($request->selected_uptype == null){
        return response()->json(['status'=>'error','input'=>'selected_uptype','msg'=>'invalid selected_uptype : selected_uptype is Require ']);
      }



      if($request->selected_upilot == null){
        return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid selected_upilot : selected_upilot is Require ']);
      }




      if($request->prix_m2 ==''){
        return response()->json(['status'=>'error','input'=>'prix_m2','msg'=>'invalid prix par m2 :Prix par M2 is Require ']);
      }

      if($request->prix_min ==''){
        return response()->json(['status'=>'error','input'=>'prix_min','msg'=>'invalid Prix Min : Prix Min is Require ']);
      }






      if($request->titre_foncier ==''){
        return response()->json(['status'=>'error','input'=>'titre_foncier','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
      }


          if($request->old_titre_foncier != $request->titre_foncier)
          {
            if(Lot::where('titre_foncier',$request->titre_foncier)->first() != null){
              return response()->json(['status'=>'error','input'=>'titre_foncier','msg'=>'invalid Titre Foncier :Titre Foncier is Already Used ']);
             }
          }




      if($request->surface ==''){
        return response()->json(['status'=>'error','input'=>'surface','msg'=>'invalid Surface :Surface is Require ']);
      }



        $arryaydata = [
            "name" =>$request->num_lot,
            "ilot_id"=>$request->selected_upilot,
            "type_id"=>$request->selected_uptype,
            "statu_id"=>$request->selected_upetat,
            "prix_m2" =>$request->prix_m2,
            "prix_minimaum" =>$request->prix_min,
            "prix_vente" => $request->prix_vente,
            "titre_foncier" => $request->titre_foncier,
            "surface" =>$request->surface,
            "hypotheque" => $request->hypotheque
        ];



       $isupdated =  Lot::where('id',$request->lot_id)->update($arryaydata);


       if($isupdated)
       {
        return response()->json(['status'=>'success','msg'=>'lot was updated successfully ']);
       }else{
        return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant update lot  ']);
       }



    }



    public function editlot($id)
    {
       $alltype = Type::all();
      $allstatus = Statu::all();
      $selectedlot = Lot::where('id',$id)->first();


      $allilots = Ilo::all();
      $alltranches = Tranche::all();

      return view('contents.lots.edit',compact('selectedlot','allilots','allstatus','alltranches','alltype'));
    }

    public function multideletelots(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);




       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Lot::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les lots selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les lots selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un lot  ']);
       }

    }

    public function createnewlot(Request $request)
    {

      $alltype = Type::all();
      $allstatus = Statu::all();

      $allilots = Ilo::all();
      $alltranche = Tranche::all();

      return view('contents.lots.create',compact('allilots','allstatus','alltranche','alltype'));
    }
    public function storenewlot(Request $request)
    {



        if($request->num_lot ==''){
          return response()->json(['status'=>'error','input'=>'num_lot','msg'=>'invalid message :Num Lot is Require ']);
        }



        if($request->selected_upetat == null){
            return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid : etat is Require ']);
          }

          if($request->selected_uptype == null){
            return response()->json(['status'=>'error','input'=>'selected_uptype','msg'=>'invalid : type is Require ']);
          }



          if($request->selected_upilot == null){
            return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid selected_upilot : selected_upilot is Require ']);
          }




        if($request->prix_m2 ==''){
          return response()->json(['status'=>'error','input'=>'prix_m2','msg'=>'invalid prix par m2 :Prix par M2 is Require ']);
        }

        if($request->prix_min ==''){
          return response()->json(['status'=>'error','input'=>'prix_min','msg'=>'invalid Prix Min : Prix Min is Require ']);
        }


        if($request->titre_foncier ==''){
          return response()->json(['status'=>'error','input'=>'titre_foncier','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
        }



        if(Lot::where('titre_foncier',$request->titre_foncier)->first() != null){
            return response()->json(['status'=>'error','input'=>'titre_foncier','msg'=>'invalid Titre Foncier :Titre Foncier is Already Used ']);
        }




        if($request->surface ==''){
          return response()->json(['status'=>'error','input'=>'surface','msg'=>'invalid Surface :Surface is Require ']);
        }


          $arryaydata = [
              "name" =>$request->num_lot,
              "ilot_id"=>$request->selected_upilot,
              "type_id"=>$request->selected_uptype,
              "statu_id"=>$request->selected_upetat,
              "prix_m2" =>$request->prix_m2,
              "prix_minimaum" =>$request->prix_min,
              "prix_vente" => $request->prix_vente,
              "titre_foncier" => $request->titre_foncier,
              "surface" =>$request->surface,
              "hypotheque" => $request->hypotheque
          ];


         $iscreated =  Lot::create($arryaydata);



         if($iscreated)
         {
          return response()->json(['status'=>'success','msg'=>'lot was added successfully ']);
         }else{
          return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant adde lot  ']);
         }


    }


}