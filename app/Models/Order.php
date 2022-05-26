<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

//
//    protected $fillable = [
//        'phone_no',
//        'order_no',
//        'product_name',
//        'type_order',
//        'details',
//        'order_journey',
//        'note_tech',
//        'attachments',
//        'track',
//        'extracting_policy',
//        'order_arrived',
//        'decision_taken',
//        'policy_attachment',
//        'note_warehouse',
//        'note_salah'
//    ];

    protected $guarded=[];

    public  function color_journey($data){


        if($data->order_journey=="0"){
            return "<span class='p-1'  style='background: #98db7c'> New </span>";
        }elseif ($data->order_journey=="1"){
            return "<span class='p-1' style='background: #bf8bff'> Processing </span>";
        }elseif ($data->order_journey=="2"){
            return "<span class='p-1'  style='background: #FFE27a'> Preview </span>";

        }elseif ($data->order_journey=="3") {
            return "<span class='p-1'  style='background: #8bcaff'>  completed </span>";


        }else{
            return "<span class='p-1' style='background: #ff5757'> order canceled </span>";

        }


    }
    public  function attachments (){
        return $this->hasMany(\App\Models\Attachment::class);

    }
    public function room(){

        return $this->hasOne(Room::class,'order_id','id')->withDefault();
    }







}
