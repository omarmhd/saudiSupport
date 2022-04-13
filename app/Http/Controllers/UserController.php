<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __construct()
    {
        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-update'])->only('update');
        $this->middleware(['permission:users-delete'])->only('destroy');
        $this->middleware(['permission:users-read'])->only('index');



    }


    public function index(Request $request)
    {
        $data = User::all();

        if ($request->ajax()) {



            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($data) {
                    return date($data->created_at->toDateString());
                })
                ->addColumn('action', function ($data) {

                    if (Auth::user()->hasPermission('users-update')) {
                        return "<a  class='btn  btn-sm' style='background: #007e48;color: #FFFFFF'  href=" . route('users.edit', $data->id) . " > <i class='fa fa-pen' ></i></a>
                             <a href='javascript:void(0)' class='btn btn-sm' style='background: #a9a9a9;color: #FFFFFF'  onclick='event.preventDefault(); document.getElementById(\"delete-form\").submit();'> <i class='fa fa-trash' ></i></a>

                              <form id='delete-form' action=". route('users.destroy',$data->id) ." method='POST' class='d-none'>
                               ".csrf_field() ."
                                  ".method_field('DELETE')."

                        </form>

                              ";


                    }else{
                        return `<i class='fa-eye-slash'></i> hidden`;
                    }
                })
                ->rawColumns(['index','date', 'action'])
                ->make(true);

        }

        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data=$request->except(['permissions','password']);
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        $user_role=$user->attachRole('admin');
        $user->syncPermissions($request->permissions);


        return redirect(route('users.index'))->with('success',"A new user has been added successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrfail($id);


        return  view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,id,'.$id,

        ]);
        $data=$request->except(['permissions','password']);
        if (!$request->input('password')){
            unset($data['password']);
        }else{
            $data['password']=Hash::make($request->password);
        }

         $user=User::find($id);
        $user->update($data);
        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index')->with('success',"User data has been updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::findOrFail($id)->delete();
        return redirect()->back()->with('success','Deleted successfully');



    }
}
