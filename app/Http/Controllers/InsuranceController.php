<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class InsuranceController extends Controller
{
    public function insurance(Request $request)
    {

       $query =  $request->name;

       if ($query != null) {
        $data = DB::table('job_systems')
        ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')
        ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id')
        ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')
        ->leftJoin('risks', 'job_systems.riskid', '=', 'risks.brancheId')
        ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id') 
        ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id')
        ->select('spares.*','brands.*','generations.*','branches.*', 'repair_work_groups.*', 'job_systems.*')
        ->where('imei', 'like', "$query%")
        ->orWhere('receiptCode', 'like', "$query%")
        ->orderBy('job_systems.id', 'DESC') 
        ->get();
    /*  $dateGu =  $data[0]->guaranteeDate; 
    $dateGuarantee  = Carbon::today()->add($dateGu, 'day')->thaidate('l j F Y');

    dd($dateGuarantee); */
  
    return response()->json(['data' => $data]); 
       }
     

    }

}
