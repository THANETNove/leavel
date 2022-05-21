<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\ContactIndex;

class ContactIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countData = DB::table('contact_text_indices')
        ->count();
        $contactTops = DB::table('contact_tops')
        ->count();

        $contactTopsDate = DB::table('contact_tops')
        ->get();
        $contactData = DB::table('contact_text_indices')
        ->get();

        $contactIndices =   DB::table('contact_indices')
        ->get();
        $contactUrl =   DB::table('contact_urls')
        ->get();

        return view('homeText.contact.index' , ['countData' => $countData, 'contactTopsDate' => $contactTopsDate,'contactTops' => $contactTops, 'contactData' => $contactData , 'contactUrl' => $contactUrl, 'contactIndices' => $contactIndices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeText.contact.indexContact');
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
            'textH1NameContact' => ['required', 'string'],
            'textPNameContact' => ['required', 'string'],

        ]);


  
        $member = new ContactIndex;

        $member->iconContact = $request->iconContact;
        $member->textH1NameContact = $request->textH1NameContact;
        $member->textPNameContact = $request->textPNameContact;
        $member->statusIndexContact = '1';
    
      
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
        $flight = DB::table('contact_indices')
        ->where('id', $id)
        ->get();
   
        return view('homeText.contact.editIndexContact' , ['flight' => $flight]);
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
            'textH1NameContact' => ['required', 'string'],
            'textPNameContact' => ['required', 'string'],

        ]);


  
        $member =  ContactIndex::find($id);

        $member->iconContact = $request->iconContact;
        $member->textH1NameContact = $request->textH1NameContact;
        $member->textPNameContact = $request->textPNameContact;
        $member->statusIndexContact = '1';
    
      
        $member->save();

        return redirect('add-contact')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = ContactIndex::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-contact')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
