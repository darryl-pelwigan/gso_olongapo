<?php

namespace Modules\PurchaseRequest\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\PurchaseRequest\Entities\PurchaseItems;
/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class POPR_datatable
{


    public function dept_pr_list($vars = null){
        $PurchaseNo = PurchaseNo::get();
        $records = [];
        if(!$PurchaseNo->isEmpty()) {
             foreach($PurchaseNo as $pr) {

                $proc_type = 'Not Set';
                if(isset($pr->bac_type->proc_title)){
                    $proc_type = $pr->bac_type->proc_title.' ('.$pr->bac_type->proc_min_value.' - '.$pr->bac_type->proc_max_value.')';
                }
                    $approval = DB::table('olongapo_purchase_request_ppmp_approval')
                          ->where("request_no_id", '=', $pr->id)
                          ->get();

                if(count($approval) > 0){
               
                     $record = array(
                          'olongapo_purchase_request_no.id' => $pr->id,
                           'olongapo_purchase_request_no.pr_no' => $pr->pr_no ? $pr->pr_no : ' ',
                            'dept_id' => $pr->dept_id,
                             'olongapo_subdepartment.dept_desc' => $pr->pr_dept->dept_desc,
                              'olongapo_purchase_request_no.pr_date' => $pr->pr_date,
                              'pr_remarks' => $pr->remarks,
                              'olongapo_purchase_request_no.pr_purpose' => $pr->pr_purpose,
                               'pr_status' => $pr->status,
                               'olongapo_purchase_request_no.pr_date_dept' => $pr->pr_date_dept,
                               'proc_type' =>  $proc_type,
                        );
                     array_push($records, $record);
                }
             }

        }

          return collect($records);

    }

     public function dept_pr_list_approval($vars = null){
        $PurchaseNo = PurchaseNo::get();
        $records = [];
        if(!$PurchaseNo->isEmpty()) {
                 foreach($PurchaseNo as $pr) {
                    $proc_type = 'Not Set';
                    if(isset($pr->bac_type->proc_title)){
                             $proc_type = $pr->bac_type->proc_title.' ('.$pr->bac_type->proc_min_value.' - '.$pr->bac_type->proc_max_value.')';
                    }
                     #check if approved
                      $approval = DB::table('olongapo_purchase_request_ppmp_approval')
                                  ->where("request_no_id", '=', $pr->id)
                                  ->get();
                      $status = (count($approval) > 0 ? $approval[0]->status : 3);
                      $remarks = (count($approval) > 0 ? $approval[0]->remarks : '');
                         $record = array(
                                                    'olongapo_purchase_request_no.id' => $pr->id,
                                                     'olongapo_purchase_request_no.pr_no' => $pr->pr_no,
                                                      'dept_id' => $pr->dept_id,
                                                       'olongapo_subdepartment.dept_desc' => $pr->pr_dept->dept_desc,
                                                        'olongapo_purchase_request_no.pr_date' => $pr->pr_date,
                                                        'pr_remarks' => $pr->remarks,
                                                        'olongapo_purchase_request_no.pr_purpose' => $pr->pr_purpose,
                                                         'pr_status' => $pr->status,
                                                         'olongapo_purchase_request_no.pr_date_dept' => $pr->pr_date_dept,
                                                         'proc_type' =>  $proc_type,
                                                          'approval_status' => $status,
                                                'approval_remarks' => $remarks,
                                                    );
                         array_push($records, $record);
                 }

        }
          return collect($records);

    }



}


