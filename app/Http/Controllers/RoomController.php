<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public  function  store(Request $request){
        $room=Room::create(
            $request->all()
        );

        return redirect()->route('room.show',$room->id )->with('success','Great room added successfully');


    }
    public function show($id){
        $roomMessage=Room::findOrfail($id);
        $orders=Order::all();
        $rooms=Room::all();

        return view('chat.index',compact('roomMessage','rooms','orders'));

    }
}
