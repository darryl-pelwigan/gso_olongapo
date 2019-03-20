<?php

namespace Modules\Bac\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class Bac_datatable
{

    /*BAC list */


    public function bac_list($vars = null){
        $items = DB::table('olongapo_bac_control_info')
                            ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                            ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                            ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                            ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                            ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                            ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                            ->join('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                            ->leftjoin('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                            ->select([
                                        'supplier_info.title as sup_title',
                                        'olongapo_bac_category.description as categ_desc',
                                        'olongapo_bac_source_fund.description as sof_desc',
                                        'olongapo_subdepartment.dept_desc',
                                        'olongapo_absctrct.id as abstrct_id','olongapo_absctrct.control_no','olongapo_absctrct.abstrct_date',
                                        'olongapo_purchase_request_no.id as prno_id','olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.obr_id','olongapo_purchase_request_no.pr_date',
                                        'olongapo_bac_control_info.id as bac_id' ,'olongapo_bac_control_info.bac_control_no as bac_cono' , 'olongapo_bac_control_info.amount' , 'olongapo_bac_control_info.bac_date' , 'olongapo_bac_control_info.sourcefund_id' , 'olongapo_bac_control_info.category_id', 'olongapo_bac_control_info.bac_type_id' , 'olongapo_bac_control_info.apprved_pubbid_id'
                                    ])
                            ;

            return $items;
    }

    /*BAC list PO */


    public function bac_list_po($vars = null){
        $items = DB::table('olongapo_purchase_order_no')
                ->join('olongapo_bac_control_info' , 'olongapo_purchase_order_no.bac_control_id','=','olongapo_bac_control_info.id')
                ->join('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                ->join('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                ->join('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pr_no','=','olongapo_bac_control_info.prno_id')
                ->join('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_absctrct_pubbid_apprved.pubbid')
                ->join('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                ->join('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                ->leftjoin('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                ->leftjoin('olongapo_purchase_order_requisition_number' , 'olongapo_purchase_order_requisition_number.pono_id','=','olongapo_purchase_order_no.id')
                ->leftjoin('olongapo_purchase_order_acceptance_issuance' , 'olongapo_purchase_order_acceptance_issuance.pono_id','=','olongapo_purchase_order_no.id')
                ->select([
                            'olongapo_purchase_order_no.id as pono_id',
                            'olongapo_purchase_order_no.po_no',
                            'olongapo_purchase_order_no.po_date',
                            'supplier_info.title as sup_title',
                            'olongapo_bac_category.description as categ_desc',
                            'olongapo_bac_source_fund.description as sof_desc',
                            'olongapo_subdepartment.dept_desc',
                            'olongapo_absctrct.id as abstrct_id',
                            'olongapo_absctrct.control_no','olongapo_absctrct.abstrct_date',
                            'olongapo_purchase_request_no.id as prno_id',
                            'olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.obr_id','olongapo_purchase_request_no.pr_date',
                            'olongapo_bac_control_info.id as bac_id' ,'olongapo_bac_control_info.bac_control_no as bac_cono' , 'olongapo_bac_control_info.amount' , 'olongapo_bac_control_info.bac_date' , 'olongapo_bac_control_info.sourcefund_id' , 'olongapo_bac_control_info.category_id', 'olongapo_bac_control_info.bac_type_id' , 'olongapo_bac_control_info.apprved_pubbid_id',
                            'olongapo_obr.obr_no','olongapo_obr.obr_date','olongapo_purchase_order_requisition_number.id as requisition_id','olongapo_purchase_order_acceptance_issuance.id as acceptance_id'
                ])
                ->groupBy('olongapo_purchase_order_no.id');

        return $items;
    }

        public function bac_list_po_pc($vars = null){
        $items = DB::table('olongapo_purchase_request_no')
                ->join('olongapo_purchase_request_ppmp_approval' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_ppmp_approval.request_no_id')
                ->join('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                ->leftjoin('olongapo_purchase_order_requisition_number' , 'olongapo_purchase_order_requisition_number.pono_id','=','olongapo_purchase_request_no.id')
                ->select([
                            'olongapo_purchase_request_no.id as prno_id',
                            'olongapo_subdepartment.dept_desc',
                            'olongapo_purchase_request_no.pr_date',
                            'olongapo_purchase_order_requisition_number.id as requisition_id'
                ])
                ->where('olongapo_purchase_request_no.pr_purelyconsumption','=','1')
                ->where('olongapo_purchase_request_ppmp_approval.status','=','1')
                ->groupBy('olongapo_purchase_request_no.id');
        return $items;
    }

    public function bac_list_no_po($vars = null){
        $items = DB::table('olongapo_bac_control_info')
                            ->leftjoin('olongapo_purchase_request_no' ,'olongapo_bac_control_info.prno_id','=', 'olongapo_purchase_request_no.id')
                            ->leftjoin('olongapo_subdepartment','olongapo_subdepartment.id','=','olongapo_purchase_request_no.dept_id')
                            ->leftjoin('olongapo_bac_source_fund','olongapo_bac_source_fund.id','=','olongapo_bac_control_info.sourcefund_id')
                            ->leftjoin('olongapo_absctrct_pubbid','olongapo_absctrct_pubbid.id','=','olongapo_bac_control_info.apprved_pubbid_id')
                            ->leftjoin('olongapo_absctrct_pubbid_apprved','olongapo_absctrct_pubbid_apprved.pubbid','=','olongapo_absctrct_pubbid.id')
                            ->leftjoin('supplier_info','supplier_info.id','=','olongapo_absctrct_pubbid.supplier_id')
                            ->leftjoin('olongapo_bac_category','olongapo_bac_category.id','=','olongapo_bac_control_info.category_id')
                            ->leftjoin('olongapo_absctrct' , 'olongapo_absctrct.prno_id','=','olongapo_bac_control_info.prno_id')
                            ->leftjoin('olongapo_purchase_order_no' , 'olongapo_purchase_order_no.bac_control_id','=','olongapo_bac_control_info.id')
                            ->select([
                                        'supplier_info.title as sup_title',
                                        'olongapo_bac_category.description as categ_desc',
                                        'olongapo_bac_source_fund.description as sof_desc',
                                        'olongapo_subdepartment.dept_desc',
                                        'olongapo_absctrct.id as abstrct_id',
                                        'olongapo_absctrct.control_no',
                                        'olongapo_absctrct.abstrct_date',
                                        'olongapo_purchase_request_no.id as prno_id',
                                        'olongapo_purchase_request_no.pr_no',
                                        'olongapo_purchase_request_no.obr_id',
                                        'olongapo_purchase_request_no.pr_date',
                                        'olongapo_bac_control_info.id as bac_id',
                                        'olongapo_bac_control_info.bac_control_no as bac_cono' ,
                                        'olongapo_bac_control_info.amount',
                                        'olongapo_bac_control_info.bac_date',
                                        'olongapo_bac_control_info.sourcefund_id',
                                        'olongapo_bac_control_info.category_id',
                                        'olongapo_bac_control_info.bac_type_id',
                                        'olongapo_absctrct_pubbid.supplier_id'
                                    ])
                            ->where('olongapo_purchase_order_no.bac_control_id','=',null)
                            ->groupBy('olongapo_absctrct_pubbid_apprved.pubbid');
            return $items;
    }

    /*BAC template */

    public function bac_templates($vars = null){
        $bac_template = DB::table('olongapo_bac_template')
                                    // ->join('olongapo_bac_type','olongapo_bac_type.id','=','olongapo_bac_template.type')
                                    ->select(
                                                // 'olongapo_bac_type.description as type_desc','olongapo_bac_type.id as type_id',
                                                'olongapo_bac_template.id as  templ_id','olongapo_bac_template.template_desc as  templ_desc','olongapo_bac_template.code as  templ_code','olongapo_bac_template.updated_at as  templ_date');
        return $bac_template;
    }

    public function pr_list($vars = null){
         $items = DB::table('olongapo_purchase_request_items')

                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_purchase_request_items.prno_id')
                            ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                            ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                            ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.prno_id','=','olongapo_purchase_request_items.prno_id')
                            ->leftjoin('olongapo_obr' , 'olongapo_obr.id','=','olongapo_purchase_request_no.obr_id')
                            ->select(['olongapo_purchase_request_items.id as item_id', 'olongapo_purchase_request_items.description', 'olongapo_purchase_request_items.remarks', 'olongapo_purchase_request_items.unit', 'olongapo_purchase_request_items.qty',
                                    'olongapo_purchase_request_no.id as prno_id', 'olongapo_purchase_request_no.dept_id as prno_dept', 'olongapo_purchase_request_no.pr_date as prno_date', 'olongapo_purchase_request_no.pr_no as prno_count',
                                    'olongapo_department.dept_code',
                                    'olongapo_department.dept_desc',
                                    'olongapo_subdepartment.subdept_code',
                                    'olongapo_subdepartment.dept_desc',
                                    'olongapo_bac_control_info.id as control_id'
                                    ]);
                            // ->where('olongapo_bac_control_info.id','=',null);
        return $items;
    }


    public function category_list($vars = null){
        $items = DB::table('olongapo_bac_category');

        return $items;
    }

    public function sof_list($vars = null){
        $items = DB::table('olongapo_bac_source_fund');

        return $items;
    }


    public function abstrct_list($vars = null){
        $items = DB::table('olongapo_absctrct')
                            ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_absctrct.prno_id')
                            ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.prno_id','=','olongapo_absctrct.prno_id')
                            ->select([
                                        'olongapo_absctrct.id as abstrct_id','olongapo_absctrct.control_no','olongapo_absctrct.abstrct_date',
                                        'olongapo_purchase_request_no.pr_no','olongapo_purchase_request_no.obr_id','olongapo_purchase_request_no.pr_date'
                                    ])
                            ->where('olongapo_bac_control_info.id','=',null);

        return $items;
    }

    public function supplier_list($vars = null){
          $supplier_info = DB::table('supplier_info')
                            ->leftjoin('supplier_address','supplier_address.supplier_id','=','supplier_info.id')
                            ->select([
                                    'supplier_info.*' , 'supplier_address.details'
                                ])
                            ->where('supplier_info.deleted_at', '=', null)
                        ;

        return $supplier_info;
    }


    public function bac_pr_list($vars = null){
        $items = DB::table('olongapo_absctrct')
                    ->join('olongapo_purchase_request_no' , 'olongapo_purchase_request_no.id','=','olongapo_absctrct.prno_id')
                    ->join('olongapo_subdepartment' , 'olongapo_purchase_request_no.dept_id','=','olongapo_subdepartment.id')
                    ->join('olongapo_department' , 'olongapo_department.id','=','olongapo_subdepartment.dept_id')
                    ->join('olongapo_absctrct_pubbid', 'olongapo_absctrct_pubbid.abstrct_id', '=', 'olongapo_absctrct.id')
                    ->join('olongapo_absctrct_pubbid_apprved', 'olongapo_absctrct_pubbid_apprved.pubbid', '=', 'olongapo_absctrct_pubbid.id')
                    ->leftjoin('olongapo_bac_control_info' , 'olongapo_bac_control_info.apprved_pubbid_id','=','olongapo_absctrct_pubbid.id')
                    ->leftjoin('supplier_info', 'supplier_info.id', '=', 'olongapo_absctrct_pubbid.supplier_id')
                    ->select([
                        'olongapo_absctrct.id',
                        'olongapo_absctrct.control_no',
                        'olongapo_absctrct.abstrct_date',
                        'olongapo_purchase_request_no.pr_no',
                        'olongapo_purchase_request_no.obr_id',
                        'olongapo_purchase_request_no.pr_date',
                        'olongapo_department.dept_code',
                        'olongapo_department.dept_desc',
                        'olongapo_subdepartment.subdept_code',
                        'olongapo_subdepartment.dept_desc as subdept_desc',
                        'olongapo_bac_control_info.id as control_id',
                        'supplier_info.title',
                        'olongapo_absctrct_pubbid.id as abstrct_id',
                        'olongapo_bac_control_info.apprved_pubbid_id'
                    ])
                    ->groupBy('olongapo_absctrct_pubbid_apprved.pubbid');

        return $items;
    }

}


