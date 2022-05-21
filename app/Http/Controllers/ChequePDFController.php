<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Carbon\Carbon;
use App\Models\JobSystem;
class ChequePDFController extends Controller
{
    //
    public function warrantyCard($id)
    {
   
  
       $data = DB::table('job_systems')
            ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')// ยิ้ห้อ
            ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id') // รุ่น
            ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id') // สาขา
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')  //กลุ่มอุปกรณ์
            ->join('spares', 'job_systems.device', '=', 'spares.id')  // อะไหล่
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id') // เกรดอะไหล่
            ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')  // ร้านค้า
            ->select(
                'repair_work_groups.groupName',
                'branches.branch','branches.name','branches.branchPhone','branches.branchPhoneReserve',
                'branches.otherContacts', 'branches.particulars',
                'brands.brandName',
                'store_mobiles.nameStore',
                'generations.deviceModel','generations.model',
                'grades.gradeName',
                'spares.nameItem',
                'job_systems.username','job_systems.phone','job_systems.imei','job_systems.another','job_systems.color',
                'job_systems.priceJob','job_systems.pickUpDate','job_systems.checkbox1',
                'job_systems.checkbox1','job_systems.checkbox2','job_systems.checkbox3','job_systems.checkbox4',
                'job_systems.checkbox5','job_systems.checkbox6','job_systems.checkbox7','job_systems.checkbox8',
                'job_systems.another2','job_systems.receiptCode','job_systems.screenUnlock'
              )
            ->where('job_systems.id', $id)
            ->get();
              
        $dataName = DB::table('index_home_pages')
            ->select('index_home_pages.webName')
            ->get();
           
        $nameWeb = $dataName[0]->webName;



        $dateName = Carbon::parse()->thaidate('l j F Y');
     // dd($data);
       
        //otherContacts == 86
        //another2 == 153
         //another2 == 140
        //view()->share('employee',$data);
        $pdf = PDF::loadView('PDF.warrantyCard',['data' => $data,'dataName' => $nameWeb , 'dateName'=> $dateName]);
  
        // download PDF file with download method
        //return $pdf->download('warrantyCard.pdf');
        return $pdf->stream('warrantyCard.pdf');
        



    }

    public function receipt($id)
    {
     
        
       $data = DB::table('job_systems')
            ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')// ยิ้ห้อ
            ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id') // รุ่น
            ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id') // สาขา
            ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')  //กลุ่มอุปกรณ์
            ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')  // อะไหล่
            ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id') // เกรดอะไหล่
            ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')  // ร้านค้า
            ->select(
                'repair_work_groups.groupName',
                'branches.branch','branches.name','branches.branchPhone','branches.branchPhoneReserve',
                'branches.otherContacts', 'branches.particulars',
                'brands.brandName',
                'store_mobiles.nameStore',
                'generations.deviceModel','generations.model',
                'grades.gradeName',
                'spares.nameItem',
                'spares.guaranteeDate',
                'job_systems.username','job_systems.phone','job_systems.imei','job_systems.another','job_systems.color',
                'job_systems.priceJob','job_systems.pickUpDate','job_systems.checkbox1',
                'job_systems.checkbox1','job_systems.checkbox2','job_systems.checkbox3','job_systems.checkbox4',
                'job_systems.checkbox5','job_systems.checkbox6','job_systems.checkbox7','job_systems.checkbox8',
                'job_systems.another2','job_systems.receiptCode','job_systems.screenUnlock','job_systems.insurance'
              )
            ->where('job_systems.id', $id)
            ->get();
     
   $dataName = DB::table('index_home_pages')
       ->select('index_home_pages.webName')
       ->get();
     
   $nameWeb = $dataName[0]->webName;
   $dateGu =  $data[0]->guaranteeDate;  

   $ins = $data[0]->insurance; 

   $dateName = Carbon::parse()->thaidate('l j F Y');

   $dateGuarantee  = Carbon::today()->add($dateGu, 'day')->thaidate('l j F Y');

 if ($ins === null) {
    $member =  JobSystem::find($id);
    $member->insurance = $dateGuarantee;
    $member->save();
 }


 /*  get ค่า ใหม่ */
  $data = DB::table('job_systems')
        ->leftJoin('generations', 'job_systems.version', '=', 'generations.id')// ยิ้ห้อ
        ->leftJoin('brands', 'generations.brandGroup', '=', 'brands.id') // รุ่น
        ->leftJoin('branches', 'job_systems.riskid', '=', 'branches.id') // สาขา
        ->leftJoin('repair_work_groups', 'job_systems.notifiedWaste', '=', 'repair_work_groups.id')  //กลุ่มอุปกรณ์
        ->leftJoin('spares', 'job_systems.device', '=', 'spares.id')  // อะไหล่
        ->leftJoin('grades', 'spares.gradeId', '=', 'grades.id') // เกรดอะไหล่
        ->leftJoin('store_mobiles', 'spares.storeId', '=', 'store_mobiles.id')  // ร้านค้า
        ->select(
            'repair_work_groups.groupName',
            'branches.branch','branches.name','branches.branchPhone','branches.branchPhoneReserve',
            'branches.otherContacts', 'branches.particulars',
            'brands.brandName',
            'store_mobiles.nameStore',
            'generations.deviceModel','generations.model',
            'grades.gradeName',
            'spares.nameItem',
            'spares.guaranteeDate',
            'job_systems.username','job_systems.phone','job_systems.imei','job_systems.another','job_systems.color',
            'job_systems.priceJob','job_systems.pickUpDate','job_systems.checkbox1',
            'job_systems.checkbox1','job_systems.checkbox2','job_systems.checkbox3','job_systems.checkbox4',
            'job_systems.checkbox5','job_systems.checkbox6','job_systems.checkbox7','job_systems.checkbox8',
            'job_systems.another2','job_systems.receiptCode','job_systems.screenUnlock','job_systems.insurance'
          )
        ->where('job_systems.id', $id)
        ->get();





  //dd($data,  Strlen($data[0]->another));
 //dd($data,$dateName,$dateGuarantee, $dateGu);
   //otherContacts == 86
   //another2 == 153
    //another2 == 140
   //view()->share('employee',$data);
  
   $pdf = PDF::loadView('PDF.guarantee',['data' => $data,'dataName' => $nameWeb , 'dateName'=> $dateName]);
   // download PDF file with download method
   //return $pdf->download('warrantyCard.pdf');
   return $pdf->stream('guarantee.pdf');
    }
}
