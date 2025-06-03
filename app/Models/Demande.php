<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    //

    protected $fillable = [
        'name',
        'phone',
        'statu_id',
        'city',
        'message',
        'email',

    ];

    public function statu(){

            return $this->belongsTo(Statu::class,'statu_id','id');

    }


}