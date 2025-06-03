<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    protected $fillable = [
        'role_name',


    ];

    public function members()
    {
        return $this->hasMany(User::class,'role_id','id');
    }


}
