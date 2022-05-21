<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\PortfolioIndex;

class PortfolioIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $countData = DB::table('portfolio_text_indices')
        ->count();
        $portfolioData = DB::table('portfolio_text_indices')
        ->get();

        $portfolioIndices =   DB::table('portfolio_indices')
        ->get();

        return view('homeText.portfolio.index' ,['portfolioData' => $portfolioData , 'countData' => $countData , 'portfolioIndices' => $portfolioIndices] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeText.portfolio.indexImage');
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
            'textH1NamePortfolio' => ['required', 'string', 'max:255'],
            'textPNamePortfolio' => ['required', 'string', 'max:255'],
            'backgroundImagePortfolio' => ['required','mimes:jpeg,png,jpg,gif,svg'],
        ]);


        $dateText = str_random(15);
  
        $member = new PortfolioIndex;

        $member->textH1NamePortfolio = $request->textH1NamePortfolio;
        $member->textPNamePortfolio = $request->textPNamePortfolio;
        $member->statusImage = $request->statusImage;

        $member->statusImagePortfolio = '1';
        
        $image = $request->file('backgroundImagePortfolio');  
       
        if($request->hasFile('backgroundImagePortfolio')){
            $image = $request->file('backgroundImagePortfolio');

    
            $image->move(public_path().'/assets/img/portfolio/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImagePortfolio=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-portfolio')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $flight = DB::table('portfolio_indices')
        ->where('id', $id)
        ->get();
   
        return view('homeText.portfolio.editIndexImage' , ['flight' => $flight]);
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
            'textH1NamePortfolio' => ['required', 'string', 'max:255'],
            'textPNamePortfolio' => ['required', 'string', 'max:255'],
        ]);


        $dateText = str_random(15);
  
        $member =  PortfolioIndex::find($id);

        $member->textH1NamePortfolio = $request->textH1NamePortfolio;
        $member->textPNamePortfolio = $request->textPNamePortfolio;
        $member->statusImage = $request->statusImage;

        
        $image = $request->file('backgroundImagePortfolio');  
       
        if($request->hasFile('backgroundImagePortfolio')){
            $image = $request->file('backgroundImagePortfolio');

    
            $image->move(public_path().'/assets/img/portfolio/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImagePortfolio=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-portfolio')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $flight = PortfolioIndex::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('add-portfolio')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
