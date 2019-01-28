<?php
namespace Modules\Department\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseRequest\Entities\PurchaseItems;
use Modules\BAC\Entities\PurchasePPMPApproval;

/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class Dept_datatable
{

    /*BAC list */

    public function dept_pr_list($vars = null){
        if(Session::get('olongapo_user')->group_id == 9){
          $PurchaseNo = PurchaseNo::all();
        }else{
          $PurchaseNo = PurchaseNo::where('dept_id', session::get('olongapo_emp_depts')->dept_id)->get();
        }
        $records = [];
        if(!$PurchaseNo->isEmpty()) {
                 foreach($PurchaseNo as $pr) {
                    #check if approved
                      $approval = DB::table('olongapo_purchase_request_ppmp_approval')
                                  ->where("request_no_id", '=', $pr->id)
                                  ->get();
                      $status = (count($approval) > 0 ? $approval[0]->status : 3);
                      $remarks = (count($approval) > 0 ? $approval[0]->remarks : '');
                      $record = array(
                                                'olongapo_purchase_request_no.id' => $pr->id,
                                                'pr_no' => $pr->pr_no,
                                                'dept_id' => $pr->dept_id,
                                                'dept_name' => $pr->pr_dept->dept_desc,
                                                'pr_date_dept' => $pr->pr_date_dept,
                                                'pr_remarks' => $pr->remarks,
                                                'pr_purpose' => $pr->pr_purpose,
                                                'pr_status' => $pr->status,
                                                'approval_status' => $status,
                                                'approval_remarks' => $remarks,
                                                );
                      array_push($records, $record);
                 }

        }
          return collect($records);

    }



}


