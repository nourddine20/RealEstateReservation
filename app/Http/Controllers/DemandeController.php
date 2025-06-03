<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Statu;

class DemandeController extends Controller
{

    //

    public function postajaxdemande(Request $request)
    {

        if($request->name == ''){

            return response()->json(['status'=>'error','input'=>'name','msg'=>'invalid Name :Name is Require ']);
        }

        if($request->phone == ''){
            return response()->json(['status'=>'error','input'=>'phone','msg'=>'invalid Phone :Phone is Require ']);
        }
        if($request->email == ''){

            return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid email :email is Require ']);
        }

        if($request->city == ''){

            return response()->json(['status'=>'error','input'=>'city','msg'=>'invalid ville :ville is Require ']);
        }

        if($request->message == ''){

            return response()->json(['status'=>'error','input'=>'message','msg'=>'invalid message :message is Require ']);
        }


        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){


            return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Phone :your email string input must have email format ']);
        }


        if(Demande::where('email',$request->email)->first() != null)
        {
            return response()->json(['status'=>'error','input'=>'email','msg'=>'invalid Email :your email is ALready used by other person ']);
        }


        $iscreated = Demande::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'message'=>$request->message,
            'statu_id'=>39
        ]);


        if($iscreated){
            return response()->json(['status'=>'success','msg'=>'Your Demande is Submit it , we will call you soon as possible ']);
        }else{
            return response()->json(['status'=>'error','input'=>'none','msg'=>'Opps !! Error not Found : your info was not send it to us  ']);
        }

    }

    public function index()
    {
        $alldemandes = Demande::latest()->get();
      $allstatus = Statu::where('type','DEM')->get();

       return view('contents.demandes.index',compact('alldemandes','allstatus'));

    }

    public function simpledemandedelete($id)
    {

        $clientfordel = Demande::where('id',$id);



        $clientfordel->delete();

        if($clientfordel)
        {


            return redirect()->back()->with('success','the Demande was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Demande !!');
        }


    }

    // public function ajaxdelete($id)
    // {
    //     $Clientfordel = Supplier::where('id',$id);

    //     if(!$Clientfordel)
    //     {
    //         return response()->json(['status'=>'error','error'=>'cant find supplier ']);
    //     }else{

    //         $Clientfordel->delete();

    //         if($Clientfordel){
    //             return response()->json(['status'=>200,'success'=>'supplier was added successfully ']);
    //         }else{
    //             return response()->json(['status'=>'error','error'=>'cant delete supplier ']);
    //         }
    //     }


    // }

    // public function getajaxclientnotapprove()
    // {
    //     $clientnotapprove = Supplier::where('status',0)->get();


    //     return response()->json(['status'=>200,'data'=>$clientnotapprove,'success'=>'supplier was geting successfully ']);

    // }



    public function multideletedemandes(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);





       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {

               Demande::where('id',$item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les demandes selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les demandes selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un demande  ']);
       }

    }



}