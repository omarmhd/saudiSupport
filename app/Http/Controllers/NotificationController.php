<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }
    public function read($id){
        $notification=auth()->user()->notifications()->find($id);

        $notification->markAsRead();
        return redirect()->to($notification->data['action']);

    }
    public function readAll(){
        $notifications=auth()->user()->notifications()->get();
          foreach($notifications as $notification ) {
              $notification->markAsRead();
        }
        return redirect()->back();


    }

}
