<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use DB;

class BranchController extends Controller
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
        $countUser = DB::table('branches')
        ->count();
        $user = DB::table('branches')
        ->get();
        return view('branch.index' ,['countUser' => $countUser, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
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
            'branch' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'branchPhone' => ['required', 'string', 'max:255'],
            'particulars' => ['required', 'string', 'max:255'],
            
            
        ]);


        Branch::create([
            'branch' => $request['branch'],
            'name' => $request['name'],
            'branchPhone' => $request['branchPhone'],
            'branchPhoneReserve' => $request['branchPhoneReserve'],
            'otherContacts' => $request['otherContacts'],
            'particulars' => $request['particulars'],
        ]);
        return redirect('branch')->with('message', 'เพิ่ม  ข้อมูลเรียบร้อย' );
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
        ->where('id', $id)
        ->get();
        //dd($branch);
        return view('branch.edit' ,['branch' => $branch]);   
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
            'branch' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'branchPhone' => ['required', 'string', 'max:255'],
            'particulars' => ['required', 'string', 'max:255'],
            
            
        ]);
        
        $member = Branch::find($id);
        $member->branch =  $request['branch'];
        $member->name =  $request['name'];
        $member->branchPhone =  $request['branchPhone'];
        $member->branchPhoneReserve =  $request['branchPhoneReserve'];
        $member->otherContacts =  $request['otherContacts'];
        $member->particulars =   $request['particulars'];
        $member->save();

        return redirect('branch')->with('message', 'ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Branch::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('branch')->with('message', 'ลบ  ข้อมูลเรียบร้อย' );
    }
}
