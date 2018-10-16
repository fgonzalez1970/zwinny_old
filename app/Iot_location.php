<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iot_location extends Model
{
    protected $fillable = [
        'description','address','coordinates','date_up','date_down','created_at','updated_at',
    ];
    //
}
