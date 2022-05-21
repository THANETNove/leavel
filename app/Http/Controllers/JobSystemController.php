<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\JobSystem;
use Illuminate\Support\Facades\Auth;

class JobSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = $request->search;
        if (Auth::user()->status === '0') {

           if (!$query) {
                $data = DB::table('job_systems')
                    ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                    ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                    ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                    ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                    ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                    ->select('spares.*','brands.*','generations.*','repair_work_groups.*','status_serves.*','job_systems.*')
                    ->where('job_systems.statusJob', null)
                    ->orderBy('job_systems.id', 'DESC')
                    ->paginate(50);
           } else {
            $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->select('spares.*','brands.*','generations.*','status_serves.*','repair_work_groups.*','job_systems.*')
                ->where('job_systems.statusJob', null)
                ->where('brandName', 'like', "$query%")
                ->orWhere('deviceModel', 'like', "$query%")
                ->orWhere('model', 'like', "$query%")
                ->orWhere('username', 'like', "$query%")
                ->orWhere('phone', 'like', "$query%")
                ->orWhere('nameItem', 'like', "$query%")
                ->orWhere('receiptCode', 'like', "$query%")
                ->orderBy('job_systems.id', 'DESC')
                ->paginate(50);
             
           }
           
           
        }else{

            if (!$query) {
                $data = DB::table('job_systems')
                    ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                    ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                    ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                    ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                    ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                    ->select('spares.*','brands.*','generations.*' ,'repair_work_groups.*','status_serves.*','job_systems.*')
                    ->where('job_systems.riskid','=',Auth::user()->status)
                    ->where('job_systems.statusJob', null)
                    ->orderBy('job_systems.id', 'DESC')
                    ->paginate(50);
            }else{
                $data = DB::table('job_systems')
                    ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                    ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                    ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                    ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                    ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                    ->select('spares.*','brands.*','generations.*','repair_work_groups.*','status_serves.*','job_systems.*')
                    ->where('job_systems.riskid','=',Auth::user()->status)
                    ->where('job_systems.statusJob', null)
                    ->where('brandName', 'like', "$query%")
                    ->orWhere('deviceModel', 'like', "$query%")
                    ->orWhere('model', 'like', "$query%")
                    ->orWhere('username', 'like', "$query%")
                    ->orWhere('phone', 'like', "$query%")
                    ->orWhere('nameItem', 'like', "$query%")
                    ->orWhere('receiptCode', 'like', "$query%")
                    ->orderBy('job_systems.id', 'DESC')
                    ->paginate(50);
            }
            
          
              
           
        }
      
   
        return view('jobSystem.index', ['data' => $data]);
    }

    public function jobStatus(Request $request)
    {
       
        $query = $request->search;

        if (Auth::user()->status === '0') {

            if ($query) {
               
                $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                ->select('spares.*','brands.*','generations.*','repair_work_groups.*','status_serves.*','job_systems.*')
                ->where('brandName', 'like', "$query%")
                ->orWhere('deviceModel', 'like', "$query%")
                ->orWhere('statusJob', 'like', "$query%")
                ->orWhere('model', 'like', "$query%")
                ->orWhere('username', 'like', "$query%")
                ->orWhere('phone', 'like', "$query%")
                ->orWhere('nameItem', 'like', "$query%")
                ->orWhere('receiptCode', 'like', "$query%") 
                ->orderBy('job_systems.id', 'DESC')
                ->paginate(100);
             
           } else {
                    $data = DB::table('job_systems')
                    ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                    ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                    ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                    ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                    ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                    ->select('spares.*','brands.*','generations.*','status_serves.*','repair_work_groups.*','job_systems.*')
                    ->where('job_systems.statusJob','!=', null)
                    ->orderBy('job_systems.id', 'DESC')
                    ->paginate(100); 
           }
           
           
        }else{

            if ($query) {

                $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                ->select('spares.*','brands.*','generations.*','status_serves.*','repair_work_groups.*','job_systems.*')
                ->where('job_systems.riskid','=',Auth::user()->status)
                ->where('brandName', 'like', "$query%")
                ->orWhere('deviceModel', 'like', "$query%")
                ->orWhere('statusJob', 'like', "$query%")
                ->orWhere('model', 'like', "$query%")
                ->orWhere('username', 'like', "$query%")
                ->orWhere('phone', 'like', "$query%")
                ->orWhere('nameItem', 'like', "$query%")
                ->orWhere('receiptCode', 'like', "$query%")
                ->orderBy('job_systems.id', 'DESC')
                ->paginate(100);
            }else{

                $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                ->select('spares.*','brands.*','generations.*','status_serves.*','repair_work_groups.*','job_systems.*')
                ->where('job_systems.riskid','=',Auth::user()->status)
                ->where('job_systems.statusJob', $query) 
                ->where('job_systems.statusJob','!=', NULL)
                ->orderBy('job_systems.id', 'DESC')
                ->paginate(100);


            }
            
           
        }

        $dataStatus = DB::table('status_serves')
        ->get();
      
        return view('jobSystem.indexStatus', ['data' => $data,'dataStatus'=>$dataStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countRepair = DB::table('repair_work_groups')
            ->count();
        $repair = DB::table('repair_work_groups')
            ->get();
        $branch = DB::table('branches')
            ->join('risks', 'branches.id', '=', 'risks.brancheId')
            ->select('risks.*','branches.*')
            ->get();
       //dd($branch);

        return view('jobSystem.create' , ['repair' => $repair , 'branch' => $branch ,'countRepair' => $countRepair]);
    }

    function fetch(Request $request)
    {

      
     if($request->get('query'))
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
                <li  id="'.$row->id.'"><a class="pointer" id="'.$row->id.'">'.$row->brandName. '  &nbsp;, &nbsp;'.$row->deviceModel. '  &nbsp;, &nbsp;'.$row->model. '</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
            }
    }

}

    function mobileDevice(Request $request)
    {

        if($request->get('query'))
            {
            $query = $request->get('query');

            $data = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
                ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
                ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')
                ->select('brands.*','generations.*','grades.*','store_mobiles.*','spares.*')
                ->orderBy('brands.brandName', 'ASC')
                ->where('brandName', 'LIKE', "%{$query}%")
                ->orWhere('deviceModel', 'LIKE', "%{$query}%")
                ->orWhere('model', 'LIKE', "%{$query}%")
                ->orWhere('nameItem', 'LIKE', "%{$query}%")
                ->orWhere('price', 'LIKE', "%{$query}%")
                ->orWhere('gradeName', 'LIKE', "%{$query}%")
                ->orWhere('nameStore', 'LIKE', "%{$query}%")
                ->get();

          
                $output = '<ul class="dropdown-menu box-select" style="display:block; position:absolute; top: 72px">';
                foreach($data as $row)
                {
                $output .= '
                 <li id="'.$row->id.'"><a class="pointer" id="'.$row->id.'">'.$row->brandName.'&nbsp; ,&nbsp;'.$row->deviceModel.'&nbsp;, &nbsp;'.$row->model.'&nbsp; ,&nbsp;'.$row->nameItem.'&nbsp; ,&nbsp;'.$row->price.'&nbsp;, &nbsp;'.$row->gradeName.'&nbsp;,&nbsp;'.$row->nameStore.'</a></li>
                ';
                }
                $output .= '</ul>';
                echo $output;
            }
    }

    function priceMobile(Request $request)
    {
            
       $id = $request->id;
        //dd($id);
            $data = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
                ->leftJoin('repair_work_groups', 'spares.groupItem', '=', 'repair_work_groups.id')
                ->select('brands.*','generations.*', 'repair_work_groups.*','spares.*')
                ->where('spares.id', $id)
                ->get();

            $queryBrandName = $data[0]->brandName;
            $queryMobile = $data[0]->model; 
            $queryOriginal = "original";
            $queryScreen = "จอ";
       // dd( $queryMobile);
            $dataScreen = DB::table('brands')
                ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
                ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
                ->leftJoin('repair_work_groups', 'spares.groupItem', '=', 'repair_work_groups.id')
                ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
                ->select('brands.*','generations.*', 'repair_work_groups.*','grades.gradeName','spares.*')
                ->where('brandName', 'LIKE', "%{$queryBrandName}%")
                ->where('groupName', 'LIKE', "%{$queryScreen}%")
             /*    ->where('model', 'LIKE', "%{$queryMobile}%") */
                ->where('gradeName', 'LIKE', "%{$queryOriginal}%")
                ->get();
      
         return response()->json(['data' => $data,$dataScreen]); 
            
    }

    function getBranch(Request $request)
    {
            
        $id = $request->id;
 
            $dataRisk = DB::table('branches')
                ->join('risks', 'branches.id', '=', 'risks.brancheId')
                ->select('risks.*','branches.*')
                ->where('branches.id', $id)
                ->get();
       // dd($data);

        return response()->json(['data' => $dataRisk]);
            
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
            
            'username' => ['required', 'string','max:255'],
            'phone' => ['required', 'string','max:255'],
            'version' => ['required', 'string','max:255'],
            'color' => ['required', 'string','max:255'],
            'device' => ['required', 'string','max:255'],
            'pickUpDate' => ['required', 'string','max:255'],
            'another' => ['max:64'],
            'another2' => [ 'max:64'],
            
        ]);

      //  dd($request->all());
        $calculatedSystem =   number_format(round($request->calculatedSystem));
        $calculatedTechnician = number_format(round($request->calculatedTechnician));

        $device =  $request->device;
        if ($calculatedTechnician == "0") {
            $price =    $calculatedSystem;
            $calculatedTechnician = null;
        }else{
            $price = $calculatedTechnician;
            
        }



        $data = DB::table('brands')
            ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
            ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
            ->select('brands.*','generations.*','spares.*')
            ->where('spares.id', $device)
            ->get();
          $priceModel = number_format($data[0]->price);
          $priceSum =   str_replace(',','', $price) -  str_replace(',','', $priceModel);
          $priceSum = number_format(round($priceSum));
  
        $pin = mt_rand(10000000, 99999999);
        $string = str_shuffle($pin);
        $string1 = str_random(10);
        $receiptCode =  $string."" .$string1;
        //dd($data,$dataName,$sumName,$string);

        $member = New JobSystem;

        $member->username = $request->username;
        $member->phone = $request->phone;
        $member->version = $request->version;
        $member->imei = $request->IMEI;
        $member->screenUnlock = $request->screenUnlock;
        $member->riskid = $request->riskid;
        $member->riskCalculator = $request->riskCalculator;
        $member->another = $request->another;
        $member->calculatedSystem = $calculatedSystem;
        $member->calculatedTechnician =  $calculatedTechnician;
        $member->notifiedWaste =  $request->notifiedWaste;
        $member->device =  $device;
        $member->color =  $request->color;
        $member->priceJob = $price;
        $member->pickUpDate = $request->pickUpDate;
        $member->checkbox1 = $request->checkbox1;
        $member->checkbox2 = $request->checkbox2;
        $member->checkbox3 = $request->checkbox3;
        $member->checkbox4 = $request->checkbox4;
        $member->checkbox5 = $request->checkbox5;
        $member->checkbox6 = $request->checkbox6;
        $member->checkbox7 = $request->checkbox7;
        $member->checkbox8 = $request->checkbox8;
        $member->another2 = $request->another2;
        $member->accessoryBrand = $data[0]->brandName;
        $member->accessoryDeviceModel = $data[0]->deviceModel;
        $member->accessoryModel = $data[0]->model;
        $member->priceModel = $data[0]->price;
        $member->priceSum = $priceSum;
        $member->receiptCode = $receiptCode;
        

      
        $member->save();
        return redirect('job-system')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = DB::table('job_systems')
            ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')// ยิ้ห้อ
            ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id') // รุ่น
            ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id') // สาขา
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')  //กลุ่มอุปกรณ์
            ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')  // อะไหล่
            ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id') // เกรดอะไหล่
            ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')  // ร้านค้า
            ->select('repair_work_groups.*','branches.*','status_serves.*','brands.*', 'store_mobiles.*', 'generations.*','grades.*','spares.*','job_systems.*')
            ->where('job_systems.id', $id)
            ->get();
    return view('jobSystem.view' , ['flight' => $flight]);
    }

    public function JobSystemStatueShow($id)
    {
 
        $flight = DB::table('job_systems')
            ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')// ยิ้ห้อ
            ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id') // รุ่น
            ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id') // สาขา
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')  //กลุ่มอุปกรณ์
            ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')  // อะไหล่
            ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id') // เกรดอะไหล่
            ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')  // ร้านค้า
            ->select('repair_work_groups.*','branches.*','brands.*', 'status_serves.*','store_mobiles.*', 'generations.*','grades.*','spares.*','job_systems.*')
            ->where('job_systems.id', $id)
            ->get();

        $dataStatus = DB::table('status_serves')
            ->where('statusServeName', '!=', "กำลังดำเนินการ")
            ->get();
   
    return view('jobSystem.viewStatus' , ['flight' => $flight, 'dataStatus'=>$dataStatus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       

        $repair = DB::table('repair_work_groups')
            ->get();
        $branch = DB::table('branches')
        ->join('risks', 'branches.id', '=', 'risks.brancheId')
        ->select('risks.*','branches.*')
            ->get();

        $flight = DB::table('job_systems')
            ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
            ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
            ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id')
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')
            ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id')
            ->select('repair_work_groups.*','branches.*','brands.*','generations.*','grades.*','spares.*','job_systems.*')
            ->where('job_systems.id', $id)
            ->get();

    return view('jobSystem.edit' , ['repair' => $repair , 'branch' => $branch ,'flight' => $flight]);
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
            
            'username' => ['required', 'string','max:255'],
            'phone' => ['required', 'string','max:255'],
            'version' => ['required', 'string','max:255'],
            'color' => ['required', 'string','max:255'],
            'device' => ['required', 'string','max:255'],
            'pickUpDate' => ['required', 'string','max:255'],
            'another' => ['max:64'],
            'another2' => ['max:64'],
        ]);

      //  dd($request->all());
      
        $calculatedSystem =   $request->calculatedSystem;
        $calculatedTechnician = $request->calculatedTechnician;
        $calculatedSystem =   str_replace(',','', $calculatedSystem);
        $calculatedTechnician =   str_replace(',','', $calculatedTechnician);

        $calculatedSystem =   number_format(round($calculatedSystem));
        $calculatedTechnician = number_format(round($calculatedTechnician));

        $device =  $request->device;
        $data = DB::table('brands')
            ->rightJoin('generations', 'brands.id', '=', 'generations.brandGroup')
            ->rightJoin('spares', 'generations.id', '=', 'spares.modelId')
            ->select('brands.*','generations.*','spares.*')
            ->where('spares.id', $device)
            ->get();

     

        $device =  $request->device;
        if ( $calculatedTechnician == null ||  $calculatedTechnician == '0')  {
            
            $price =    $calculatedSystem;
            $calculatedTechnician = null;
        }else{
         
            $price = $calculatedTechnician;
        }

        $priceModel = number_format($data[0]->price);
        $priceSum =   str_replace(',','', $price) -  str_replace(',','', $priceModel);
        $priceSum = number_format(round($priceSum));
  

         
        $member =  JobSystem::find($id);
       
        $member->username = $request->username;
        $member->phone = $request->phone;
        $member->version = $request->version;
        $member->imei = $request->IMEI;
        $member->screenUnlock = $request->screenUnlock;
        $member->riskid = $request->riskid;
        $member->riskCalculator = $request->riskCalculator;
        $member->another = $request->another;
        $member->calculatedSystem = $calculatedSystem;
        $member->calculatedTechnician =  $calculatedTechnician;
        $member->notifiedWaste =  $request->notifiedWaste;
        $member->device =  $device;
        $member->color =  $request->color;
        $member->priceJob = $price;
        $member->pickUpDate = $request->pickUpDate;
        $member->checkbox1 = $request->checkbox1;
        $member->checkbox2 = $request->checkbox2;
        $member->checkbox3 = $request->checkbox3;
        $member->checkbox4 = $request->checkbox4;
        $member->checkbox5 = $request->checkbox5;
        $member->checkbox6 = $request->checkbox6;
        $member->checkbox7 = $request->checkbox7;
        $member->checkbox8 = $request->checkbox8;
        $member->another2 = $request->another2;

        $member->accessoryBrand = $data[0]->brandName;
        $member->accessoryDeviceModel = $data[0]->deviceModel;
        $member->accessoryModel = $data[0]->model;
        $member->priceModel = $data[0]->price;
        $member->priceSum = $priceSum;
        


        $member->save();
        return redirect('job-system')->with('message', 'บันทึก ข้อมูลเรียบร้อย' );
    }

    public function JobSystemStatus(Request $request, $id)
    {
        $statusName = "2";

        $member =  JobSystem::find($id);

        $member->statusJob = $statusName;
        $member->save();
        return redirect('job-system')->with('message', 'ยันยันการซ่อม เรียบร้อย' );
    }

public function JobSystemStatusEdit(Request $request)
{
   $id = $request->id;

   $statusName = $request->status;
   $commentBranch = $request->commentBranch;
   $commentMend = $request->commentMend;
   $member =  JobSystem::find($id);

   $member->statusJob = $statusName;
   $member->commentBranch = $commentBranch;
   $member->commentMend = $commentMend;
   $member->save();
   return redirect('job-Status')->with('message', 'ยันยันการซ่อม เรียบร้อย' );
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $flight = JobSystem::find($id); //ลบภาพในdb
        $flight->delete();

        return redirect('job-Status')->with('message', 'ลบ ข้อมูลเรียบร้อย' );
    }
}