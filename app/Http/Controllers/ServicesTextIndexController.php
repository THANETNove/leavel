<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ServicesTextIndex;

class ServicesTextIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeText.services.indexText');
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
            'textService' => ['required', 'string'],

        ]);


  
        $member = new ServicesTextIndex;

        $member->indexText = $request->textService;
        $member->statusIndexText = '1';
    
      
        $member->save();

        return redirect('add-services')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $flight = DB::table('services_text_indices')
        ->where('id', $id)
        ->get();
        return view('homeText.services.editIndexText' , ['flight' => $flight]);
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
            'textService' => ['required', 'string'],

        ]);


  
        $member =  ServicesTextIndex::find($id);

        $member->indexText = $request->textService;
    
      
        $member->save();

        return redirect('add-services')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );
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
