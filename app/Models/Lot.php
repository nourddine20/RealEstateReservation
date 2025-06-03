<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    //
    protected $fillable = [
        'name',
        'ilot_id',
        'type_id',
        'surface',
        'titre_foncier',
        'hypotheque',
        'statu_id',
        'prix_minimaum',
        'prix_vente',
        'prix_m2',
        'avance',
        'reliquat'


    ];

    public function etat(){

        return $this->belongsTo(Statu::class,'statu_id','id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function ilot()
    {
        return $this->belongsTo(Ilo::class,'ilot_id','id');
    }

    public function reservation(){

        return $this->hasOne(Reservation::class,'lot_id','id');

    }


}
