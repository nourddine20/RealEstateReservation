<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial;

class Commercialcontroller extends Controller
{
    //



    // public function __construct()
    // {
    //     $this->middleware('adminauth:admin');
    // }


    public function index()
    {
        $allcommercials = Commercial::latest()->get();

       return view('contents.commercials.index',compact('allcommercials'));

    }

    public function simplecommercialdelete($id)
    {

        $commercialfordel = Commercial::where('id',$id);



        $commercialfordel->delete();

        if($commercialfordel)
        {


            return redirect()->back()->with('success','the commercial was deleted successfuly');
        }else{

            return redirect()->back()->with('error','sorry cant deleted commercial !!');
        }


    }

    // public function ajaxdelete($id)
    // {
    //     $commercialfordel = Supplier::where('id',$id);

    //     if(!$commercialfordel)
    //     {
    //         return response()->json(['status'=>'error','error'=>'cant find supplier ']);
    //     }else{

    //         $commercialfordel->delete();

    //         if($commercialfordel){
    //             return response()->json(['status'=>200,'success'=>'supplier was added successfully ']);
    //         }else{
    //             return response()->json(['status'=>'error','error'=>'cant delete supplier ']);
    //         }
    //     }


    // }

    // public function getajaxcommercialnotapprove()
    // {
    //     $commercialnotapprove = Supplier::where('status',0)->get();


    //     return response()->json(['status'=>200,'data'=>$commercialnotapprove,'success'=>'supplier was geting successfully ']);

    // }

   function updatecommercial(Request $request)
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


            // 'password' => Hash::make($password),
        ];



        Commercial::where('id',$request->id)->update($arryaydata);


        return response()->json(['status'=>'success','msg'=>'commercial was updated successfully ']);


    }

    public function multideletecommercials(Request $request)
    {



     if($request->idsfordelete[0] != null){


       $ids_array =  explode(',',$request->idsfordelete[0]);




       if(count($ids_array)>0){
             foreach($ids_array as $item)
             {
               Commercial::find($item)->delete();

             }

             return response()->json(['status'=>'success','msg'=>'les commercials selectioner ont été supprimer  ']);

        }else{

              return response()->json(['status'=>'error','msg'=>'ne peux pas trouve les commercials selectioner ']);

        }

       }else{
         return response()->json(['status'=>'error','msg'=>'choisi au moins un commercial  ']);
       }

    }

    public function createnewcommercial(Request $request)
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

            ];



            // dd($arryaydata);

            Commercial::create($arryaydata);


            return response()->json(['status'=>'success','msg'=>'commercial was added successfully ']);



    }


}