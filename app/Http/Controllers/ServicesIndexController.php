<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ServicesIndex;

class ServicesIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countData = DB::table('services_text_indices')
        ->count();
        $servicesData = DB::table('services_text_indices')
        ->get();

        $servicesIndices =   DB::table('services_indices')
        ->get();

        $backImages =   DB::table('service_back_images')
        ->get();

        return view('homeText.services.index' ,['servicesData' => $servicesData , 'backImages'=>$backImages,'countData' => $countData ,'servicesIndices' => $servicesIndices] );
    }

    public function create()
    {
        return view('homeText.services.indexImage');
       
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
            'iconBox1Service' => ['required', 'string', 'max:255'],
            'textH1NameBox1Service' => ['required', 'string', 'max:255'],
            'textPNameBox1Service' => ['required', 'string', 'max:255'],
        ]);


        $dateText = str_random(15);
  
        $member = new ServicesIndex;

        $member->iconBox1Service = $request->iconBox1Service;
        $member->textH1NameBox1Service = $request->textH1NameBox1Service;
        $member->textPNameBox1Service = $request->textPNameBox1Service;
        $member->statusImageService = '1';
        

        $member->save();

        return redirect('add-services')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );

    }

    public function edit($id)
    {
        $flight = DB::table('services_indices')
        ->where('id', $id)
        ->get();
   
        return view('homeText.services.editIndexImage' , ['flight' => $flight]);
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
            'iconBox1Service' => ['required', 'string', 'max:255'],
            'textH1NameBox1Service' => ['required', 'string', 'max:255'],
            'textPNameBox1Service' => ['required', 'string', 'max:255'],
        ]);


        $dateText = str_random(15);
  
        $member =  ServicesIndex::find($id);

        $member->iconBox1Service = $request->iconBox1Service;
        $member->textH1NameBox1Service = $request->textH1NameBox1Service;
        $member->textPNameBox1Service = $request->textPNameBox1Service;

      
        $member->save();

        return redirect('add-services')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );

    }

    public function destroy($id)
    {
        

        $flight = ServicesIndex::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-services')->with('message', 'ลบ ข้อมูลเรียบร้อย' );

    }
   
}
