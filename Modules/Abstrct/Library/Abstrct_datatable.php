<?php

namespace Modules\Abstrct\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class Abstrct_datatable
{


    public function pr_list($vars = null){
        $items = DB::table('olongapo_purchase_request_items')
                ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.prno_id','=','olongapo_purchase_request_items.prno_id')
                ->leftjoin('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_purchase_request_items.prno_id')
                ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty',
                        'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_count as prno_count','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.pr_purelyconsumption',
                        'olongapo_department.dept_code',
                        'olongapo_subdepartment.subdept_code',
                        ])
                ->where('olongapo_purchase_request_items.deleted_at','=',NULL)
                ->where('olongapo_bac_control_info.id','=',null)
                ->where('olongapo_absctrct.id','=',null)
                ->where('olongapo_purchase_request_no.pr_no', '!=', null)
                ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','0')
                ->groupBy('olongapo_purchase_request_items.prno_id');

        return $items;
    }

        public function abstrct_list($vars = null){
        $items = DB::table('olongapo_absctrct')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_absctrct.prno_id')
                            ->select([
                                        'olongapo_absctrct.id as abstrct_id',
                                        'olongapo_absctrct.control_no',
                                        'olongapo_absctrct.abstrct_date',
                                        'olongapo_purchase_request_no.pr_no',
                                        'olongapo_purchase_request_no.id as prno_id',
                                        'olongapo_purchase_request_no.obr_id',
                                        'olongapo_purchase_request_no.pr_date'
                                    ])
                            ;

        return $items;
    }


}


