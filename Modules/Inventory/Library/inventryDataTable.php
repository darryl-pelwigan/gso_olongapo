<?php

namespace Modules\Inventory\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
*   Class : inventryDataTable
*   methods : inventroy DataTable methods
*/
class inventryDataTable
{

    public function get_job_request_approved($vars = null){
        $ppe_mnthly = DB::table('olongapo_ppe_mnthly_report')
                                        ->join('olongapo_ppe_mnthly_report_items','olongapo_ppe_mnthly_report_items.ppe_mnthly_id','=','olongapo_ppe_mnthly_report.id')
                                        ->join('olongapo_employee_list','olongapo_employee_list.id','=','olongapo_ppe_mnthly_report_items.accountable_person')
                                        ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_ppe_mnthly_report_items.department')
                                        ->join('supplier_info','supplier_info.id','=','olongapo_ppe_mnthly_report_items.supplier')
                                        ->select(
                                                    'olongapo_ppe_mnthly_report.id as ppe_mnthly_id'
                                                    ,'olongapo_ppe_mnthly_report.date_log','olongapo_ppe_mnthly_report.inv_control_no','olongapo_ppe_mnthly_report.type'
                                                    ,'olongapo_ppe_mnthly_report_items.id as ppe_mnthly_items_id'
                                                    ,'olongapo_ppe_mnthly_report_items.item_desc','olongapo_ppe_mnthly_report_items.property_code','olongapo_ppe_mnthly_report_items.po_no'
                                                    ,'olongapo_ppe_mnthly_report_items.qty','olongapo_ppe_mnthly_report_items.unit_value','olongapo_ppe_mnthly_report_items.total_value','olongapo_ppe_mnthly_report_items.invoice'
                                                    ,db::raw('CONCAT(olongapo_employee_list.fname," ",olongapo_employee_list.mname," ",olongapo_employee_list.lname) as employee_name')
                                                    ,'olongapo_subdepartment.dept_desc'
                                                    ,'supplier_info.title','supplier_info.id'
                                                )

                                        ;

        return $ppe_mnthly;
    }
}