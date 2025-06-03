<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name',
        'store_name',
        'image_store',
        'phone',
        'city',
        'address'


    ];
}
