<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Lot;

class AnalyticController extends Controller
{
    //

    public function filteranalytic_bydate(Request $request)
    {
        $getreservedlots = [];
        $total_avances = 0;
        $total_reliquat = 0;


        foreach (Lot::all() as $key => $lot) {
            # code...

            if(Reservation::where('lot_id',$lot->id)->first() != null){
                $res_for_lot = Reservation::where('lot_id',$lot->id)->first();

                if($request->end_date >= $res_for_lot->date_reservation &&  $res_for_lot->date_reservation >= $request->start_date){
                    $total_avances += Reservation::where('lot_id',$lot->id)->first()->avance;
                    $total_reliquat += Reservation::where('lot_id',$lot->id)->first()->reliquat;
                 array_push($getreservedlots,$lot);

                }

            }
        }

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
       foreach ($getreservedlots as $key => $singlelot) {
        # code...

            if($singlelot->statu_id == 57){
                $sum_prix_vente_vendulots +=$singlelot->prix_vente;
                $sum_nbr_lots_vendu +=1;

            }

            if($singlelot->statu_id == 56){
                $sum_prix_vente_reservelots +=$singlelot->prix_vente;
                $sum_nbr_lots_reserve +=1;

            }

            if($singlelot->statu_id == 54){

                $sum_nbr_lots_investisseur +=1;

            }


            if($singlelot->statu_id == 53){

                $sum_nbr_lots_libre +=1;

            }

       }

       $degree_sum_nbr_lots_reserve = (100*$sum_nbr_lots_reserve)/$sum_nbr_all_lots;
       $degree_sum_nbr_lots_vendu = (100*$sum_nbr_lots_vendu)/$sum_nbr_all_lots;
       $degree_sum_nbr_lots_investisseur = (100*$sum_nbr_lots_investisseur)/$sum_nbr_all_lots;
       $degree_sum_nbr_lots_libre =  (100*$sum_nbr_lots_libre)/$sum_nbr_all_lots;

        $PostData =[
            'CA_LOTS_VENDUS'=>$sum_prix_vente_vendulots,
            'CA_LOTS_RESERVES'=>$sum_prix_vente_reservelots,
            'TOTAL_AVANCES'=>$total_avances,
            'TOTAL_RELIQUATS'=>$total_reliquat,
            'Nbr_Lots_Libres'=>$sum_nbr_lots_libre,
            'Degree_Nbr_Lots_Libres'=>$degree_sum_nbr_lots_libre,
            'Nbr_Lots_Investisseurs'=>$sum_nbr_lots_investisseur,
            'Degree_Nbr_Lots_Investisseurs'=>$degree_sum_nbr_lots_investisseur,
            'Nbr_Lots_Reserves'=>$sum_nbr_lots_reserve,
            'Degree_Nbr_Lots_Reserves'=>$degree_sum_nbr_lots_reserve,
            'Nbr_Lots_Vendus'=>$sum_nbr_lots_vendu,
            'Degree_Nbr_Lots_Vendus'=>$degree_sum_nbr_lots_vendu,


        ];

        return response()->json(['status'=>200,'data'=>$PostData,'msg'=>'data was get it success']);
    }
}
