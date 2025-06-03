<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    //
    protected $fillable = [
        'label'
    ];


    public function ilots()
    {
        return $this->hasMany(Ilo::class,'id_tranche','id');
    }


}
