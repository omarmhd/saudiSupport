<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request){
       $data=$request->all();
        $user=Auth::user();
         $data['user_id']=auth()->user()->id;
        $data['user_name']=auth()->user()->name;

        $message= Message::create($data);

        broadcast(new MessageSent($user, $message))->toOthers();

//        broadcast(new MessageSent($user,$message))->toOthers();

        return ['status' => 'Message Sent!'];

    }

    public function show($id){

        $messages=Message::where('order_id',$id)->get();

        return response()->json(['message'=>  $messages],200);



    }

}
