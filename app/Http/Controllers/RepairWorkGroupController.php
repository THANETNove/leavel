<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\RepairWorkGroup;

class RepairWorkGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* นัลจำนวน อะไหล่ในระบบ  เเต่ละกลุ่ม*/
    public function countSpares($id) {
        $groups = DB::table('spares')
            ->where('groupItem', $id)
            ->count();
        return   $groups;
    }

    /* นับจำนวนงานในระบบ */
    public function countJob_systems($id) {  
        $job_systems = DB::table('job_systems')
        ->where('notifiedWaste',$id)    
        ->count();
           
        return   $job_systems;
    }


    public function countGroups($id) {
        $groupsItem = DB::table('spares')
            ->where('groupItem', $id)
            ->count();
        return   $groupsItem;
    }



    
    public function index()
    {
                $groups = DB::table('repair_work_groups')
                   /*  ->leftJoin('spares', 'repair_work_groups.id', '=', 'spares.groupItem')
                    ->select('spares.*','repair_work_groups.*') */
                    //->groupBy('spares.groupItem')
                    ->orderBy('id', 'DESC')
                    ->get();

       // dd($groups);
        return  view('repair_work_group.index' ,['groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('repair_work_group.create');
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
            'groupName' => ['required', 'string', 'max:255'],
            'profit' => ['required', 'string', 'max:255'],

        ]);


      
        $member = new RepairWorkGroup;

        $member->groupName = $request->groupName;
        $member->profit = $request->profit;
       
      
        $member->save();

        return redirect('repair-group')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
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
        $flight = DB::table('repair_work_groups')
        ->where('id', $id)
        ->get();

        return view('repair_work_group.edit' , ['flight' => $flight]);
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
            'groupName' => ['required', 'string', 'max:255'],
            'profit' => ['required', 'string', 'max:255'],

        ]);


      
        $member =  RepairWorkGroup::find($id);

        $member->groupName = $request->groupName;
        $member->profit = $request->profit;
       
      
        $member->save();

        return redirect('repair-group')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = RepairWorkGroup::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('repair-group')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}
