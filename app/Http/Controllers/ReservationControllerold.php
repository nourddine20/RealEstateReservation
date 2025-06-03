 <?php
/** */
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Lot;
// use App\Models\Client;
// use App\Models\Commercial;
// use App\Models\Ilo;
// use App\Models\IlotLot;
// use App\Models\Reservation;
// use App\Models\Type;
// use App\Models\ReservationLot;
// use App\Models\Statu;
// use App\Models\Tranche;
// use Carbon\Carbon;
// use Illuminate\Support\Facades\Auth;


// class ReservationController extends Controller
// {
//     //

//     public function getajaxselectedfromtranche(Request $request){




//         $ajaxdata = Tranche::find($request->selected_id)->ilots;

//         return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' ilots was geting successfully ']);





//     }


//     public function getajaxsinglelot(Request $request)
//     {

//       $ajaxdata = Lot::where('id',$request->selected_id)->first();


//       return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' ilots was geting successfully ']);


//     }

//     public function getajaxfromtypeclient(Request $request){


//       $ajaxdata = Client::where('type',$request->selected_id)->get();


//       return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>' clients was geting successfully ']);


//     }

//     public function getajaxselectedfromilot(Request $request)
//     {

//       $ajaxdata = Ilo::find($request->selected_id)->lots;


//       return response()->json(['status'=>200,'data'=>$ajaxdata,'success'=>'lots was geting successfully ']);

//     }


//     public function index()
//     {
//         $allreservations = Reservation::all();
//         $alllots = Lot::where('statu_id',53)->get();


//          $allclients = Client::all();
//         $allcommercials = Commercial::all();
//        $allstatus = Statu::where('type','RES')->get();
//        $allilots = Ilo::all();

//       $alltranches = Tranche::all();
// $alltypes = Type::all();

// $alllots = Lot::all();

//        return view('contents.reservations.index',compact('allreservations','alllots','alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));

//     }

//     public function simplereservationdelete($id)
//     {

//         $selectedreservation = Reservation::find($id);
//         $selectedreservation->lot->update(['statu_id'=>53]);


//         $selectedreservation->delete();

//         if($selectedreservation)
//         {


//             return redirect()->back()->with('success','the reservation was deleted successfuly');
//         }else{

//             return redirect()->back()->with('error','sorry cant deleted reservation !!');
//         }


//     }

//     // public function ajaxdelete($id)
//     // {
//     //     $lotfordel = Supplier::where('id',$id);

//     //     if(!$lotfordel)
//     //     {
//     //         return response()->json(['status'=>'error','error'=>'cant find supplier ']);
//     //     }else{

//     //         $lotfordel->delete();

//     //         if($lotfordel){
//     //             return response()->json(['status'=>200,'success'=>'supplier was added successfully ']);
//     //         }else{
//     //             return response()->json(['status'=>'error','error'=>'cant delete supplier ']);
//     //         }
//     //     }


//     // }

//     // public function getajaxlotnotapprove()
//     // {
//     //     $lotnotapprove = Supplier::where('status',0)->get();


//     //     return response()->json(['status'=>200,'data'=>$lotnotapprove,'success'=>'supplier was geting successfully ']);

//     // }


//     public function editreservation($id)
//     {
//       $alllots = Lot::where('statu_id',53)->get();


//       $allclients = Client::all();
//      $allcommercials = Commercial::all();
//     $allstatus = Statu::where('type','RES')->get();
//     $allilots = Ilo::all();

//    $alltranches = Tranche::all();
//       $alltypes = Type::all();


//       $selectedreservation = Reservation::where('id',$id)->first();

//       return view('contents.reservations.edit',compact('selectedreservation','alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));
//     }



//    function updatereservation(Request $request)
//    {

//     if($request->selected_mytranche == "" || $request->selected_mytranche == 0 || $request->selected_mytranche == null){
//          return response()->json(['status'=>'error','input'=>'selected_uptranche','msg'=>'invalid : tranche is Require ']);
//        }

//        if($request->selected_myilot == "" || $request->selected_myilot == 0 || $request->selected_myilot == null){
//         return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid :ilot is Require ']);
//       }

//      if($request->selected_mylot == "" || $request->selected_mylot == 0 || $request->selected_mylot == null){
//          return response()->json(['status'=>'error','input'=>'selected_uplot','msg'=>'invalid :lot is Require ']);
//        }

//        if($request->selected_uplistclient == "" || $request->selected_uplistclient == 0 || $request->selected_uplistclient == null){
//          return response()->json(['status'=>'error','input'=>'selected_uplistclient','msg'=>'invalid : client is Require ']);
//        }



//        if($request->selected_upcommercial == "" || $request->selected_upcommercial == 0 || $request->selected_upcommercial == null){
//          return response()->json(['status'=>'error','input'=>'selected_upcommercial','msg'=>'invalid selected_upcommercial : selected_upcommercial is Require ']);
//        }


//        if($request->selected_upetat == "" || $request->selected_upetat == 0 || $request->selected_upetat == null){
//         return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid selected_upetat : selected_upetat is Require ']);
//       }



//        if($request->prix_vente ==''){
//         return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid Prix Vente : Prix Vente is Require ']);
//       }

//       if(!is_numeric($request->prix_vente)){
//        return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid prix vente :prix vente must be  numbers ']);
//      }


//      if($request->avance ==''){
//        return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid avance :Prix avance is Require ']);
//      }

//      if(!is_numeric($request->avance)){
//       return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid  avance :avance must be  numbers ']);
//     }





//      if($request->date_reservation ==''){
//        return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
//      }



//      // if(Reservation::whereDate('date_reservation', '=', $request->date_reservation)->first() != null){
//      //     return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid date reservation :date reservation is Already Used ']);
//      // }



//      $selectedlot= Lot::where('id',$request->selected_mylot);

//      $selectedlot->update(['prix_vente'=>$request->prix_vente]);



//      $calc_reliquat = ($request->prix_vente - $request->avance);


//        $arryaydata = [

//          "client_id"=>$request->selected_uplistclient,
//          "commercial_id"=>$request->selected_upcommercial,
//          "avance" =>$request->avance,
//          "reliquat" =>$calc_reliquat,
//          "statu_id"=>$request->selected_upetat,
//          "date_reservation" => $request->date_reservation,


//      ];


//     $isupdated =  Reservation::where('id',$request->reservation_id)->update($arryaydata);




//     if($isupdated)
//     {
//      return response()->json(['status'=>'success','msg'=>'Reservation was Updated successfully ']);
//     }else{
//      return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant update Reservation  ']);
//     }





//  }

//     public function multideletereservations(Request $request)
//     {



//      if($request->idsfordelete[0] != null){


//        $ids_array =  explode(',',$request->idsfordelete[0]);




//        if(count($ids_array)>0){

//              foreach($ids_array as $item)
//              {
//                 $selectedreservation = Reservation::find($item);

//                 $selectedreservation->lot->update(['statu_id'=>53]);

//                 $selectedreservation->delete();

//              }

//              return response()->json(['status'=>'success','msg'=>'les reservations selectioner ont été supprimer  ']);

//         }else{

//               return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les reservations selectioner ']);

//         }

//        }else{
//          return response()->json(['status'=>'error','msg'=>'choisi au moins un reservations  ']);
//        }

//     }

//     public function createnewreservation()
//     {
//       $alllots = Lot::where('statu_id',53)->get();


//       $allclients = Client::all();
//      $allcommercials = Commercial::all();
//     $allstatus = Statu::where('type','RES')->get();
//     $allilots = Ilo::all();

//    $alltranches = Tranche::all();
//       $alltypes = Type::all();
//       return view('contents.reservations.create',compact('alltypes','allilots','alltranches','allclients','allstatus','alllots','allcommercials'));
//    }

//     public function storenewreservation(Request $request)
//     {



//       if($request->selected_uptranche == "" || $request->selected_uptranche == 0 || $request->selected_uptranche == null){
//         return response()->json(['status'=>'error','input'=>'selected_uptranche','msg'=>'invalid : tranche is Require ']);
//       }

//       if($request->selected_upilot == "" || $request->selected_upilot == 0 || $request->selected_upilot == null){
//        return response()->json(['status'=>'error','input'=>'selected_upilot','msg'=>'invalid :ilot is Require ']);
//      }

//     if($request->selected_uplot == "" || $request->selected_uplot == 0 || $request->selected_uplot == null){
//         return response()->json(['status'=>'error','input'=>'selected_uplot','msg'=>'invalid :lot is Require ']);
//       }

//       if($request->selected_uplistclient == "" || $request->selected_uplistclient == 0 || $request->selected_uplistclient == null){
//         return response()->json(['status'=>'error','input'=>'selected_uplistclient','msg'=>'invalid : client is Require ']);
//       }



//       if($request->selected_upcommercial == "" || $request->selected_upcommercial == 0 || $request->selected_upcommercial == null){
//         return response()->json(['status'=>'error','input'=>'selected_upcommercial','msg'=>'invalid selected_upcommercial : selected_upcommercial is Require ']);
//       }


//       if($request->selected_upetat == "" || $request->selected_upetat == 0 || $request->selected_upetat == null){
//        return response()->json(['status'=>'error','input'=>'selected_upetat','msg'=>'invalid selected_upetat : selected_upetat is Require ']);
//      }


//           if($request->prix_vente ==''){
//             return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid Prix Vente : Prix Vente is Require ']);
//           }

//           if(!is_numeric($request->prix_vente)){
//             return response()->json(['status'=>'error','input'=>'prix_vente','msg'=>'invalid prix vente :prix vente must be  numbers ']);
//         }




//         if($request->avance ==''){
//           return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid avance :Prix avance is Require ']);
//         }

//         if(!is_numeric($request->avance)){
//           return response()->json(['status'=>'error','input'=>'avance','msg'=>'invalid  avance :avance must be  numbers ']);
//       }





//         if($request->date_reservation ==''){
//           return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid Titre Foncier :Titre Foncier is Require ']);
//         }



//         // if(Reservation::whereDate('date_reservation', '=', $request->date_reservation)->first() != null){
//         //     return response()->json(['status'=>'error','input'=>'date_reservation','msg'=>'invalid date reservation :date reservation is Already Used ']);
//         // }



//        $selectedlot= Lot::where('id',$request->selected_uplot);

//         $selectedlot->update(['prix_vente'=>$request->prix_vente,'statu_id'=>56]);


//         $calc_reliquat = ($request->prix_vente - $request->avance);

//         $getidlot = $selectedlot->first()->id;

//         if(Reservation::where('lot_id',$getidlot)->first() == null){

//           $arryaydata = [
//             "name" =>$request->num_lot,
//             "lot_id"=>$getidlot,
//             "client_id"=>$request->selected_uplistclient,
//             "commercial_id"=>$request->selected_upcommercial,
//             "avance" =>$request->avance,
//             "reliquat" =>$calc_reliquat,
//             "statu_id"=>$request->selected_upetat,
//             "date_reservation" => $request->date_reservation,


//         ];


//        $iscreated =  Reservation::create($arryaydata);




//        if($iscreated)
//        {
//         return response()->json(['status'=>'success','msg'=>'Reservation was added successfully ']);
//        }else{
//         return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : cant adde Reservation  ']);
//        }

//         }else{
//           return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error : the Reservation is already created for this lot   ']);
//         }



//     }


// }