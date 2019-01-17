<?php

namespace Modules\GSOassistant\Library;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Modules\GSOassistant\Entities\Requestordersignee;
/**
*   Class : ApplicantDatatables
*   methods : applicants datatables
*/
class GsoDatatable
{

    /*BAC template */

    public function gso_templates($vars = null){
        $gso_template = DB::table('olongapo_gso_template')
                        ->select('olongapo_gso_template.id as  templ_id','olongapo_gso_template.template_desc as  templ_desc','olongapo_gso_template.code as  templ_code','olongapo_gso_template.updated_at as  templ_date');
        return $gso_template;
    }

        public function dept_userlist($vars = null){
         $emp_list = DB::table('olongapo_user_credentials')
                            ->join('olongapo_employee_list' , 'olongapo_user_credentials.employee_id','=','olongapo_employee_list.id')
                            ->join('olongapo_subdepartment' , 'olongapo_subdepartment.id','=','olongapo_employee_list.dept_id')
                            ->join('olongapo_position' , 'olongapo_position.id','=','olongapo_employee_list.position_id','left outer')
                            ->select(['olongapo_employee_list.id', 'olongapo_employee_list.fname', 'olongapo_employee_list.lname', 'olongapo_employee_list.mname', 'olongapo_employee_list.ename', 'olongapo_employee_list.mobile','olongapo_employee_list.sex','olongapo_employee_list.email',
                                    'olongapo_subdepartment.subdept_code','olongapo_subdepartment.dept_desc',
                                    'olongapo_position.title',
                                    'olongapo_user_credentials.ucrd_username',
                                    ])
                            ->where('olongapo_employee_list.deleted_at','=',null)
                          ;

                            return $emp_list;
    }


    public function gso_proc_methods(){
        $gso_proc_methods = DB::table('olongapo_procurement_method');             
        return $gso_proc_methods;
    }


    public function gso_signee(){
        $gso_signee = Requestordersignee::withTrashed()->get();      
        return $gso_signee;
    }


}


