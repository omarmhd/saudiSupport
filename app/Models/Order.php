<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_no',
        'order_no',
        'product_name',
        'type_order',
        'details',
        'order_journey',
        'note_tech',
        'attachments',
        'track',
    ];

    public  function color_journey($data){


        if($data->order_journey=="0"){
            return "<span class='p-1' style='background: #00ccff'> New </span>";
        }elseif ($data->order_journey=="1"){
            return "<span class='p-1' style='background: #d1de5c'> Tracking </span>";
        }elseif ($data->order_journey=="2"){
            return "<span class='p-1'  style='background: #1ee000'> Order completed </span>";

        }elseif ($data->order_journey=="3") {
            return "<span class='p-1'  style='background: #4c70ff'> Preview </span>";


        }else{
            return "<span class='p-1' style='background: #3b4346'> order canceled </span>";

        }


    }
}
