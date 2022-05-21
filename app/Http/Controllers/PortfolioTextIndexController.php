<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\PortfolioTextIndex;

class PortfolioTextIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('homeText.portfolio.indexText');
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
            'textPortfolio' => ['required', 'string'],

        ]);


  
        $member = new PortfolioTextIndex;

        $member->textPortfolio = $request->textPortfolio;
        $member->statusIndexTextPortfolio = '1';
    
      
        $member->save();

        return redirect('add-portfolio')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        
        $flight = DB::table('portfolio_text_indices')
        ->where('id', $id)
        ->get();
        return view('homeText.portfolio.editIndexText' ,['flight' => $flight]);
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
            'textPortfolio' => ['required', 'string'],

        ]);


  
        $member =  PortfolioTextIndex::find($id);

        $member->textPortfolio = $request->textPortfolio;
    
      
        $member->save();

        return redirect('add-portfolio')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );
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
