<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Generation;
use Illuminate\Validation\Rule;
use App\Models\Spares;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $countData = DB::table('brands')
            ->count();
            $query = $request->search;
        if (!$query) {
            $gener = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->orderBy('brands.brandName', 'ASC')
                ->paginate(50);
        }else{
            $gener = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->where('brandName', 'like', "$query%")
                ->orWhere('deviceModel', 'like', "$query%")
                ->orWhere('model', 'like', "$query%")
                ->orderBy('brands.brandName', 'ASC')
                ->paginate(50);
        }

       

       // dd($gener);
        return  view('generation.index' ,['gener'=>$gener ,'countData'=> $countData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
        
        return  view('generation.create');

    }
    public function indexll(Request $request)
    {
        dd($request->all());
    
        
      

    }


    function fetch(Request $request)
    {

      
     if($request->get('query'))
     {

       
      $query = $request->get('query');

      $data = DB::table('brands')
        ->where('brandName', 'LIKE', "%{$query}%")
        ->get();


        $output = '<ul class="dropdown-menu box-select" style="display:block; position:absolute">';
        foreach($data as $row)
        {
         $output .= '
         <li  id="'.$row->id.'"><a class="pointer" id="'.$row->id.'">'.$row->brandName.'</a></li>
         ';
        }
        $output .= '</ul>';
        echo $output;
     }
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
            'brandGroup' => ['required', 'string', 'max:255'],
            'deviceModel' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string',  'max:255','unique:generations'],

        ]);


      
        $member = new Generation;

        $member->deviceModel = $request->deviceModel;
        $member->model = $request->model;
        $member->brandGroup = $request->brandGroup;
       
      
        $member->save();

        return redirect('generation')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
        ->select('brands.*','generations.*')
        ->where('generations.id', $id)
        ->get();

        return  view('generation.edit' ,['flight'=>$flight ]);
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
            'brandGroup' => ['required', 'string', 'max:255'],
            'deviceModel' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255', Rule::unique('generations')->ignore($id)],

        ]);


      
        $member =  Generation::find($id);

        $member->deviceModel = $request->deviceModel;
        $member->model = $request->model;
        $member->brandGroup = $request->brandGroup;
       
      
        $member->save();

        return redirect('generation')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Generation::find($id); //ลบภาพในdb
       // dd($flight);
        $countData = DB::table('spares')
            ->where('modelId', $id)
            ->get();
        
        foreach ($countData as $key) {
              $keyId =  $key->id;

            $fli = Spares::find($keyId);
            $fli->delete();
        }
       
      //  $countData->each->delete();
        $flight->delete();

        return redirect('generation')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
