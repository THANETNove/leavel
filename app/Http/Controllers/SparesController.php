<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Spares;
use App\Models\RepairWorkGroup;

class SparesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->search;
        if (!$query ) {
            $gener = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
                ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
                ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')
                ->leftJoin('repair_work_groups', 'spares.groupItem', '=', 'repair_work_groups.id')
                ->select('brands.*','generations.*','grades.*','store_mobiles.*','repair_work_groups.*','spares.*')
                ->orderBy('spares.id', 'DESC')
                ->paginate(100);
        } else {
            $gener = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
                ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
                ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')
                ->leftJoin('repair_work_groups', 'spares.groupItem', '=', 'repair_work_groups.id')
                ->select('brands.*','generations.*','grades.*','store_mobiles.*','repair_work_groups.*','spares.*')
                ->where('brandName', 'like', "$query%")
                ->orWhere('deviceModel', 'like', "$query%")
                ->orWhere('model', 'like', "$query%")
                ->orWhere('nameItem', 'like', "$query%")
                ->orWhere('gradeName', 'like', "$query%")
                ->orWhere('groupName', 'like', "$query%")
                ->orWhere('nameStore', 'like', "$query%")
                ->orderBy('spares.id', 'DESC')
                ->paginate(50);
        }

        
        return view('spares.index', ['gener' => $gener]);
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generCount = DB::table('generations') // เช็ครุ่นอุปกรณ์
            ->count();
        $repairCount = DB::table('repair_work_groups') // เช็คกลุ่มอุปกรณ์
            ->count();
        $mobilCount = DB::table('store_mobiles') // เช็คร้าน
            ->count();
        $gradeCount = DB::table('grades') // เช็คเกรดอุปกรณ์
            ->count();

         $gener = DB::table('brands')
            ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
            ->orderBy('brands.brandName', 'ASC')
            ->get();
        $grade = DB::table('grades')
            ->get();
        $mobil = DB::table('store_mobiles')
            ->get();
        $repair = DB::table('repair_work_groups')
            ->get();


        return view('spares.create' , ['repair'=> $repair,'gener' => $gener ,'grade'=> $grade , 'mobil' => $mobil , 'generCount' => $generCount, 'gradeCount'=> $gradeCount,'mobilCount'=> $mobilCount , 'repairCount' => $repairCount]);
    }

 // อุปกรณืที่เปลี่ยน

    function fetch(Request $request)
    {

      
     if($request->get('query'))
     {
      $query = $request->get('query');

      $data = DB::table('brands')
        ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
        ->orderBy('brands.brandName', 'ASC')
        ->where('brandName', 'LIKE', "%{$query}%")
        ->orWhere('deviceModel', 'LIKE', "%{$query}%")
        ->orWhere('model', 'LIKE', "%{$query}%")
        ->get();

        $output = '<ul class="dropdown-menu box-select" style="display:block; position:absolute">';
        foreach($data as $row)
        {
         $output .= '
         <li  id="'.$row->id.'"><a  class="pointer" id="'.$row->id.'">'.$row->brandName. '  &nbsp;, &nbsp;'.$row->deviceModel. '  &nbsp;, &nbsp;'.$row->model. '</a></li>
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
            'modelId' => ['required', 'string', 'max:255'],
            'nameItem' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'gradeId' => ['required', 'string', 'max:255'],
            'storeId' => ['required', 'string', 'max:255'],
            'modelExplain' => ['required', 'string', 'max:255'],
            'guaranteeDate' => ['required', 'string', 'max:255'],
        ]);


      $bant =   $request->price;
      $groupItem = $request->groupItem;

      $priceBant =  number_format($bant);

        $member =  new Spares;

        $member->modelId = $request->modelId;
        $member->groupItem = $groupItem;
        $member->nameItem = $request->nameItem;
        $member->price =  $priceBant;
        $member->gradeId = $request->gradeId;
        $member->storeId = $request->storeId;
        $member->modelExplain = $request->modelExplain;
        $member->guaranteeDate = $request->guaranteeDate;
        $member->save();



        return redirect('spares')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $flight  = DB::table('brands')
            ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
            ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
            ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')
            ->leftJoin('repair_work_groups', 'spares.groupItem', '=', 'repair_work_groups.id')
            ->select('brands.*','generations.*','grades.*','store_mobiles.*','repair_work_groups.*','spares.*')
            ->where('spares.id', $id)
            ->get();

            return view('spares.view', ['flight' => $flight]);

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
        ->rightJoin('spares', 'generations.id', 'spares.modelId')
        ->select('brands.*','generations.*','spares.*')
        ->where('spares.id', $id)
        ->get();
//dd($flight);

        $repairCount = DB::table('repair_work_groups') // เช็คกลุ่มอุปกรณ์
            ->count();
        $generCount = DB::table('generations')
            ->count();
        $mobilCount = DB::table('store_mobiles') // เช็คร้านค้า
            ->count();
        $gradeCount = DB::table('grades')
            ->count();

         $gener = DB::table('brands')
            ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
            ->get();
        $grade = DB::table('grades')
            ->get();
        $mobil = DB::table('store_mobiles')
            ->get();
        $repair = DB::table('repair_work_groups')
            ->get();
            
        return view('spares.edit', ['repair'=> $repair,'gener' => $gener ,'grade'=> $grade , 'mobil' => $mobil , 'generCount' => $generCount, 'gradeCount'=> $gradeCount,'mobilCount'=> $mobilCount,'flight'=>$flight, 'repairCount' => $repairCount]);
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
        //dd($request->all());
        $validated = $request->validate([
            'modelId' => ['required', 'string', 'max:255'],
            'nameItem' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'gradeId' => ['required', 'string', 'max:255'],
            'storeId' => ['required', 'string', 'max:255'],
            'modelExplain' => ['required', 'string', 'max:255'],
            'guaranteeDate' => ['required', 'string', 'max:255'],

        ]);
        

        $bant =   $request->price;
        $priceBant =  number_format($bant);

      
        $member =   Spares::find($id);

        $member->modelId = $request->modelId;
        $member->groupItem = $request->groupItem;
        $member->nameItem = $request->nameItem;
        $member->price = $priceBant;
        $member->gradeId = $request->gradeId;
        $member->storeId = $request->storeId;
        $member->modelExplain = $request->modelExplain;
        $member->guaranteeDate = $request->guaranteeDate;
      
        $member->save();

        return redirect('spares')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Spares::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('spares')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
