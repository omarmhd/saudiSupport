<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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
                    return "<a  class='btn btn-primary' href=".route('users.edit',$data->id)." > <i class='fa fa-pen' ></i></a>
                             <a href='' class='btn btn-danger'> <i class='fa fa-trash' ></i></a> ";
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

        $data=$request->except(['permissions']);
        $user=User::create($data);
        $user_role=$user->attachRole('admin');
        $user->syncPermissions($request->permissions);


        return redirect(route('users.index'))->with('success',"".__('site.success'));


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
        $data=$request->except(['permissions']);
        if (!$request->input('password')){
            unset($data['password']);
        }

         $user=User::find($id);
        $user->update($data);
        $user->syncPermissions($request->permissions);

        return redirect()->route('users.index')->with('success',"".__('site.success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



    }
}
