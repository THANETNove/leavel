<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\AboutUsPage;

class AboutUsIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data = DB::table('about_us_pages')
        ->count();

        if ($Data === 1) {
            $aboutData = DB::table('about_us_pages')
            ->get();
            return view('homeText.aboutUs.editAbout_us',['aboutData' => $aboutData]);
        }else{
            return view('homeText.aboutUs.about_us');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $validated = $request->validate([
            'url' => ['required', 'url'],
            'textH1NameAbout' => ['required', 'string', 'max:255'],
            'textPNameAbout' => ['required', 'string', 'max:255'],
            'icon1About' => ['required', 'string', 'max:255'],
            'textH3NameAbout1' => ['required', 'string', 'max:255'],
            'textP1NameAbout1' => ['required', 'string', 'max:255'],
            'icon2About' => ['required', 'string', 'max:255'],
            'textH3NameAbout2' => ['required', 'string', 'max:255'],
            'textP1NameAbout2' => ['required', 'string', 'max:255'],
            'icon3About' => ['required', 'string', 'max:255'],
            'textH3NameAbout3' => ['required', 'string', 'max:255'],
            'textP1NameAbout3' => ['required', 'string', 'max:255'],
            'backgroundImageVideo' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo1' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo2' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo3' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo4' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo5' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo6' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo7' => ['required','mimes:jpeg,png,jpg,gif,svg'],
            'logo8' => ['required','mimes:jpeg,png,jpg,gif,svg'],
        ]);

        $dateText = str_random(15);
  
        $member = new AboutUsPage;

        $member->url = $request->url;
        $member->textH1NameAbout = $request->textH1NameAbout;
        $member->textPNameAbout = $request->textPNameAbout;
        $member->icon1About = $request->icon1About;
        $member->textH3NameAbout1 = $request->textH3NameAbout1;
        $member->textP1NameAbout1 = $request->textP1NameAbout1;
        $member->icon2About = $request->icon2About;
        $member->textH3NameAbout2 = $request->textH3NameAbout2;
        $member->textP1NameAbout2 = $request->textP1NameAbout2;
        $member->icon3About = $request->icon3About;
        $member->textH3NameAbout3 = $request->textH3NameAbout3;
        $member->textP1NameAbout3 = $request->textP1NameAbout3;
        $member->statusAboutUs =  '1';
        
        $image = $request->file('backgroundImageVideo');  
        if($request->hasFile('backgroundImageVideo')){
            $image = $request->file('backgroundImageVideo');
            $image->move(public_path().'/assets/img/about/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageVideo=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo1');  
        if($request->hasFile('logo1')){
            $image = $request->file('logo1');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo1=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo2');  
        if($request->hasFile('logo2')){
            $image = $request->file('logo2');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo2=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo3');  
        if($request->hasFile('logo3')){
            $image = $request->file('logo3');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo3=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo4');  
        if($request->hasFile('logo4')){
            $image = $request->file('logo4');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo4=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo5');  
        if($request->hasFile('logo5')){
            $image = $request->file('logo5');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo5=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo6');  
        if($request->hasFile('logo6')){
            $image = $request->file('logo6');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo6=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo7');  
        if($request->hasFile('logo7')){
            $image = $request->file('logo7');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo7=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo8');  
        if($request->hasFile('logo8')){
            $image = $request->file('logo8');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo8=$dateText."".$image->getClientOriginalName();
        }
      
        $member->save();

                return redirect('add-home')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
            'url' => ['required', 'url'],
            'textH1NameAbout' => ['required', 'string', 'max:255'],
            'textPNameAbout' => ['required', 'string', 'max:255'],
            'icon1About' => ['required', 'string', 'max:255'],
            'textH3NameAbout1' => ['required', 'string', 'max:255'],
            'textP1NameAbout1' => ['required', 'string', 'max:255'],
            'icon2About' => ['required', 'string', 'max:255'],
            'textH3NameAbout2' => ['required', 'string', 'max:255'],
            'textP1NameAbout2' => ['required', 'string', 'max:255'],
            'icon3About' => ['required', 'string', 'max:255'],
            'textH3NameAbout3' => ['required', 'string', 'max:255'],
            'textP1NameAbout3' => ['required', 'string', 'max:255'],
            'textP1NameAbout3' => ['required', 'string', 'max:255'],
        ]);

        $dateText = str_random(15);
  
        $member =  AboutUsPage::find($id);

        $member->url = $request->url;
        $member->textH1NameAbout = $request->textH1NameAbout;
        $member->textPNameAbout = $request->textPNameAbout;
        $member->icon1About = $request->icon1About;
        $member->textH3NameAbout1 = $request->textH3NameAbout1;
        $member->textP1NameAbout1 = $request->textP1NameAbout1;
        $member->icon2About = $request->icon2About;
        $member->textH3NameAbout2 = $request->textH3NameAbout2;
        $member->textP1NameAbout2 = $request->textP1NameAbout2;
        $member->icon3About = $request->icon3About;
        $member->textH3NameAbout3 = $request->textH3NameAbout3;
        $member->textP1NameAbout3 = $request->textP1NameAbout3;
        $member->statusAboutUs =  '1';
        
        $image = $request->file('backgroundImageVideo');  
        if($request->hasFile('backgroundImageVideo')){
            $image = $request->file('backgroundImageVideo');
            $image->move(public_path().'/assets/img/about/',$dateText."".$image->getClientOriginalName());
           $member->backgroundImageVideo=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo1');  
        if($request->hasFile('logo1')){
            $image = $request->file('logo1');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo1=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo2');  
        if($request->hasFile('logo2')){
            $image = $request->file('logo2');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo2=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo3');  
        if($request->hasFile('logo3')){
            $image = $request->file('logo3');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo3=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo4');  
        if($request->hasFile('logo4')){
            $image = $request->file('logo4');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo4=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo5');  
        if($request->hasFile('logo5')){
            $image = $request->file('logo5');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo5=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo6');  
        if($request->hasFile('logo6')){
            $image = $request->file('logo6');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo6=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo7');  
        if($request->hasFile('logo7')){
            $image = $request->file('logo7');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo7=$dateText."".$image->getClientOriginalName();
        }
        $image = $request->file('logo8');  
        if($request->hasFile('logo8')){
            $image = $request->file('logo8');
            $image->move(public_path().'/assets/img/about/clients/',$dateText."".$image->getClientOriginalName());
           $member->logo8=$dateText."".$image->getClientOriginalName();
        }
      
        $member->save();

                return redirect('add-about')->with('message', 'เเก้ไข ข้อมูลเรียบร้อย' );
    }

}
