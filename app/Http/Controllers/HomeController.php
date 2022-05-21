<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /*รายละเอียดการซ่อม  */

        $version =   $request->version;
        $brand =   $request->brand;
        $dateStart =   $request->dateStart;
        $dateEnd =   $request->dateEnd;
        if ($brand  === "null") {
            $brand = null;
        }
        if ($version === "null") {
            $version = null;
        }

        Session::put('version', 53);
        $banModel = null;
        $ban = null;


        $dateMon = Carbon::now()->format('m');

        $homeTop = DB::table('index_home_pages')
            ->get();
        $homeName =   $homeTop[0]->webName;
        Session::put('nameWbe', $homeName);
        $dateDay = Carbon::now()->format('d');

        /* เเจ้งเตือน */

         $groups = DB::table('brands')
            ->join('generations', 'brands.id', '=', 'generations.brandGroup')
            ->join('job_systems', 'generations.id', '=', 'job_systems.version')
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')
            ->leftJoin('spares', 'job_systems.device', '=', 'spares.id') 
            ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
            ->select('brands.*', 'spares.*','generations.*','status_serves.*', 'repair_work_groups.*', 'job_systems.*')
            ->orderBy('job_systems.id', 'DESC');
            
            if (Auth::user()->status === '0') {
            /* รวมทุกสาขา */
            $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
                ->select('spares.*', 'brands.*', 'generations.*','status_serves.*','repair_work_groups.*', 'job_systems.*')
                ->whereDay('job_systems.created_at', $dateDay)
                ->orderBy('job_systems.id', 'DESC')
                ->get(); 
                
                
                if ($brand == null && $version === null) {
             
                    if ($dateStart != null) {
                      
                        $groups =  $groups->whereMonth('job_systems.created_at', $dateMon)
                                ->whereDate('job_systems.created_at','>=',$dateStart)
                                ->whereDate('job_systems.created_at','<=',$dateEnd)   
                            ->get();
                            $count =  $groups->count();
                            $cost  = [];
                            $profit = [];
                            $estimate = [];
                                foreach ($groups as $key) {
                                    array_push($cost,str_replace(',','', $key->priceModel));
                                }
                                foreach ($groups as $key) {
                                    array_push($profit,str_replace(',','', $key->priceSum));
                                }
                                foreach ($groups as $key) {
                                    array_push($estimate,str_replace(',','', $key->priceJob));
                                }
                            $cost =  array_sum($cost);
                            $profit =  array_sum($profit);
                            $estimate =  array_sum($estimate);   
                    }else{
                         $groups =  $groups->whereMonth('job_systems.created_at', $dateMon)
                            ->get();
                            $count =  $groups->count();
                            $cost  = [];
                            $profit = [];
                            $estimate = [];
                                foreach ($groups as $key) {
                                    array_push($cost,str_replace(',','', $key->priceModel));
                                }
                                foreach ($groups as $key) {
                                    array_push($profit,str_replace(',','', $key->priceSum));
                                }
                                foreach ($groups as $key) {
                                    array_push($estimate,str_replace(',','', $key->priceJob));
                                }
                            $cost =  array_sum($cost);
                            $profit =  array_sum($profit);
                            $estimate =  array_sum($estimate);        
                    }
                }elseif ($brand !== null && $version !== null) {
                    $groups =  $groups->where('generations.brandGroup', $brand)
                                      ->where('generations.id', $version)
                                    ->whereDate('job_systems.created_at','>=',$dateStart)
                                    ->whereDate('job_systems.created_at','<=',$dateEnd)                
                                    ->get();
                    $count =  $groups->count();
                    $cost  = [];
                    $profit = [];
                    $estimate = [];
                        foreach ($groups as $key) {
                            array_push($cost,str_replace(',','', $key->priceModel));
                        }
                        foreach ($groups as $key) {
                            array_push($profit,str_replace(',','', $key->priceSum));
                        }
                        foreach ($groups as $key) {
                            array_push($estimate,str_replace(',','', $key->priceJob));
                        }
                    $cost =  array_sum($cost);
                    $profit =  array_sum($profit);
                    $estimate =  array_sum($estimate);
                   
                    if ($count > 0) {
                        $ban  = $groups[0]->brandName;
                        $banModel  = $groups[0]->deviceModel;
                        
                    }
                   
                } else {
                    $groups =  $groups->where('generations.brandGroup', $brand)
                                ->whereDate('job_systems.created_at','>=',$dateStart)
                                ->whereDate('job_systems.created_at','<=',$dateEnd)                
                                ->get(); 
                    $count =  $groups->count();
                    $cost  = [];
                    $profit = [];
                    $estimate = [];
                        foreach ($groups as $key) {
                            array_push($cost,str_replace(',','', $key->priceModel));
                        }
                        foreach ($groups as $key) {
                            array_push($profit,str_replace(',','', $key->priceSum));
                        }
                        foreach ($groups as $key) {
                            array_push($estimate,str_replace(',','', $key->priceJob));
                        }
                    $cost =  array_sum($cost);
                    $profit =  array_sum($profit);
                    $estimate =  array_sum($estimate);
                        if ($count > 0) {
                            $ban  = $groups[0]->brandName;
                        }
                    
                }

          
        } else {
            /* ส่วนของเเต่ละร้าน */
            $data = DB::table('job_systems')
                ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
                ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
                ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
                ->leftJoin('status_serves', 'job_systems.statusJob', '=', 'status_serves.id')
                ->leftJoin('repair_work_groups', 'status_serves.*','job_systems.notifiedWaste', '=', 'repair_work_groups.id')
                ->select('spares.*', 'brands.*', 'generations.*','repair_work_groups.*', 'job_systems.*')
                ->where('job_systems.riskid', '=', Auth::user()->status)
                ->whereDay('job_systems.created_at', $dateDay)
                ->orderBy('job_systems.id', 'DESC')
                ->get();


                if ($brand === null && $version === null) {
              
                    if ($dateStart !== null) {
                        $groups =  $groups->whereMonth('job_systems.created_at', $dateMon)
                                ->whereDate('job_systems.created_at','>=',$dateStart)
                                ->whereDate('job_systems.created_at','<=',$dateEnd)   
                            ->get();
                            $count =  $groups->count();
                            $cost  = [];
                            $profit = [];
                            $estimate = [];
                                foreach ($groups as $key) {
                                    array_push($cost,str_replace(',','', $key->priceModel));
                                }
                                foreach ($groups as $key) {
                                    array_push($profit,str_replace(',','', $key->priceSum));
                                }
                                foreach ($groups as $key) {
                                    array_push($estimate,str_replace(',','', $key->priceJob));
                                }
                            $cost =  array_sum($cost);
                            $profit =  array_sum($profit);
                            $estimate =  array_sum($estimate);
                    }else{
                         $groups =  $groups->whereMonth('job_systems.created_at', $dateMon)
                            ->get();     
                            $count =  $groups->count();
                            $cost  = [];
                            $profit = [];
                            $estimate = [];
                                foreach ($groups as $key) {
                                    array_push($cost,str_replace(',','', $key->priceModel));
                                }
                                foreach ($groups as $key) {
                                    array_push($profit,str_replace(',','', $key->priceSum));
                                }
                                foreach ($groups as $key) {
                                    array_push($estimate,str_replace(',','', $key->priceJob));
                                }
                            $cost =  array_sum($cost);
                            $profit =  array_sum($profit);
                            $estimate =  array_sum($estimate);   
                    }
                }elseif ($brand !== null && $version !== null) {
         
                    $groups =  $groups->where('generations.brandGroup', $brand)
                                    ->where('generations.id', $version)
                                    ->whereDate('job_systems.created_at','>=',$dateStart)
                                    ->whereDate('job_systems.created_at','<=',$dateEnd)                
                                    ->get(); 
                    $count =  $groups->count();
                    $cost  = [];
                    $profit = [];
                    $estimate = [];
                        foreach ($groups as $key) {
                            array_push($cost,str_replace(',','', $key->priceModel));
                        }
                        foreach ($groups as $key) {
                            array_push($profit,str_replace(',','', $key->priceSum));
                        }
                        foreach ($groups as $key) {
                            array_push($estimate,str_replace(',','', $key->priceJob));
                        }
                    $cost =  array_sum($cost);
                    $profit =  array_sum($profit);
                    $estimate =  array_sum($estimate);
                    if ($count > 0) {
                        $ban  = $groups[0]->brandName;
                        $banModel  = $groups[0]->deviceModel;
                    }
                }else {
                    $groups =  $groups->where('generations.brandGroup', $brand)
                                ->whereDate('job_systems.created_at','>=',$dateStart)
                                ->whereDate('job_systems.created_at','<=',$dateEnd)                
                                ->get(); 
                    $count =  $groups->count();
                    $cost  = [];
                    $profit = [];
                    $estimate = [];
                        foreach ($groups as $key) {
                            array_push($cost,str_replace(',','', $key->priceModel));
                        }
                        foreach ($groups as $key) {
                            array_push($profit,str_replace(',','', $key->priceSum));
                        }
                        foreach ($groups as $key) {
                            array_push($estimate,str_replace(',','', $key->priceJob));
                        }
                    $cost =  array_sum($cost);
                    $profit =  array_sum($profit);
                    $estimate =  array_sum($estimate);
                    if ($count > 0) {
                        $ban  = $groups[0]->brandName;
                    }
                   
                }

         
            /* เช็ครายการของเเต่ ละรุ่น */
        }
   

        $dataBrands = DB::table('brands')
        ->get();

        $generations = DB::table('generations')
        ->get();

        return view('home', ['data' => $data, 'groups' =>  $groups,'dataBrands' => $dataBrands ,'count'=>$count,'cost'=>$cost,'profit'=>$profit,'estimate'=>$estimate ,
        'banModel' =>$banModel,'version'=> $version,'ban' =>$ban,'brand'=>$brand,'dateStart'=> $dateStart,'dateEnd'=> $dateEnd,'generations'=>$generations]);
    }

    public function dataWork()
    {

        $date = Carbon::now()->format('m');


        $dataJob = DB::table('repair_work_groups')
            ->join('job_systems', 'repair_work_groups.id', '=', 'job_systems.notifiedWaste')
            ->where('job_systems.statusJob', '>=',  5)
            ->whereMonth('job_systems.created_at', $date)
            ->select(DB::raw('count(notifiedWaste) as sum ,repair_work_groups.groupName'))
            ->groupBy('job_systems.notifiedWaste')
            ->get();
        return response()->json(['data' => $dataJob]);
    }
    public function dataBrands()
    {
        $dataJob = DB::table('brands')
            ->join('generations', 'brands.id', '=', 'generations.brandGroup')
            ->join('job_systems', 'generations.id', '=', 'job_systems.version')
            ->select(DB::raw('count(version) as sum ,brands.brandName,generations.deviceModel'))
            ->groupBy('job_systems.version')
            ->get();

        return response()->json(['data' => $dataJob]);
    }

    public function dataGene(Request $request)
    {

        $id =  $request->id;
        $dataJob = DB::table('generations')
        ->where('brandGroup', $id)
        ->get();

        return response()->json(['data' => $dataJob]);
    }

    /* นัลจำนวน อะไหล่ในระบบ  เเต่ละกลุ่ม*/
    public function countFinish($id)
    {
        $job_Finish = DB::table('job_systems')
            ->where('version',  Session::get('version'))
            ->where('statusJob',  "ซ่อมเสร็จ")
            ->where('notifiedWaste', $id)
            ->count();
        return   $job_Finish;
    }
    public function countCancel($id)
    {
        $job_Cancel = DB::table('job_systems')
            ->where('version',  Session::get('version'))
            ->where('statusJob',  "ยกเลิกการซ่อม")
            ->where('notifiedWaste', $id)
            ->count();
        return   $job_Cancel;
    }

    public function countSendRepair($id)
    {
        $job_Cancel = DB::table('job_systems')
            ->where('version',  Session::get('version'))
            ->where('statusJob',  "ส่งซ่อม")
            ->where('notifiedWaste', $id)
            ->count();
        return   $job_Cancel;
    }


    /* นับจำนวนงานในระบบ */
    public function countJob_systems($id)
    {

        $job_systems = DB::table('job_systems')
            ->where('version',  Session::get('version'))
            ->where('notifiedWaste', $id)
            ->count();


        return   $job_systems;
    }

    public function getGenerations(Request $request)
    {   
        $id = $request->id;

        $job_systems = DB::table('generations')
            ->select('generations.id','generations.deviceModel','generations.brandGroup')
            ->where('brandGroup', $id)
            ->get();

     


        return   $job_systems; 
    }

    public function setInterval()
    {  

        if (Auth::user()->status === '0') {
            $dataJob = DB::table('job_systems')
                ->where('statusJob', null)
                ->count();
        } else {
            $dataJob = DB::table('job_systems')
                ->where('statusJob', null)
                ->where('job_systems.riskid', '=', Auth::user()->status)
                ->count();
        }

        return   response()->json(['data' => $dataJob]);
    }





}