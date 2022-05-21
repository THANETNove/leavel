<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ContactTop;

class ContactTopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeText.contact.contactTop');
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
            'iconTop1' => ['required', 'string'],
            'textTop1' => ['required', 'string'],
            'iconTop2' => ['required', 'string'],
            'textTop2' => ['required', 'string'],

        ]);


  
        $member = new ContactTop;

        $member->iconTop1 = $request->iconTop1;
        $member->textTop1 = $request->textTop1;
        $member->iconTop2 = $request->iconTop2;
        $member->textTop2 = $request->textTop2;
    
      
        $member->save();

        return redirect('add-contact')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('contact_tops')
        ->where('id', $id)
        ->get();
   
        return view('homeText.contact.editcontactTop' , ['flight' => $flight]);
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
            'iconTop1' => ['required', 'string'],
            'textTop1' => ['required', 'string'],
            'iconTop2' => ['required', 'string'],
            'textTop2' => ['required', 'string'],

        ]);


  
        $member =  ContactTop::find($id);

        $member->iconTop1 = $request->iconTop1;
        $member->textTop1 = $request->textTop1;
        $member->iconTop2 = $request->iconTop2;
        $member->textTop2 = $request->textTop2;
    
      
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
        $flight = ContactTop::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-contact')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
