<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {

        $data = Order::all();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                }) ->addColumn('order_journey', function ($data) {

                 return Order::color_journey($data);




                      }) ->addColumn('attachments', function ($data) {

                          return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })

                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments','date','order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');

    }

    public function  indexTracking(Request  $request){
        $data = Order::where('order_journey','1')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                }) ->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);




                }) ->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })

                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments','date','order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');
    }

    public function  indexPreview(Request  $request){
        $data = Order::where('order_journey','2')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                }) ->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);




                }) ->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })

                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments','date','order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');
    }
    public function  indexCompleted(Request  $request){
        $data = Order::where('order_journey','3')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                }) ->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);




                }) ->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })

                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments','date','order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');
    }
    public function  indexCanceled(Request  $request){
        $data = Order::where('order_journey','4')->get();

        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                }) ->addColumn('order_journey', function ($data) {

                    return Order::color_journey($data);




                }) ->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })

                ->addColumn('action', function ($data) {

                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                                   <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
                })
                ->rawColumns(['attachments','date','order_journey', 'action'])
                ->make(true);

        }


        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        return redirect()->route('orders.index')->with('success','dsad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
