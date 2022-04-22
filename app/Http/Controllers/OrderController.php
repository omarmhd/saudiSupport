<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\NewNotify;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Notification;
use Yajra\DataTables\Facades\DataTables;

//use Illuminate\Notifications\Notification;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $typesOrder = ['Exchange', 'Refund', 'Cancel', 'Edit', 'All', 'Preview'];

    public function index(Request $request, $journey = null)
    {

        if ($journey=="new") {
        $data = Order::where('order_journey', '0')->latest()->get();
    }else{
        $data = Order::latest()->get();

        }

    if ($request->ajax()) {

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('date', function ($data) {
                return date($data->created_at->toDateString());
            })->addColumn('order_journey', function ($data) {

                return Order::color_journey($data);
            })->addColumn('attachments', function ($data) {

                return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
            })
            ->addColumn('action', function ($data) {

                return "
                <a  class='btn btn-sm' style='background:#a9a9a9 ; color: #FFFFFF' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'All']) . " > <i class='fa fa-pen' ></i></a>"
                    . $this->show_button($data) . "  <button type='button' data-id='$data->id' style='background:#000 ; color: #FFFFFF' class='btn btn-sm  archive'
                                  > <i class='fa fa-trash' ></i></button>
                                  <a href='' style='background: #d6a448; color: #FFFFFF' class='btn btn-sm' data-toggle='modal'
                                        data-target='#upload_file'> <i class='fa fa-folder-open'></i></a>
                                  ";
            })
            ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
            ->make(true);

    }

        return view('orders.index');}


    public function indexNew( $request,$data ){
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);
                })->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })
                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-sm' style='background:#a9a9a9 ; color: #FFFFFF' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'All']) . " > <i class='fa fa-pen' ></i></a>" . $this->show_button($data) . "  <button type='button' data-id='$data->id' style='background:#000 ; color: #FFFFFF' class='btn btn-sm  archive'
                                  > <i class='fa fa-trash' ></i></button>";
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }

        return view('orders.index');

    }




    public function show_button($data)
    {


        return "

                                    <a href='' style='background: #007e48; color: #FFFFFF' class='btn btn-sm' data-toggle='modal'
                                        data-target='#show-order'
                                        data-order_no='$data->order_no'
                                        data-phone_no='$data->phone_no'
                                        data-product_name='$data->product_name'
                                        data-details='$data->details'
                                        data-type_order='$data->type_order'

                                        data-order_journey='$data->order_journey'
                                        data-note_tech='$data->note_tech'
                                        data-attachments=\"$data->attachments\"

                                        data-track='$data->track'
                                        data-extracting_policy='$data->extracting_policy'
                                        data-policy_attachment=\"$data->policy_attachment\"
                                        data-order_arrived='$data->order_arrived'
                                        data-decision_taken='$data->decision_taken'
                                        data-note_warehouse='$data->note_warehouse'
                                        data-note_salah='$data->note_salah'
                                        data-alternative_product='$data->alternative_product'
                                        data-order_arrived='$data->order_arrived'
                                        data-send_alternative='$data->send_alternative'
                                        data-bank_accounts='$data->bank_accounts'
                                        data-policy_attachment='$data->policy_attachment'

                                        data-amount_transferred='$data->amount_transferred'
                                        data-done_cancel='$data->done_cancel'
                                        data-done_valdiff='$data->done_valdiff'
                                    > <i class='fa fa-search' ></i></a>



                                    ";
    }

    public function indexTracking(Request $request)
    {
        $data = Order::where('order_journey', '1')->latest()->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('extracting_policy', function ($data) {
                    return $data->extracting_policy;

                })->addColumn('order_arrived', function ($data) {
                    return $data->order_arrived;
                })->addColumn('action', function ($data) {

                    return "<a class='btn btn-sm' style='background:#a9a9a9 ; color: #FFFFFF'  href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => $data->type_order]) . " > <i class='fa fa-pen' ></i></a> " . $this->show_button($data);
                })
                ->rawColumns(['extracting_policy', 'order_arrived', 'action'])
                ->make(true);

        }


        return view('orders.order_journey.indexTracking');
    }

    public function indexPreview(Request $request)
    {
        $data = Order::where('order_journey', '2')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);


                })->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })
                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-sm' style='background:#a9a9a9 ; color: #FFFFFF'  href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'Preview']) . " > <i class='fa fa-pen' ></i></a> " .
                        $this->show_button($data);
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }


        return view('orders.order_journey.indexPreview');
    }

    public function indexCompleted(Request $request)
    {
        $data = Order::where('order_journey', '3')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->make(true);

        }


        return view('orders.order_journey.indexCompleted');
    }

    public function indexCanceled(Request $request)
    {
        $data = Order::where('order_journey', '4')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);


                })->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })
                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=" . route('users.edit', $data->id) . " > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');
    }

    public function indexArchive(Request $request)
    {


        $data = Order::withTrashed()->get();
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('order_journey', function ($data) {
                    return Order::color_journey($data);
                })->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })
                ->addColumn('action', function ($data) {

                    return $this->show_button($data);
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }

        return view('orders.indexArchive');

    }

    public function create()
    {
        return view('orders.create');
    }


    public function store(Request $request, FileService $file)
    {

        $request->merge(['added_by' => auth()->user()->name]);


        $data = $request->except(['attachments']);
        if ($request->hasFile('attachments')) {
            $data['attachments'] = asset('upload_center') . '/' . $file->upload_file($request->file('attachments'), 'upload_center');
        }
        $order = Order::create($data);
        $message ="<b style='color:#007E48'>". $order->added_by ."</b>". "  added a new order number #" . $order->order_no . " of type " . $order->typer_order;

        $users = User::where('id', '!=', auth()->id())->get();

        Notification::send($users, new NewNotify($order, $message));

        return redirect()->route('orders.index')->with('success', 'The order has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function edit($id, $typeOrder=null)
    {

        $check_type = in_array($typeOrder, $this->typesOrder);
        $order = Order::findOrFail($id);


        if ($order and $check_type) {
            $check_type = $typeOrder . "_Page";


            return view('orders.edit', compact('order', 'check_type'));

        }
        return redirect()->back()->with('error', 'This order cannot be modified');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, $id, FileService $fileService)
    {
        $users = User::where('id', '!=', auth()->id())->get();
        $check_type = in_array($request->typeOrder, $this->typesOrder);
        $order = Order::findOrFail($id);

        $data = $request->except(['typeOrder', 'policy_attachment']);
        $data['updated_by']= auth()->user()->name;

        if ($request->hasFile('policy_attachment')) {
            $data['policy_attachment'] = asset('upload_center') . '/' . $fileService->upload_file($request->file('policy_attachment'), 'upload_center');
        }

     if ($request->hasFile('attachments')) {
         $data['attachments'] = asset('upload_center') . '/' . $fileService->upload_file($request->file('attachments'), 'upload_center');
     }
            $message ="<b style='color:#007E48'>". $order->updated_by ."</b>". "  updated order #" . $order->order_no . " a page " . $order->type_order;
            Notification::send($users, new NewNotify($order, $message));

            $order->update($data);

            if ($request->typeOrder == "All_Page") {

                return redirect()->route('orders.index')->with('success', 'The order has been successfully updated');


            } else if ($request->typeOrder == "Preview_Page") {
                return redirect()->route('orders.indexPreview')->with('success', 'Preview journey in progress');

            } else {
                return redirect()->route('orders.indexTracking')->with('success', 'Tracking journey in progress');

            }




        return redirect()->back()->with('error', 'error');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {

        $order->deleteOrFail();

    }
}
