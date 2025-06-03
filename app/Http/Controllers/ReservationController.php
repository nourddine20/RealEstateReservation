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

class ReservationController extends Controller
{
    //





    public function index()
    {
        $allreservations = Reservation::get();
        $alllots = Lot::get();

      $getreservations = Reservation::get();
         $allclients = Client::all();
        $allcommercials = Commercial::all();
       $allstatus = Statu::where('type','RES')->get();
       $allilots = Ilo::all();

      $alltranches = Tranche::all();
$alltypes = Type::all();
 $min_prix_vente = 0;
    $max_prix_vente = 0;


      $default_reliquat = [];
      $default_prix_vente = [];
      $array_prix_vents = [];
     foreach (Reservation::get() as $key => $res) {


         array_push($array_prix_vents,$res->lot->prix_vente);


    }


    if($array_prix_vents != []){
 $min_prix_vente = min($array_prix_vents);
    $max_prix_vente = max($array_prix_vents);

    }



  $min_reliquat = Reservation::min('reliquat');
  $max_reliquat = Reservation::max('reliquat');

      array_push($default_reliquat,$min_reliquat);
      array_push($default_reliquat,$max_reliquat);
      array_push($default_prix_vente,$min_prix_vente);
      array_push($default_prix_vente,$max_prix_vente);



    $max_date_reservation = DB::select('select max(date_reservation) as max_date_res from reservations')[0]->max_date_res;
    $min_date_reservation = DB::select('select min(date_reservation) as min_date_res from reservations')[0]->min_date_res;

    $array_dates_res = [];



  // Creating timestamp from given date
  $maxtimestamp = strtotime($max_date_reservation);

  // Creating new date format from that timestamp
  $new_max_date_res = date("m/d/Y", $maxtimestamp);

  $mintimestamp = strtotime($min_date_reservation);

  // Creating new date format from that timestamp
  $new_min_date_res = date("m/d/Y", $mintimestamp);


       array_push($array_dates_res,$new_min_date_res);
       array_push($array_dates_res,$new_max_date_res);





       return view('contents.reservations.index',compact('allreservations','getreservations','array_dates_res','default_prix_vente','default_reliquat','alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));

    }


    public function ajaxfilterallreservations(Request $request)
    {


        $sumfilters = [];

        $getreservations = Reservation::get();
        $alltranches = Tranche::all();

        $allcommercials = Commercial::all();
        $allclients = Client::all();
        $alltypes = Type::all();
        $allstatus = Statu::all();

        $allilots = Ilo::all();

        $default_reliquat = [];
        $default_prix_vente = [];
        $array_prix_vents = [];
       foreach (Reservation::get() as $key => $res) {


           array_push($array_prix_vents,$res->lot->prix_vente);


      }

      $min_prix_vente = min($array_prix_vents);
      $max_prix_vente = max($array_prix_vents);



    $min_reliquat = Reservation::min('reliquat');
    $max_reliquat = Reservation::max('reliquat');


      array_push($default_reliquat,$min_reliquat);
      array_push($default_reliquat,$max_reliquat);
      array_push($default_prix_vente,$min_prix_vente);
      array_push($default_prix_vente,$max_prix_vente);

      $max_date_reservation = DB::select('select max(date_reservation) as max_date_res from reservations')[0]->max_date_res;
      $min_date_reservation = DB::select('select min(date_reservation) as min_date_res from reservations')[0]->min_date_res;

      $array_dates_res = [];




  // Creating timestamp from given date
  $maxtimestamp = strtotime($max_date_reservation);

  // Creating new date format from that timestamp
  $new_max_date_res = date("m/d/Y", $maxtimestamp);

  $mintimestamp = strtotime($min_date_reservation);

  // Creating new date format from that timestamp
  $new_min_date_res = date("m/d/Y", $mintimestamp);


       array_push($array_dates_res,$new_min_date_res);
       array_push($array_dates_res,$new_max_date_res);



       $allreservations = Reservation::get();


        if($request->selected_fltranche != null && $request->selected_fltranche != 0 ){

          array_push($sumfilters,$request->selected_fltranche);
        }

        if($request->selected_flilot != null && count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 ){

          array_push($sumfilters,$request->selected_flilot);
        }

        if($request->selected_fltype != null && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 ){

          array_push($sumfilters,$request->selected_fltype );
        }

        if($request->selected_flstatu != null && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 ){

          array_push($sumfilters,$request->selected_flstatu);
        }

        if($request->selected_fltypeclient != null && $request->selected_fltypeclient != "0" ){

          array_push($sumfilters,$request->selected_fltypeclient);
        }


        if($request->selected_flcommercial != null && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0 ){

          array_push($sumfilters,$request->selected_flcommercial);
        }




        $i = 0;

        $reservationsfound = [];

        $arrayprix_vente = explode(";",$request->range_prix_vente);
        $arrayreliquat = explode(";",$request->range_reliquat);

        $min_prix_vente = $arrayprix_vente[0];
        $max_prix_vente = $arrayprix_vente[1];

        $min_reliquat = $arrayreliquat[0];
        $max_reliquat = $arrayreliquat[1];
        $array_trimed_date = [];


        foreach(explode("-",$request->mydaterange) as $date){

          // Creating timestamp from given date
          $maxtimestamp = strtotime($date);

          // Creating new date format from that timestamp
          $new_date_format = date("Y-m-d", $maxtimestamp);

          array_push($array_trimed_date,str_replace(' ','',$new_date_format));
        }



        switch (count($sumfilters)) {

          case 0:





            foreach (Reservation::get() as $key => $res) {
              # code...
              $singlelot = $res->lot;





                    if($singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                    {


                        array_push($reservationsfound,$res);
                    }


            }





          break;

          case 1:
            # code...

            if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) > 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0)
            {



              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;




                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {



                          array_push($reservationsfound,$res);
                      }


              }





            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) > 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id, $request->selected_fltype) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }




            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) > 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0)
            {



              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($res->statu_id, $request->selected_flstatu) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }




            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0)
            {

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if($res->client->type == $request->selected_fltypeclient && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0)
            {
              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($res->commercial_id,$request->selected_flcommercial) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }

            break;
            case 2:
            # code...

            if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }


            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($res->statu_id,$request->selected_flstatu)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && $res->client->type == $request->selected_fltypeclient  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && in_array($res->statu_id,$request->selected_flstatu)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($res->statu_id,$request->selected_flstatu) && $res->client->type == $request->selected_fltypeclient  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if($res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }

            break;

            case 3:
            # code...



             if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && in_array($res->statu_id,$request->selected_flstatu)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($res->statu_id,$request->selected_flstatu) && $res->client->type == $request->selected_fltypeclient  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && $res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->statu_id,$request->selected_flstatu)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial)   && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){


              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){



              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if($res->client->type == $request->selected_fltypeclient && in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }



            break;

            case 4:
            # code...

            if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) == 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->statu_id,$request->selected_flstatu) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient == "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype)  && in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) == 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if( in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) == 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($res->statu_id,$request->selected_flstatu) && $res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }else if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) == 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($res->statu_id,$request->selected_flstatu) && in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->commercial_id,$request->selected_flcommercial) && in_array($res->commercial_id,$request->selected_flcommercial)  && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }

            }
            break;

            case 5:

               if(count($request->selected_flilot != null ? $request->selected_flilot : [] ) != 0 && count($request->selected_fltype != null ? $request->selected_fltype : [] ) != 0 && count($request->selected_flstatu != null ? $request->selected_flstatu : [] ) != 0 && $request->selected_fltypeclient != "0" && count($request->selected_flcommercial != null ? $request->selected_flcommercial : [] ) != 0){

              $arrayprix_vente = explode(";",$request->range_prix_vente);
              $arrayreliquat = explode(";",$request->range_reliquat);

              $min_prix_vente = $arrayprix_vente[0];
              $max_prix_vente = $arrayprix_vente[1];

              $min_reliquat = $arrayreliquat[0];
              $max_reliquat = $arrayreliquat[1];

              foreach (Reservation::get() as $key => $res) {
                # code...
                $singlelot = $res->lot;





                      if(in_array($singlelot->ilot_id,$request->selected_flilot) && in_array($singlelot->type_id,$request->selected_fltype) && $res->client->type == $request->selected_fltypeclient && in_array($res->statu_id,$request->selected_flstatu) && in_array($res->commercial_id,$request->selected_flcommercial) && $singlelot->prix_vente >= $min_prix_vente && $max_prix_vente >= $singlelot->prix_vente && $res->reliquat >= $min_reliquat && $max_reliquat >= $res->reliquat && $res->date_reservation >= $array_trimed_date[0] && $array_trimed_date[1] >= $res->date_reservation)
                      {


                          array_push($reservationsfound,$res);
                      }


              }



            }
            break;

        }


        $allreservations = $reservationsfound;



        $alllots = Lot::get();



        return view('contents.reservations.index',compact('allreservations','alllots','array_dates_res','default_prix_vente','default_reliquat','getreservations','allclients','allilots','allstatus','alltranches','alltypes','allcommercials'));





    }

    public function simplereservationdelete($id)
    {

        $selectedreservation = Reservation::find($id);
        $selectedreservation->lot->update(['statu_id'=>53]);


        $selectedreservation->delete();

        if($selectedreservation)
        {


            return redirect()->back()->with('success','the reservation was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted reservation !!');
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

    // public function getajaxlotnotapprove()
    // {
    //     $lotnotapprove = Supplier::where('status',0)->get();


    //     return response()->json(['status'=>200,'data'=>$lotnotapprove,'success'=>'supplier was geting successfully ']);

    // }


    public function editreservation($id)
    {
      $alllots = Lot::get();


      $allclients = Client::all();
     $allcommercials = Commercial::all();
    $allstatus = Statu::where('type','RES')->get();
    $allilots = Ilo::all();

   $alltranches = Tranche::all();
      $alltypes = Type::all();



      $selectedreservation = Reservation::where('id',$id)->first();

      return view('contents.reservations.edit',compact('selectedreservation','alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));
    }



   function updatereservation(Request $request)
   {

    if($request->selected_mytranche == "" || $request->selected_mytranche == 0 || $request->selected_mytranche == null){
         return response()->json(['status'=>'error','input'=>'selected_uptranche','msg'=>'invalid : tranche is Require ']);
       }

       if($request->selected_myilot == "" || $request->selected_myilot == 0 || $request->selected_myilot == null){
        return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid :ilot is Require ']);
      }

     if($request->selected_mylot == "" || $request->selected_mylot == 0 || $request->selected_mylot == null){
         return response()->json(['status'=>'error','input'=>'selected_uplot','msg'=>'invalid :lot is Require ']);
       }

       if($request->selected_uplistclient == "" || $request->selected_uplistclient == 0 || $request->selected_uplistclient == null){
         return response()->json(['status'=>'error','input'=>'selected_uplistclient','msg'=>'invalid : client is Require ']);
       }



       if($request->selected_upcommercial == "" || $request->selected_upcommercial == 0 || $request->selected_upcommercial == null){
         return response()->json(['status'=>'error','input'=>'selected_upcommercial','msg'=>'invalid selected_upcommercial : selected_upcommercial is Require ']);
       }


       if($request->selected_upetat == "" || $request->selected_upetat == 0 || $request->selected_upetat == null){
        return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid selected_upetat : selected_upetat is Require ']);
      }



       if($request->prix_vente ==''){
        return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid Prix Vente : Prix Vente is Require ']);
      }

      if(!is_numeric($request->prix_vente)){
       return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid prix vente :prix vente must be  numbers ']);
     }


     if($request->avance ==''){
       return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid avance :Prix avance is Require ']);
     }

     if(!is_numeric($request->avance)){
      return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid  avance :avance must be  numbers ']);
    }


     if($request->date_reservation ==''){
       return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
     }



     // if(Reservation::whereDate('date_reservation', '=', $request->date_reservation)->first() != null){
     //     return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid date reservation :date reservation is Already Used ']);
     // }



     $selectedlot= Lot::where('id',$request->selected_mylot);


     if($request->selected_uptypeclient == 'investisseur')
     {

      $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>54]);

     }else if($request->selected_uptypeclient == 'client_final'){
      $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>56]);

     }


     if($request->selected_upetat == 72){

      $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>57]);

     }


     $calc_reliquat = ($request->prix_vente - $request->avance);


       $arryaydata = [

         "client_id"=>$request->selected_uplistclient,
         "commercial_id"=>$request->selected_upcommercial,
         "avance" =>$request->avance,
         "reliquat" =>$calc_reliquat,
         "statu_id"=>$request->selected_upetat,
         "date_reservation" => $request->date_reservation,
        "remarque_desc"=>$request->remarque_desc

     ];


    $isupdated =  Reservation::where('id',$request->reservation_id)->update($arryaydata);




    if($isupdated)
    {
     return response()->json(['status'=>'success','msg'=>'Reservation was Updated successfully ']);
    }else{
     return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant update Reservation  ']);
    }





 }

    public function multideletereservations(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);




       if(count($ids_array)>0){

             foreach($ids_array as $item)
             {
                $selectedreservation = Reservation::find($item);

                $selectedreservation->lot->update(['statu_id'=>53]);

                $selectedreservation->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les reservations selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les reservations selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un reservations  ']);
       }

    }

    public function createnewreservation()
    {
      $alllots = Lot::where('statu_id',53)->get();



      $allclients = Client::all();
     $allcommercials = Commercial::all();
    $allstatus = Statu::where('type','RES')->get();
    $allilots = Ilo::all();

   $alltranches = Tranche::all();
      $alltypes = Type::all();

      return view('contents.reservations.create',compact('alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));
   }

    public function storenewreservation(Request $request)
    {


      if($request->selected_uptranche == "" || $request->selected_uptranche == 0 || $request->selected_uptranche == null){
        return response()->json(['status'=>'error','input'=>'selected_uptranche','msg'=>'invalid : tranche is Require ']);
      }

      if($request->selected_upilot == "" || $request->selected_upilot == 0 || $request->selected_upilot == null){
       return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid :ilot is Require ']);
     }

    if($request->selected_uplot == "" || $request->selected_uplot == 0 || $request->selected_uplot == null){
        return response()->json(['status'=>'error','input'=>'selected_uplot','msg'=>'invalid :lot is Require ']);
      }

      if($request->selected_uplistclient == "" || $request->selected_uplistclient == 0 || $request->selected_uplistclient == null){
        return response()->json(['status'=>'error','input'=>'selected_uplistclient','msg'=>'invalid : client is Require ']);
      }



      if($request->selected_upcommercial == "" || $request->selected_upcommercial == 0 || $request->selected_upcommercial == null){
        return response()->json(['status'=>'error','input'=>'selected_upcommercial','msg'=>'invalid selected_upcommercial : selected_upcommercial is Require ']);
      }


      if($request->selected_upetat == "" || $request->selected_upetat == 0 || $request->selected_upetat == null){
       return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid selected_upetat : selected_upetat is Require ']);
     }


          if($request->prix_vente ==''){
            return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid Prix Vente : Prix Vente is Require ']);
          }

          if(!is_numeric($request->prix_vente)){
            return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid prix vente :prix vente must be  numbers ']);
        }




        if($request->avance ==''){
          return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid avance :Prix avance is Require ']);
        }

        if(!is_numeric($request->avance)){
          return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid  avance :avance must be  numbers ']);
      }





        if($request->date_reservation ==''){
          return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
        }



        // if(Reservation::whereDate('date_reservation', '=', $request->date_reservation)->first() != null){
        //     return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid date reservation :date reservation is Already Used ']);
        // }



       $selectedlot= Lot::where('id',$request->selected_uplot);


       if($request->selected_uptypeclient == 'investisseur')
       {

        $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>54]);

       }else if($request->selected_uptypeclient == 'client_final'){
        $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>56]);

       }


       if($request->selected_upetat == 72){

        $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>57]);

       }




        $calc_reliquat = ($request->prix_vente - $request->avance);

        $getidlot = $selectedlot->first()->id;



        if(Reservation::where('lot_id',$getidlot)->first() == null){

          $arryaydata = [
            "name" =>$request->num_lot,
            "lot_id"=>$getidlot,
            "client_id"=>$request->selected_uplistclient,
            "commercial_id"=>$request->selected_upcommercial,
            "avance" =>$request->avance,
            "reliquat" =>$calc_reliquat,
            "member_id"=>Auth::user()->id,
            "statu_id"=>$request->selected_upetat,
            "date_reservation" => $request->date_reservation,
            "remarque_desc"=>$request->remarque_desc,

        ];


       $iscreated =  Reservation::create($arryaydata);




       if($iscreated)
       {
        return response()->json(['status'=>'success','msg'=>'Reservation was added successfully ']);
       }else{
        return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant adde Reservation  ']);
       }

        }else{
          return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error : the Reservation is already created for this lot   ']);
        }



    }


}