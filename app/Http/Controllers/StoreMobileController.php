<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\StoreMobile;

class StoreMobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storeMobile = DB::table('store_mobiles')
        ->get();
        return view('store_mobile.index', ['storeMobile' => $storeMobile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store_mobile.create');
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
            'nameStore' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],

        ]);

      
        $member =  new StoreMobile;

        $member->nameStore = $request->nameStore;
        $member->phone = $request->phone;
        $member->explain = $request->explain;
       
      
        $member->save();

        return redirect('store-mobile')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('store_mobiles')
        ->where('id', $id)
        ->get();
        return view('store_mobile.edit' , ['flight' => $flight]);
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
            'nameStore' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],

        ]);

      
        $member =   StoreMobile::find($id);

        $member->nameStore = $request->nameStore;
        $member->phone = $request->phone;
        $member->explain = $request->explain;
       
      
        $member->save();

        return redirect('store-mobile')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = StoreMobile::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('store-mobile')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
