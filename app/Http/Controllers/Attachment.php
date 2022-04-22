<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Attachment extends Controller
{
    public function attachments (Request $request, $id, FileService $fileService){
        $validator =Validator::make($request->all(),[
            'attachment.*'=>'required'
        ]);


        if ($validator->fails()) {

            return response()->json(['error'=>'']);
        }

    $order=Order::find(110);


        $attachments = [];
        foreach ($request->attachment as $key => $value) {
            $attachments[$key]['attachment'] = $fileService->upload_file($request->attachment[$key], 'files');;
        }
        $order->attachments()->createMany($attachments);

      return response()->json(['order'=>$order->attachments()->get()],200);

    }
}
