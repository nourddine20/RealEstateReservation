<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function editswitchers()
    {
       
        return view('contents.settings.switchers.index');
    }

}
