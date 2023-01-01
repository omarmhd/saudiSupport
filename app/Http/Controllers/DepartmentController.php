<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Department $department)
    {
        $data=$department->orders;

//        $data = Department::latest()->get();


        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })->addColumn('attachments', function ($data) {

                    return "<a href='$data->attachments'  target='_blank' class='btn btn-outline-dark'> <i class='fa fa-link'></i> </a>";
                })->addColumn('department', function ($data) {
                   return $data->department->name;
                })
                ->addColumn('action', function ($data) {

//                    $chat_tag=$data->room->id ? "<a href=".route("room.show",$data->room->id)." style='background: #4c70ff; color: #FFFFFF' class='btn btn-sm upload-btn my-2'
//                                     data-id='$data->id'   > <i class='far fa-comments'></i>
//                                     </a>":'';



                    return "
                <a  class='btn btn-sm' style='background:#a9a9a9 ; color: #FFFFFF' href=" . route('orders.edit', ['id' => $data->id, 'typeOrder' => 'All']) . " > <i class='fa fa-pen' ></i></a>
                                                  <a href='' style='background: #d6a448; color: #FFFFFF' class='btn btn-sm upload-btn' data-toggle='modal'
                                     data-id='$data->id'   data-target='#upload_file'> <i class='fa fa-folder-open'></i></a>
                ";
//                        . $this->show_button($data) . "  <button type='button' data-id='$data->id' style='background:#000 ; color: #FFFFFF' class='btn btn-sm  archive'
//                                  > <i class='fa fa-trash' ></i></button>

//
//                                        <a href='' data-id='$data->id' data-order-number='$data->order_no' class='btn btn-sm add-chat-btn' data-toggle='modal' data-target='#add-chat' style='background: #FF5757;color: #ffff'   ><i class='far fa-comments'> </i></a>
//
//                                  ";
                })
                ->rawColumns(['attachments', 'date', 'order_journey', 'action'])
                ->make(true);

        }

        return view('orders.index',compact('department'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
