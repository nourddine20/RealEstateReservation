<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ilo extends Model
{
    //
    protected $fillable = [
        'label',
        'id_tranche',

    ];

    public function tranche()
    {
        return $this->belongsTo(Tranche::class,'id_tranche','id');
    }


    public function lots()
    {
        return $this->hasMany(Lot::class,'ilot_id','id');
    }



}
