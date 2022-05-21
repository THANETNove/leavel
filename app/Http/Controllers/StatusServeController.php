<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\StatusServe;

class StatusServeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $status = DB::table('status_serves')
        ->get();
        return view('statusServe.index', ['status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statusServe.create');
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
            'serveName' => ['required', 'string', 'max:255'],

        ]);


      
        $member = New StatusServe;

        $member->statusServeName = $request->serveName;
        $member->textServeName = $request->textServeName;
      
        $member->save();

        return redirect('sta-serve')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('status_serves')
        ->where('id', $id)
        ->get();
        return view('statusServe.edit', ['flight' => $flight]);
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
            'serveName' => ['required', 'string', 'max:255'],

        ]);


      
        $member =  StatusServe::find($id);

        $member->statusServeName = $request->serveName;
        $member->textServeName = $request->textServeName;
       
      
        $member->save();

        return redirect('sta-serve')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $flight = StatusServe::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('sta-serve')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
