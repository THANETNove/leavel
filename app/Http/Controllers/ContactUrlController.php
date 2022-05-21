<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ContactUrl;

use Illuminate\Http\Request;

class ContactUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeText.contact.iconUrl');
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
            'iconContact' => ['required', 'string'],
            'contactUrl' => ['required', 'url'],

        ]);


  
        $member = new ContactUrl;

        $member->iconContact = $request->iconContact;
        $member->contactUrl = $request->contactUrl;
        $member->statusIcon = '1';
    
      
        $member->save();

        return redirect('add-contact')->with('message', 'เพิ่ม ข้อมูลเรียบร้อย' );
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

        $flight = DB::table('contact_urls')
        ->where('id', $id)
        ->get();
        return view('homeText.contact.editIconUrl' , ['flight' => $flight]);
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
            'iconContact' => ['required', 'string'],
            'contactUrl' => ['required', 'url'],

        ]);


  
        $member =  ContactUrl::find($id);

        $member->iconContact = $request->iconContact;
        $member->contactUrl = $request->contactUrl;
    
      
        $member->save();

        return redirect('add-contact')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = ContactUrl::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-services')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
