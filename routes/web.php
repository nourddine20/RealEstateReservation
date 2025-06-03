<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/post-ajax-demande',[App\Http\Controllers\DemandeController::class,'postajaxdemande'])->name('getajaxpost.demande');

 Route::get('/admin/login',[App\Http\Controllers\AdminAuthController::class,'formlogin'])->name('admin.getlogin');
  Route::post('/admin/post-login', [App\Http\Controllers\AdminAuthController::class,'postlogin'])->name('admin.postlogin');

  Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin.home');
  Route::post('/admin/logout', [App\Http\Controllers\AdminAuthController::class,'logout'])->name('admin.logout');

  /////// AJAX REQUIRESTS FOR ANALYTIC FILTER BY DATE /////////

Route::get('analytic.filterajaxbydate',[App\Http\Controllers\AdminController::class,'index'])->name('analytic.filterajaxbydate');

//////////////////////////




Route::group(['middleware' => 'auth:web'], function () {


Route::group(['middleware'=>'ismember'],function(){


        Route::get('/admin/ilos/all',[App\Http\Controllers\LotController::class,'viewallilos'])->name('all.ilos');
        Route::post('/admin/ilos/create',[App\Http\Controllers\LotController::class,'createnewilo'])->name('create.ilo');

        Route::post('/admin/ilo/{id}/update',[App\Http\Controllers\LotController::class,'updateilo'])->name('update.ilo');

        Route::get('/admin/ilo/{id}/delete',[App\Http\Controllers\LotController::class,'simpleilodelete'])->name('delete.ilo');
        Route::post('/admin/ilo/multi-delete',[App\Http\Controllers\LotController::class,'multideleteilos'])->name('multidelete.ilos');




        Route::get('/admin/types/all',[App\Http\Controllers\LotController::class,'viewalltypes'])->name('all.types');
        Route::post('/admin/types/create',[App\Http\Controllers\LotController::class,'createnewtype'])->name('create.type');

        Route::post('/admin/type/{id}/update',[App\Http\Controllers\LotController::class,'updatetype'])->name('update.type');

        Route::get('/admin/type/{id}/delete',[App\Http\Controllers\LotController::class,'simpletypedelete'])->name('delete.type');
        Route::post('/admin/type/multi-delete',[App\Http\Controllers\LotController::class,'multideletetypes'])->name('multidelete.types');


        Route::get('/admin/tranches/all',[App\Http\Controllers\LotController::class,'viewalltranches'])->name('all.tranches');
        Route::post('/admin/tranches/create',[App\Http\Controllers\LotController::class,'createnewtranche'])->name('create.tranche');

        Route::post('/admin/tranche/{id}/update',[App\Http\Controllers\LotController::class,'updatetranche'])->name('update.tranche');

        Route::get('/admin/tranche/{id}/delete',[App\Http\Controllers\LotController::class,'simpletranchedelete'])->name('delete.tranche');

        Route::post('/admin/tranche/multi-delete',[App\Http\Controllers\LotController::class,'multideletetranches'])->name('multidelete.tranches');



        ////  start gestion les client en admin panel

        Route::get('/admin/clients/all',[App\Http\Controllers\ClientController::class,'index'])->name('all.clients');

        Route::post('/admin/client/create',[App\Http\Controllers\ClientController::class,'createnewclient'])->name('createnew.client');

        Route::get('/admin/client/{id}/profile',[App\Http\Controllers\ClientController::class,'viewprofile'])->name('profile.client');

        Route::post('/admin/client/{id}/update',[App\Http\Controllers\ClientController::class,'updateclient'])->name('update.client');

        Route::get('/admin/client/{id}/delete',[App\Http\Controllers\ClientController::class,'simpleclientdelete'])->name('delete.client');

        Route::post('/admin/client/multi-delete',[App\Http\Controllers\ClientController::class,'multideleteclients'])->name('multidelete.clients');


        ////  end gestion les client  en admin panel



        ///// start gestion Commercials /////


        Route::get('/admin/commercials/all',[App\Http\Controllers\CommercialController::class,'index'])->name('all.commercials');

        Route::post('/admin/commercial/create',[App\Http\Controllers\CommercialController::class,'createnewcommercial'])->name('createnew.commercial');

        Route::get('/admin/commercial/{id}/profile',[App\Http\Controllers\CommercialController::class,'viewprofile'])->name('profile.commercial');

        Route::post('/admin/commercial/{id}/update',[App\Http\Controllers\CommercialController::class,'updatecommercial'])->name('update.commercial');

        Route::get('/admin/commercial/{id}/delete',[App\Http\Controllers\CommercialController::class,'simplecommercialdelete'])->name('delete.commercial');

        Route::post('/admin/commercial/multi-delete',[App\Http\Controllers\CommercialController::class,'multideletecommercials'])->name('multidelete.commercials');



        ///:::: End gestion Commercials /////////

        //// START status of Reservation

        Route::get('/admin/reservation/status',[App\Http\Controllers\StatuController::class,'getreservationstatus'])->name('all.reservstatus');

        /// ajax request status ::::::: ///////
        Route::post('/admin/reservation/status/add',[App\Http\Controllers\StatuController::class,'addnewstatu'])->name('addnew.resevstatus');
        ////
        Route::post('/admin/reservation/status/{id}/delete',[App\Http\Controllers\StatuController::class,'deleteajaxstatu'])->name('ajaxdelete.resevstatu');

        Route::post('/admin/reservation/status/update',[App\Http\Controllers\StatuController::class,'updateajaxstatu'])->name('ajaxupdate.resevstatu');



        //// end STATUS OF reservation




        //// Start Gestion des demandes ::::::::::

        Route::get('/admin/demandes/all',[App\Http\Controllers\DemandeController::class,'index'])->name('all.demandes');

        Route::get('/admin/demande/{id}/delete',[App\Http\Controllers\DemandeController::class,'simpledemandedelete'])->name('delete.demande');

        Route::post('/admin/demande/multi-delete',[App\Http\Controllers\DemandeController::class,'multideletedemandes'])->name('multidelete.demandes');

        Route::post('/admin/demande/statu/change',[App\Http\Controllers\StatuController::class,'changestatu'])->name('change.demandestatu');


        ///// END  Gestion Des Demandes ::::://///

        //// START status of Demandes

        Route::get('/admin/demandes/status',[App\Http\Controllers\StatuController::class,'getdemandestatus'])->name('all.demandestatus');

        /// ajax request status ::::::: ///////
        Route::post('/admin/demande/status/add',[App\Http\Controllers\StatuController::class,'addnewstatu'])->name('addnew.demandestatu');
        ////

        Route::post('/admin/demande/status/{id}/delete',[App\Http\Controllers\StatuController::class,'deleteajaxstatu'])->name('ajaxdelete.demandestatu');


        Route::post('/admin/demande/status/update',[App\Http\Controllers\StatuController::class,'updatestatu'])->name('update.demandestatu');



        //// end STATUS OF demandes


        //// :::: Gestion des Reservations :::: /////



        Route::get('/admin/reservations/all',[App\Http\Controllers\ReservationController::class,'index'])->name('all.reservations');

        Route::get('/admin/reservation/create',[App\Http\Controllers\ReservationController::class,'createnewreservation'])->name('createnew.reservation');
        // Route::get('/admin/reservation/create',[App\Http\Controllers\ReservationController::class,'createnewreservation'])->name('create.reservation');
        Route::post('/admin/reservation/store',[App\Http\Controllers\ReservationController::class,'storenewreservation'])->name('store.reservation');

        Route::get('/admin/reservation/{id}/edit',[App\Http\Controllers\ReservationController::class,'editreservation'])->name('edit.reservation');

        Route::post('/admin/reservation/update',[App\Http\Controllers\ReservationController::class,'updatereservation'])->name('update.reservation');


        Route::get('/admin/reservation/{id}/delete',[App\Http\Controllers\ReservationController::class,'simplereservationdelete'])->name('delete.reservation');

        Route::post('/admin/reservations/multi-delete',[App\Http\Controllers\ReservationController::class,'multideletereservations'])->name('multidelete.reservations');




        ///  AJAX FOR FILTERS LOTS INDEX PAGE /////

        Route::post('/get-ajax-reservations-filters',[App\Http\Controllers\ReservationController::class,'ajaxfilterallreservations'])->name('ajaxfilterall.reservations');

        ////


        //////////////////////////////////////////////


    ///// :::  Gestion Members :::: ////::

    Route::group(['middleware' =>'isadmin'], function () {

        Route::get('/admin/members/all',[App\Http\Controllers\AdminController::class,'showallmembers'])->name('all.members');

        Route::get('/admin/member/{id}/delete',[App\Http\Controllers\AdminController::class,'simplememberdelete'])->name('delete.member');
        // Route::get('/admin/member/{id}/changestatus/{status}',[App\Http\Controllers\AdminController::class,'changestatus'])->name('changestatus.client');
        Route::post('/admin/member/delete',[App\Http\Controllers\AdminController::class,'ajaxmemberdelete'])->name('ajaxdelete.member');
        Route::post('/admin/member/create',[App\Http\Controllers\AdminController::class,'createnewmember'])->name('createnew.member');
        Route::post('/admin/member/update',[App\Http\Controllers\AdminController::class,'updatemember'])->name('update.member');
        Route::get('/admin/member/{id}/profile',[App\Http\Controllers\AdminController::class,'viewprofile'])->name('profile.member');


    });


    //////  Gestion  members :::: /////


    //// START gestion de lots



    Route::get('/admin/lot/create',[App\Http\Controllers\LotController::class,'createnewlot'])->name('createnew.lot');

    Route::post('/admin/lot/store',[App\Http\Controllers\LotController::class,'storenewlot'])->name('store.lot');

    // Route::get('/admin/lot/{id}/',[App\Http\Controllers\CommercialController::class,'viewprofile'])->name('profile.commercial');

    Route::get('/admin/lot/{id}/edit',[App\Http\Controllers\LotController::class,'editlot'])->name('edit.lot');

    Route::post('/admin/lot/update',[App\Http\Controllers\LotController::class,'updatelot'])->name('update.lot');

    Route::get('/admin/lot/{id}/delete',[App\Http\Controllers\LotController::class,'simplelotdelete'])->name('delete.lot');

    Route::post('/admin/lots/multi-delete',[App\Http\Controllers\LotController::class,'multideletelots'])->name('multidelete.lots');




    //// end gestion de lots


    /// /// SWITCHERS ////

    Route::get('/switchers/all',[App\Http\Controllers\SettingController::class,'editswitchers'])->name('change.switchers');


    /////////




      });

      Route::post('/admin/reservation/get-selected-from-tranche',[App\Http\Controllers\FilterAjaxController::class,'getajaxselectedfromtranche'])->name('getajax.selectedfromtranche');


      Route::post('/admin/reservation/get-selected-from-ilot',[App\Http\Controllers\FilterAjaxController::class,'getajaxselectedfromilot'])->name('getajax.selectedfromilot');

      Route::post('/admin/reservation/get-ajax-singlelot',[App\Http\Controllers\FilterAjaxController::class,'getajaxsinglelot'])->name('getajax.singlelot');


      Route::post('admin/reservation/get-ajax-from-typeclient',[App\Http\Controllers\FilterAjaxController::class,'getajaxfromtypeclient'])->name('getajax.selectedfromtypeclient');

      Route::get('/admin/reservation/get-ajax-ilots/id',[App\Http\Controllers\FilterAjaxController::class,'getajaxilots'])->name('getajaxilots');


      Route::group(['middleware' =>'isnotinvesstisseur'], function () {

      Route::get('/admin/lots/all',[App\Http\Controllers\LotController::class,'index'])->name('all.lots');

      ///  AJAX FOR FILTERS LOTS INDEX PAGE /////


      Route::post('/get-ajax-lots-filters',[App\Http\Controllers\LotController::class,'ajaxfilteralllots'])->name('ajaxfilterall.lots');



      ////
      });

});