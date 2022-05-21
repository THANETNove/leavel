<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Brand;
use App\Models\Generation;
use App\Models\Spares;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countData = DB::table('operating_systems')
        ->count();
        $query = $request->search;
            if (!$query) {
                $brand = DB::table('operating_systems')
                    ->rightJoin('brands', 'operating_systems.id', '=', 'brands.systemStatus')
                    ->orderBy('brands.id', 'DESC')
                    ->get();
            }else{
                $brand = DB::table('operating_systems')
                    ->rightJoin('brands', 'operating_systems.id', '=', 'brands.systemStatus')
                    ->where('brandName', 'like', "$query%")
                    ->orWhere('systemName', 'like', "$query%")
                    ->orderBy('brands.id', 'DESC')
                    ->get();

            }
       

  

        return view('brand.index' ,['brand' => $brand ,'countData' => $countData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = DB::table('operating_systems')
        ->get();
        return view('brand.create',['systems' => $systems]);
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
            'brandName' => ['required', 'string', 'max:255'],

        ]);


      
        $member = new Brand;

        $member->brandName = $request->brandName;
        $member->systemStatus = $request->systemName;
       
      
        $member->save();

        return redirect('brand')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('brands')
        ->where('id', $id)
        ->get();
        $systems = DB::table('operating_systems')
        ->get();
   
        return view('brand.edit' , ['flight' => $flight, 'systems' => $systems]);
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
            'brandName' => ['required', 'string', 'max:255'],

        ]);


      
        $member =  Brand::find($id);

        $member->brandName = $request->brandName;
        $member->systemStatus = $request->systemName;
       
      
        $member->save();

        return redirect('brand')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 


        $generationsData = DB::table('generations')
            ->where('brandGroup', $id)
            ->get();

            foreach ($generationsData as $key2) {   // ลบ รุ่นอุปกรณ์
                $keyId2 =  $key2->id;
             
                    $sparesData = DB::table('spares')
                        ->where('modelId', $keyId2)
                        ->get();
               
                    foreach ($sparesData as $key3) {  // ลบ รายการ
                             
                            $keyId3 =  $key3->id;

                            $spa = Spares::find($keyId3); 
                            //dd($spa,'3');
                            $spa->delete();
                        }

                $gen = Generation::find($keyId2);  // ลบ รุ่นอุปกรณ์
               //dd($gen,'2');
                $gen->delete();
            }

    
        $flight = Brand::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('brand')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
