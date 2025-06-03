<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('adminauth:admin');
    // }


    public function index()
    {
        $allclients = Client::latest()->get();
        $alltypeclient = Client::distinct()->where('type','!=','')->get();


       return view('contents.clients.index',compact('allclients','alltypeclient'));

    }

    public function simpleclientdelete($id)
    {

        $clientfordel = Client::where('id',$id);



        $clientfordel->delete();

        if($clientfordel)
        {


            return redirect()->back()->with('success','the Client was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted Client !!');
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

   function updateclient(Request $request)
    {

        if(is_numeric($request->phone)){

            if(strlen($request->phone) == 10){
                $phone = $request->phone;
            }else{
                return response()->json(['status'=>'error','input'=>'phone','msg'=>'Telephone invalide : le telephone doit comporter 10 numeros ']);
            }

        }else{
            return response()->json(['status'=>'error','input'=>'phone','msg'=>'Telephone invalide : le telephone doit être compose de chiffres ']);
        }

        // if(strlen($request->password) > 8)
        // {
        //     $password = $request->password;
        // }else
        // {
        //     return response()->json(['status:error','invalid password :password must be at less it 8 characherts ']);
        // }



        $arryaydata = [
            'name' => $request->name,
            'phone' => $phone,
            'city' => $request->city,
            'email' => $request->email,
            'cin' => $request->cin,
            'type'=>$request->selected_type

            // 'password' => Hash::make($password),
        ];



        Client::where('id',$request->id)->update($arryaydata);


        return response()->json(['status'=>'success','msg'=>'Client was updated successfully ']);


    }

    public function multideleteclients(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);




       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Client::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les Clients selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les Clients selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un client  ']);
       }

    }

    public function createnewclient(Request $request)
    {

          $phone='';
          $password ='';
          $email = '';


            if(is_numeric($request->phone)){

                if(strlen($request->phone) == 10){
                    $phone = $request->phone;
                }else{
                    return response()->json(['status'=>'error','input'=>'phone','msg'=>'Telephone invalide : le telephone doit comporter 10 numeros ']);
                }

            }else{
                return response()->json(['status'=>'error','input'=>'phone','msg'=>'Telephone invalide : le telephone doit être compose de chiffres ']);
            }






            // if(strlen($request->password) > 8)
            // {
            //     $password = $request->password;
            // }else
            // {
            //     return response()->json(['status'=>'error','msg'=>'invalid password :password must be at less it 8 characherts ']);
            // }




            $arryaydata = [
                'name' => $request->name,
                'phone' => $phone,
                'city' => $request->city,
                'email' => $request->email,
                'cin' => $request->cin,
                'type'=>$request->selected_type

            ];



            // dd($arryaydata);

            Client::create($arryaydata);


            return response()->json(['status'=>'success','msg'=>'Client was added successfully ']);



    }




}