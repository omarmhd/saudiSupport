<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $typesOrder =['Exchange', 'Refund', 'Cancel', 'Edit', 'All','Preview'];
    public function index(Request $request)
    {

        $data = Order::all();

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


                    return "<a  class='btn btn-primary' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'All']) . " > <i class='fa fa-pen' ></i></a>

                                    <a href='' class='btn btn-info' data-toggle='modal'
                                        data-target='#show-order'
                                        data-order_no='$data->order_no'
                                        data-phone_no='$data->phone_no'
                                        data-product_name='$data->product_name'
                                           data-details='$data->details'
                                        data-type_order='$data->type_order'

                                        data-order_journey='$data->order_journey'
                                        data-note_tech='$data->note_tech'
                                        data-attachments='$data->attachments'
                                        data-track='$data->track'
                                        data-extracting_policy='$data->extracting_policy'
                                        data-policy_attachment='$data->policy_attachment'
                                        data-order_arrived='$data->order_arrived'
                                        data-decision_taken='$data->decision_taken'
                                        data-note_warehouse='$data->note_warehouse'
                                        data-note_salah='$data->note_salah'

                                    > <i class='fa fa-eye' ></i></a>

                                    <button type='button' data-id='$data->id' class='btn btn-warning archive'
                                  > <i class='fa fa-archive' ></i></button>

                                    ";
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }
        return view('orders.index');

    }

    public function indexTracking(Request $request)
    {
        $data = Order::where('order_journey', '1')->get();

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

                    return "<a  class='btn btn-primary' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => $data->type_order]) . " > <i class='fa fa-pen' ></i></a>
                                          <a href='' class='btn btn-info' data-toggle='modal'
                                        data-target='#show-order'
                                        data-order_no='$data->order_no'
                                        data-phone_no='$data->phone_no'
                                        data-product_name='$data->product_name'
                                           data-details='$data->details'
                                        data-type_order='$data->type_order'

                                        data-order_journey='$data->order_journey'
                                        data-note_tech='$data->note_tech'
                                        data-attachments='$data->attachments'
                                        data-track='$data->track'
                                        data-extracting_policy='$data->extracting_policy'
                                        data-policy_attachment='$data->policy_attachment'
                                        data-order_arrived='$data->order_arrived'
                                        data-decision_taken='$data->decision_taken'
                                        data-note_warehouse='$data->note_warehouse'
                                        data-note_salah='$data->note_salah'

                                    > <i class='fa fa-eye' ></i></a> ";
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

                    return "<a  class='btn btn-primary' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'Preview']) . " > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
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

                    return "<a  class='btn btn-primary' href=" . route('users.edit', $data->id) . " > <i class='fa fa-pen' ></i></a>

                                    <a href='' class='btn btn-info' data-toggle='modal'
                                        data-target='#show-order'

                                        data-order_no='$data->order_no'
                                        data-phone_no='$data->phone_no'
                                        data-product_name='$data->product_name'
                                        data-details='$data->details'
                                        data-type_order='$data->type_order'
                                        data-order_journey='$data->order_journey'
                                        data-note_tech='$data->note_tech'
                                        data-attachments='$data->attachments'
                                        data-track='$data->track'
                                        data-extracting_policy='$data->extracting_policy'
                                        data-policy_attachment='$data->policy_attachment'
                                        data-order_arrived='$data->order_arrived'
                                        data-decision_taken='$data->decision_taken'
                                        data-note_warehouse='$data->note_warehouse'
                                        data-note_salah='$data->note_salah'

                                    > <i class='fa fa-eye' ></i></a>

                                    <button type='button' data-id='$data->id' class='btn btn-warning archive'
                                  > <i class='fa fa-archive' ></i></button>

                                    ";
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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,[
//            'phone_no'=>'required',
//            'order_no'=>'required',
//            'product_name'=>'required',
//            'type_order'=>'required',
//            'details'=>'required',
//            'order_journey'=>'required',
//            'note_tech'=>'required',
//            'attachments'=>'required',
//            'track'=>'required',
//        ]);

        Order::create($request->all());
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
    public function edit($id, $typeOrder)
    {

        $check_type = in_array($typeOrder, $this->typesOrder);
        $order = Order::findOrFail($id);


        if ($order and $check_type) {
            $check_type = $typeOrder . "_Page";

            return view('orders.edit', compact('order', 'check_type'));

        }
        return redirect()->back()->with('error','error');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, $id)
    {


        $check_type = in_array($request->typeOrder, $this->typesOrder);
        $order = Order::findOrFail($id);

        if ($order and $check_type) {
            $order->update($request->except(['typeOrder']));
            return redirect()->route('orders.index')->with('success', 'The order has been successfully updated');

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
