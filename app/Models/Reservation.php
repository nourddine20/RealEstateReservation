<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'statu_id',
        'client_id',
        'lot_id',
        'commercial_id',
        'member_id',
        'avance',
        'reliquat',
        'date_reservation'

    ];


  public function lot()
  {
    return $this->belongsTo(Lot::class,'lot_id','id');
  }

    public function statu(){

            return $this->belongsTo(Statu::class,'statu_id','id');


    }


    public function client(){

        return $this->belongsTo(Client::class,'client_id','id');


    }


    public function commercial(){

        return $this->belongsTo(Commercial::class,'commercial_id','id');


    }





}