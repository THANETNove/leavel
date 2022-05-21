<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\OperatingSystem;
use App\Models\Brand;
use App\Models\Generation;
use App\Models\Spares;


class OperayingSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = DB::table('operating_systems')
        ->get();
        
        return  view('operatingSystem.index' ,['systems'=>$systems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operatingSystem.create');
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
            'systemName' => ['required', 'string', 'max:255'],

        ]);


      
        $member = New OperatingSystem;

        $member->systemName = $request->systemName;
       
      
        $member->save();

        return redirect('system')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('operating_systems')
        ->where('id', $id)
        ->get();
   
        return view('operatingSystem.edit' , ['flight' => $flight]);
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
            'systemName' => ['required', 'string', 'max:255'],

        ]);


      
        $member =  OperatingSystem::find($id);

        $member->systemName = $request->systemName;
       
      
        $member->save();

        return redirect('system')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $brandsData = DB::table('brands')
            ->where('systemStatus', $id)
            ->get();
    
        foreach ($brandsData as $key) {  // ลบยีห้อ
            $keyId =  $key->id;

            $generationsData = DB::table('generations')
                ->where('brandGroup', $keyId)
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

            $fli = Brand::find($keyId); // ลบยีห้อ
            //dd($fli,'1');
            $fli->delete();
    
           
        }
        $flight = OperatingSystem::find($id); // ลบ ระบบปฏิบัติการ
        $flight->delete();

        return redirect('system')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
