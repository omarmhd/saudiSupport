<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\FileService;
use Illuminate\Http\Request;

class Attachment extends Controller
{
    public function store(Request $request,$id,FileService $fileService){

    $order=Order::findorFail($id)->attchments()->create();
        $attachments = [];
        foreach ($request->attachment as $key => $value) {
            $attachments[$key]['attachment'] = $fileService->upload($request->attachment[$key], 'files');;
        }
        $order->attachments()->createMany($attachments);

    }
}
