<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\IndexHomePage;

class HomeIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $textData = DB::table('index_home_pages')
        ->count();

        if ($textData === 1) {
            $homepage = DB::table('index_home_pages')
            ->get();
            return view('homeText.homeIndex.editHome',['homepage' => $homepage]);
        }else{
            return view('homeText.homeIndex.home');
        }

       
    }

    public function store(Request $request)
    {
       // dd($request->all());

        $validated = $request->validate([
            'webName' => ['required', 'string', 'max:255'],
            'textH1Name' => ['required', 'string', 'max:255'],
            'textPName' => ['required', 'string', 'max:255'],
            'textH1NameOrange' => ['required', 'string', 'max:255'],
            'textPNameOrange' => ['required', 'string', 'max:255'],
            'iconBox1' => ['required', 'string', 'max:255'],
            'textH1NameBox1' => ['required', 'string', 'max:255'],
            'textPNameBox1' => ['required', 'string', 'max:255'],
            'iconBox2' => ['required', 'string', 'max:255'],
            'textH1NameBox2' => ['required', 'string', 'max:255'],
            'textPNameBox2' => ['required', 'string', 'max:255'],
            'iconBox3' => ['required', 'string', 'max:255'],
            'textH1NameBox3' => ['required', 'string', 'max:255'],
            'textPNameBox3' => ['required', 'string', 'max:255'],
            'backgroundImageTop' => ['required','mimes:jpeg,png,jpg,gif,svg'],
        ]);


        $dateText = str_random(15);
  
        $member = new IndexHomePage;

        $member->webName = $request->webName;
        $member->textH1Name = $request->textH1Name;
        $member->textPName = $request->textPName;
        $member->textH1NameOrange = $request->textH1NameOrange;
        $member->textPNameOrange = $request->textPNameOrange;
        $member->iconBox1 = $request->iconBox1;
        $member->textH1NameBox1 = $request->textH1NameBox1;
        $member->textPNameBox1 = $request->textPNameBox1;
        $member->iconBox2 = $request->iconBox2;
        $member->textH1NameBox2 = $request->textH1NameBox2;
        $member->textPNameBox2 = $request->textPNameBox2;
        $member->iconBox3 = $request->iconBox3;
        $member->textH1NameBox3 = $request->textH1NameBox3;
        $member->textPNameBox3 = $request->textPNameBox3;
        $member->statusHomIndex = '1';
        
        $image = $request->file('backgroundImageTop');  
       
        if($request->hasFile('backgroundImageTop')){
            $image = $request->file('backgroundImageTop');

    
            $image->move(public_path().'/assets/img/top/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageTop=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-home')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );

    }

    public function update(Request $request, $id)
    {
      
        
        $validated = $request->validate([
            'webName' => ['required', 'string', 'max:255'],
            'textH1Name' => ['required', 'string', 'max:255'],
            'textPName' => ['required', 'string', 'max:255'],
            'textH1NameOrange' => ['required', 'string', 'max:255'],
            'textPNameOrange' => ['required', 'string', 'max:255'],
            'iconBox1' => ['required', 'string', 'max:255'],
            'textH1NameBox1' => ['required', 'string', 'max:255'],
            'textPNameBox1' => ['required', 'string', 'max:255'],
            'iconBox2' => ['required', 'string', 'max:255'],
            'textH1NameBox2' => ['required', 'string', 'max:255'],
            'textPNameBox2' => ['required', 'string', 'max:255'],
            'iconBox3' => ['required', 'string', 'max:255'],
            'textH1NameBox3' => ['required', 'string', 'max:255'],
            'textPNameBox3' => ['required', 'string', 'max:255'],
        ]);


        $dateText = str_random(15);
  
        $member =  IndexHomePage::find($id);

        $member->webName = $request->webName;
        $member->textH1Name = $request->textH1Name;
        $member->textPName = $request->textPName;
        $member->textH1NameOrange = $request->textH1NameOrange;
        $member->textPNameOrange = $request->textPNameOrange;
        $member->iconBox1 = $request->iconBox1;
        $member->textH1NameBox1 = $request->textH1NameBox1;
        $member->textPNameBox1 = $request->textPNameBox1;
        $member->iconBox2 = $request->iconBox2;
        $member->textH1NameBox2 = $request->textH1NameBox2;
        $member->textPNameBox2 = $request->textPNameBox2;
        $member->iconBox3 = $request->iconBox3;
        $member->textH1NameBox3 = $request->textH1NameBox3;
        $member->textPNameBox3 = $request->textPNameBox3;
        
        $image = $request->file('backgroundImageTop');  
       
        if($request->hasFile('backgroundImageTop')){
            $image = $request->file('backgroundImageTop');

    
            $image->move(public_path().'/assets/img/top/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageTop=$dateText."".$image->getClientOriginalName();
          //  $member = $img->getClientOriginalExtension();
          //	$img->save();
        }
      
                $member->save();

                return redirect('add-home')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );
    }
}
