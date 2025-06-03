<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\Models\User;
use App\Models\Role;
use App\Models\Lot;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Session;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth:web');
    }


    public function index(Request $request)
    {

            $getreservedlots = [];
            $total_avances = 0;
            $total_reliquat = 0;
            $sum_prix_vente_vendulots = 0;
            $sum_prix_vente_reservelots = 0;
            $sum_nbr_lots_vendu = 0;
            $sum_nbr_lots_reserve = 0;
            $sum_nbr_lots_investisseur = 0;
            $sum_nbr_lots_libre = 0;
            $sum_nbr_all_lots = Lot::count('*');
            $degree_sum_nbr_lots_vendu=0;
            $degree_sum_nbr_lots_libre=0;
            $degree_sum_nbr_lots_investisseur=0;
            $degree_sum_nbr_lots_reserve=0;
            $total_avances_forchartjs = 0;



            $res_start_date ="";
            $res_end_date = "";

            $max_date_reservation = DB::select('select max(date_reservation) as max_date_res from reservations')[0]->max_date_res;
            $min_date_reservation = DB::select('select min(date_reservation) as min_date_res from reservations')[0]->min_date_res;

            if($request->ajax())
            {
                if($request->start_date != null && $request->end_date != null){
                    $res_start_date = $request->start_date;
                    $res_end_date = $request->end_date;
                }else{
                    $res_start_date = $min_date_reservation;
                    $res_end_date = $max_date_reservation;
                }

            }else{

             $res_start_date = $min_date_reservation;
             $res_end_date = $max_date_reservation;

            }


            $array_dates_res = [];


            // function dates_month($month, $year) {
            //     $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            //     $dates_month = array();

            //     for ($i = 1; $i <= $num; $i++) {
            //         $mktime = mktime(0, 0, 0, $month, $i, $year);
            //         $date = date("Y-m-d", $mktime);
            //         $dates_month[$i] = $date;
            //     }

            //     return $dates_month;
            // }


            // $res_array_thisyear = [];

            // for($i=0;$i<12;$i++){

            //     foreach(dates_month($i+1, $currentdate = explode('-', date('Y-m-d'))[0]) as $day){


            //         $res= Reservation::where('date_reservation',$day)->get();
            //         foreach($res as $singleres){

            //             array_push($res_array_thisyear,$singleres);
            //            }

            //     }



            // }





          // Creating timestamp from given date
          $maxtimestamp = strtotime($max_date_reservation);

          // Creating new date format from that timestamp
          $new_max_date_res = date("m/d/Y", $maxtimestamp);

          $mintimestamp = strtotime($min_date_reservation);

          // Creating new date format from that timestamp
          $new_min_date_res = date("m/d/Y", $mintimestamp);


               array_push($array_dates_res,$new_min_date_res);
               array_push($array_dates_res,$new_max_date_res);

               $currentdate = explode('-', date('Y-m-d'));

               $array_lot_res_mothesthisyear = [];
               $array_lot_vendu_mothesthisyear = [];
               $total_lot_reserve_formoth1 = 0;
               $total_lot_reserve_formoth2= 0;
               $total_lot_reserve_formoth3= 0;
               $total_lot_reserve_formoth4= 0;
               $total_lot_reserve_formoth5=  0;
               $total_lot_reserve_formoth6= 0;
               $total_lot_reserve_formoth7= 0;
               $total_lot_reserve_formoth8= 0;
               $total_lot_reserve_formoth9= 0;
               $total_lot_reserve_formoth10= 0;
               $total_lot_reserve_formoth11=0;
               $total_lot_reserve_formoth12= 0;

               $total_lot_vendu_formoth1 = 0;
               $total_lot_vendu_formoth2= 0;
               $total_lot_vendu_formoth3= 0;
               $total_lot_vendu_formoth4= 0;
               $total_lot_vendu_formoth5=  0;
               $total_lot_vendu_formoth6= 0;
               $total_lot_vendu_formoth7= 0;
               $total_lot_vendu_formoth8= 0;
               $total_lot_vendu_formoth9= 0;
               $total_lot_vendu_formoth10= 0;
               $total_lot_vendu_formoth11=0;
               $total_lot_vendu_formoth12= 0;

            //    dd(Reservation::WhereYear('date_reservation',$currentdate[0])->get());



               foreach (Reservation::WhereYear('date_reservation',$currentdate[0])->get() as $key => $res) {
                # code...

              if(explode('-',$res->date_reservation)[1] == 1){
                if($res->lot->statu_id == 56){
                    $total_lot_reserve_formoth1 += $res->lot->prix_vente;
                    }
                if($res->lot->statu_id == 57){
                    $total_lot_vendu_formoth1 += $res->lot->prix_vente;
                    }
                }else if(explode('-',$res->date_reservation)[1] == 2){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth2 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth2 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 3){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth3 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth3 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 4){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth4 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth4 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 5){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth5 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth5 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 6){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth6 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth6 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 7){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth7 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth7 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 8){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth8 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth8 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 9){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth9 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth9 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 10){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth10 +=$res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth10 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 11){
                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth11 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth11 += $res->lot->prix_vente;
                        }
                }else if(explode('-',$res->date_reservation)[1] == 12){

                    if($res->lot->statu_id == 56){
                        $total_lot_reserve_formoth12 += $res->lot->prix_vente;
                        }
                    if($res->lot->statu_id == 57){
                        $total_lot_vendu_formoth12 += $res->lot->prix_vente;
                        }
                }



               }

             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth1);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth2);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth3);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth4);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth5);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth6);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth7);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth8);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth9);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth10);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth11);
             array_push($array_lot_res_mothesthisyear,$total_lot_reserve_formoth12);


             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth1);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth2);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth3);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth4);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth5);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth6);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth7);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth8);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth9);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth10);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth11);
             array_push($array_lot_vendu_mothesthisyear,$total_lot_vendu_formoth12);


            foreach (Lot::all() as $key => $lot) {
                # code...
                $res_for_lot = Reservation::where('lot_id',$lot->id)->first();


                if(Reservation::where('lot_id',$lot->id)->first() != null){


                    if($res_end_date >= $res_for_lot->date_reservation &&  $res_for_lot->date_reservation >= $res_start_date){

                        if($lot->statu_id == 56){

                            $total_avances += Reservation::where('lot_id',$lot->id)->first()->avance;
                            $total_reliquat += Reservation::where('lot_id',$lot->id)->first()->reliquat;
                            $sum_prix_vente_reservelots +=$lot->prix_vente;
                        }

                     array_push($getreservedlots,$lot);


                     if($lot->statu_id == 57){
                        $sum_prix_vente_vendulots +=$lot->prix_vente;
                     }



                    }

                }



                if($lot->statu_id == 57){

                    $sum_nbr_lots_vendu +=1;

                }

                if($lot->statu_id == 56){

                    $sum_nbr_lots_reserve +=1;

                }

                if($lot->statu_id == 54){

                    $sum_nbr_lots_investisseur +=1;

                }


                if($lot->statu_id == 53){

                    $sum_nbr_lots_libre +=1;

                }

            }

        if ($sum_nbr_all_lots != 0) {
            $degree_sum_nbr_lots_reserve = (100 * $sum_nbr_lots_reserve) / $sum_nbr_all_lots;
            $degree_sum_nbr_lots_vendu = (100 * $sum_nbr_lots_vendu) / $sum_nbr_all_lots;
            $degree_sum_nbr_lots_investisseur = (100 * $sum_nbr_lots_investisseur) / $sum_nbr_all_lots;
            $degree_sum_nbr_lots_libre = (100 * $sum_nbr_lots_libre) / $sum_nbr_all_lots;

        }

           $PostData =[
            'datafor_lotres'=>$array_lot_res_mothesthisyear,
            'datafor_lotvendu'=>$array_lot_vendu_mothesthisyear,
            'sum_prix_vente_vendulots'=>number_format($sum_prix_vente_vendulots,0,'', '.'),
            'sum_prix_vente_reservelots'=>number_format($sum_prix_vente_reservelots, 0, '', '.'),
            'total_avances'=>number_format($total_avances,0,'', '.'),
            'total_reliquat'=>number_format($total_reliquat, 0,'', '.'),
            'sum_nbr_lots_libre'=>number_format($sum_nbr_lots_libre, 0,'', '.'),
            'degree_sum_nbr_lots_libre'=>number_format((float)$degree_sum_nbr_lots_libre,2,".",""),
            'sum_nbr_lots_investisseur'=>$sum_nbr_lots_investisseur,
            'degree_sum_nbr_lots_investisseur'=>number_format((float)$degree_sum_nbr_lots_investisseur,2,".",""),
            'sum_nbr_lots_reserve'=>$sum_nbr_lots_reserve,
            'degree_sum_nbr_lots_reserve'=>number_format((float)$degree_sum_nbr_lots_reserve,2,".",""),
            'sum_nbr_lots_vendu'=>$sum_nbr_lots_vendu,
            'degree_sum_nbr_lots_vendu'=>number_format((float)$degree_sum_nbr_lots_vendu,2,".",""),


        ];


        if(Auth::check()){

            if($request->ajax())
            {
               return response()->json(['status'=>200,'data'=>$PostData,'msg'=>'data was get it success']);
           }else{


            if(Auth::guard('web')->user()->role->role_name != 'COMMERCIAL'){

                return view('dashboard')->with('array_dates_res',$array_dates_res)->with('PostData',$PostData);
            }else{

                redirect()->route('all.lots');
            }


          }

        }else{

            return redirect("admin/login")->withSuccess('Opps! You do not have access');

        }
    }

    public function showallmembers()
    {

            $allmembers = User::all();
            $allroles = Role::all();
            return view('contents.settings.utilisateurs.index',compact('allmembers','allroles'));


    }

    public function simplememberdelete($id)
    {
        $memberfordel = User::where('id',$id);

        $memberfordel->delete();

        if(!$memberfordel)
        {
            return redirect()->back()->with('success','the Member was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Member !!');
        }

    }

    public function ajaxmemberdelete(Request $request)
    {
        $memberfordel = User::where('id',$request->memer_id);

        if(!$memberfordel)
        {
            return response()->json(['status'=>'error','msg'=>'cant find member ']);
        }else{

            $memberfordel->delete();

            if($memberfordel){
                return response()->json(['status'=>'success','msg'=>'member was added successfully ']);
            }else{
                return response()->json(['status'=>'error','msg'=>'cant delete member ']);
            }
        }
    }


    public function createnewmember(Request $request)
    {



        $password ='';
        $email = '';



        if($request->name == ''){
            return response()->json(['status'=>'error','input'=>'name','msg'=>'invalid Name :your name is Require ']);
        }


        if($request->email == ''){
            return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Email :your email is Require ']);
        }



          if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
              $email = $request->email;
          }else{
              return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Email :your email string input must have email format ']);
          }



            if(User::where('email',$request->email)->first() != null){
                return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid email :your email is already been taken by other member ']);
            }

         if($request->select_role_id == null){
            return response()->json(['status'=>'error','input'=>'select_role_id','msg'=>'invalid role :the Role Name is require ']);
          }



          if($request->password == ''){
            return response()->json(['status'=>'error','input'=>'password','msg'=>'invalid password :your password is Require ']);
        }

        if(strlen($request->password) > 8)
        {
            $password = $request->password;
        }else
        {
            return response()->json(['status'=>'error','input'=>'password','msg'=>'invalid password :password must be at less it 8 characherts ']);
        }


        if($request->password_confirmation == ''){
            return response()->json(['status'=>'error','input'=>'password_confirmation','msg'=>'invalid confirm password :your confirmation password is Require ']);
        }



        if($request->password_confirmation != $request->password){
            return response()->json(['status'=>'error','input'=>'password_confirmation','msg'=>'invalid confirm password :your confirmation password dosent match the password ']);
        }




          User::create([
              'name' => $request->name,
              'email' => $email,
              'role_id' => $request->select_role_id,
              'password' => Hash::make($password),
          ]);


          return response()->json(['status'=>'success','msg'=>'Member was added successfully ']);





    }


    public function updatemember(Request $request)
    {

        $password ='';
        $email = '';





        if($request->name == ''){
            return response()->json(['status'=>'error','input'=>'name','msg'=>'invalid Name :your name is Require ']);
        }


        if($request->email == ''){
            return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Email :your email is Require ']);
        }

          if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
              $email = $request->email;
          }else{
              return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Email :your email string input must have email format ']);
          }

          if($request->email != $request->oldemail)
          {
            if(User::where('email',$request->email)->first() != null){
                return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid email :your email is already been taken by other member ']);
            }
          }



          if($request->select_role_id == 'choisir' || $request->select_role_id == ''){
            return response()->json(['status'=>'error','input'=>'select_role_id','msg'=>'invalid role :the Role Name is require ']);
          }

          if($request->SwitchOption == "on"){
            if($request->password == ''){
                return response()->json(['status'=>'error','input'=>'password','msg'=>'invalid password :your password is Require ']);
            }

            if(strlen($request->password) > 8)
            {
                $password = $request->password;
            }else
            {
                return response()->json(['status'=>'error','input'=>'password','msg'=>'invalid password :password must be at less it 8 characherts ']);
            }


            if($request->password_confirmation == ''){
                return response()->json(['status'=>'error','input'=>'password_confirmation','msg'=>'invalid confirm password :your confirmation password is Require ']);
            }



            if($request->password_confirmation != $request->password){
                return response()->json(['status'=>'error','input'=>'password_confirmation','msg'=>'invalid confirm password :your confirmation password dosent match the password ']);
            }



            User::find($request->getid_member)->update([
                'name' => $request->name,
                'email' => $email,
                'role_id' => $request->select_role_id,
                'password' => Hash::make($password),
            ]);


          }else{
            User::find($request->getid_member)->update([
                'name' => $request->name,
                'email' => $email,
                'role_id' => $request->select_role_id,

            ]);
        }





          return response()->json(['status'=>'success','msg'=>'Member was added successfully ']);




    }



}
