<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class ResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.reset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = DB::table('users')
        ->where('email', '='  ,$request->email)
        ->count();

        if ($user === 1) {

            $user = DB::table('users')
            ->where('email', '='  ,$request->email)
            ->get();

            return view('auth.reset_pass' , ['user' => $user]);
        }else{
            return redirect('reset')->with('messageReset', 'ไม่มี E-mail นี้' );
        }
        

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

        $validated = $request->validate([
            
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
        ]);

        $member = User::find($id);
  
        $member->password =   Hash::make($request['password']);
        $member->save();

        return redirect('login')->with('messageFinish', 'เปลี่ยน Password เรียบร้อย' );
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
