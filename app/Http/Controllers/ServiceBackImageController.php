<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ServiceBackImage;

class ServiceBackImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeText.services.backImage');
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
        
        $validated = $request->validate([
            'textH1NameBox2Service' => ['required', 'string', 'max:255'],
            'textPNameBox2Service' => ['required', 'string', 'max:255'],
            'backgroundImageService' => ['required','mimes:jpeg,png,jpg,gif,svg'],
        ]);


        $dateText = str_random(15);
  
        $member = new ServiceBackImage;

        $member->textH1NameBox2Service = $request->textH1NameBox2Service;
        $member->textPNameBox2Service = $request->textPNameBox2Service;
        
        $image = $request->file('backgroundImageService');  
       
        if($request->hasFile('backgroundImageService')){
            $image = $request->file('backgroundImageService');

    
            $image->move(public_path().'/assets/img/service/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageService=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-services')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('service_back_images')
        ->where('id', $id)
        ->get();
   
        return view('homeText.services.editbackImage' , ['flight' => $flight]);
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
            'textH1NameBox2Service' => ['required', 'string', 'max:255'],
            'textPNameBox2Service' => ['required', 'string', 'max:255'],
        ]);


        $dateText = str_random(15);
  
        $member =  ServiceBackImage::find($id);

        $member->textH1NameBox2Service = $request->textH1NameBox2Service;
        $member->textPNameBox2Service = $request->textPNameBox2Service;
        
        $image = $request->file('backgroundImageService');  
       
        if($request->hasFile('backgroundImageService')){
            $image = $request->file('backgroundImageService');

    
            $image->move(public_path().'/assets/img/service/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageService=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-services')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $flight = ServiceBackImage::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-services')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
