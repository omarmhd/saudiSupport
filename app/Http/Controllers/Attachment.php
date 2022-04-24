<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Attachment AS AttachmentModel;
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

    $order=Order::findorfail($id);


        $attachments = [];
        foreach ($request->attachment as $key => $value) {
            $attachments[$key]['attachment'] = $fileService->upload_file($request->attachment[$key], 'upload_center');;
        }
        $order->attachments()->createMany($attachments);
      return response()->json(['order'=>$order->attachments()->get()],200);

    }

    public  function  getAttachments($id){

        $order=Order::findorfail($id);

        return response()->json(['order'=>  $order->attachments()->get()],200);


    }


    public function destroy($id){


        AttachmentModel::find($id)->delete();
        return response()->json('success',200);


    }
}
