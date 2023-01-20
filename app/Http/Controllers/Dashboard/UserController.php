<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',$this->user->find(auth()->user()->id));
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getUsersDatatable(){
        $user = new User();
        if (auth()->user()->can('viewAny')) {
            $users = $user::all();
        }else {
            $users = $user::where('id',auth()->user()->id);
        }
        
        return Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
           $btn = '';
           if (auth()->user()->can('update',$row)) {
            $btn .= '<a href="' . Route('dashboard.users.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
           } elseif (auth()->user()->can('delete',$row)) {
            $btn .= '<a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
           }
           return $btn;
        })
        ->addColumn('status', function ($row) {
           return $row->status == null ? 'Not Activated' : $row->status;
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }
    
    public function create()
    {
        $this->authorize('create');
        return view('dashboard.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('update', $this->user);
        $data = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'status' => 'nullable|in:null,admin,writer',
            'password' => 'required|password',
        ];
        $dataValidated = $request->validate($data);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('dashboard.users.index');
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
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->all());
        return redirect()->route('dashboard.users.index');
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

    public function delete(Request $request)
    {
        $this->authorize('delete', $this->user->find($request->id));
        if (is_numeric($request->id)) {
            User::find($request->id)->delete();
        }
        return redirect()->route('dashboard.users.index');
    }

}
