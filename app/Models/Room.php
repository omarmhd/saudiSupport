<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    protected $guarded=[''];

    public  function order(){
        return $this->belongsTo(Order::class,'order_id','id')->withDefault();
    }
    public  function messages(){
        return $this->hasMany(Message::class);
    }


}
