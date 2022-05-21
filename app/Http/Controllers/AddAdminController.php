<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB;

class AddAdminController extends Controller
{

  
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $countUser = DB::table('users')
        ->count();
        $user = DB::table('branches')
        ->rightJoin('users', 'branches.id', '=', 'users.status')
        ->get();



        return view('admin.index' , ['user' => $user, 'countUser' => $countUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $branch = DB::table('branches')
        ->get();
        return view('auth.register_login' , ['branch' => $branch]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);

         User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'status' => $request['status'],
        ]);
        return redirect('admin')->with('message', 'เพิ่ม  ข้อมูลเรียบร้อย' );
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
        
        $branch = DB::table('branches')
        ->get();

        $user = DB::table('users')
        ->where('id',$id)
        ->get();
       // dd($user,$id);

        return view('admin.edit' , ['branch' => $branch, 'user' => $user]);
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

        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($id)],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);
        
        $member = User::find($id);
  
        $member->username =  $request['username'];
        $member->email =  $request['email'];
        $member->password =   Hash::make($request['password']);
        $member->status =  $request['status'];
        $member->save();

        return redirect('admin')->with('message', 'ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $flight = User::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('admin')->with('message', 'ลบ  ข้อมูลเรียบร้อย' );

    }
}
