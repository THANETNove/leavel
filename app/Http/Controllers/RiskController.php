<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Risk;


class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $risks = DB::table('risks')
        ->leftJoin('branches', 'risks.brancheId', '=', 'branches.id')
        ->select('branches.*','risks.*')
        ->get();

        return view('risk.index' , ['risks' => $risks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $storeCount = DB::table('branches')
        ->count();
        
        $store = DB::table('branches')
        ->get();
        return view('risk.create' , ['storeCount' => $storeCount, 'store' => $store]);
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
            'riskName' => ['required', 'string', 'max:255'],
            'brancheId' => ['required', 'string', 'max:255','unique:risks'],
        ]);

  
        $member = new Risk;

        $member->riskName = $request->riskName;
        $member->brancheId = $request->brancheId;
        

        $member->save();

        return redirect('risk')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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


        $flight = DB::table('risks')
            ->leftJoin('branches', 'risks.brancheId', '=', 'branches.id')
            ->select('branches.*','risks.*')
            ->where('risks.id', $id)
            ->get();
//dd($flight);


        return view('risk.edit' , ['flight' => $flight]);
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
            'riskName' => ['required', 'string', 'max:255'],
        ]);

  
        $member =  Risk::find($id);

        $member->riskName = $request->riskName;
        

        $member->save();

        return redirect('risk')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Risk::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('risk')->with('message', 'ลบ ข้อมูลเรียบร้อย' );

    }
}
