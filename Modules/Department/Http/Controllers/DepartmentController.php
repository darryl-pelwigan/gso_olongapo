<?php

namespace Modules\Department\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\BAC\Entities\PurchasePPMPApproval;
use Modules\BAC\Entities\BacControlInfo;
use Modules\Abstrct\Entities\Abstrct;
use Modules\PurchaseOrder\Entities\PurchaseOrderNo;

use Modules\Administrator\Entities\DEPTsubcode;


class DepartmentController extends Controller
{
    protected $data;
    protected $page_title = 'Login';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        $this->data['templatex'] = DB::table('olongapo_bac_template')->select('id','template_desc','code')->get();

        $employee_id = Session::get('olongapo_user')->employee_id;




        $query = DB::table('olongapo_employee_list')
                    ->select('olongapo_employee_list.dept_id')
                    ->where('id', '=', $employee_id)
                    ->get();

        $dept_id = $query[0]->dept_id;

        $uploads =  DB::table('olongapo_purchase_item_ppmp_upload')
                        ->where('olongapo_purchase_item_ppmp_upload.subdept_id', '=', $dept_id)
                        ->where('olongapo_purchase_item_ppmp_upload.deleted_at', '=', null)
                        ->get();
        $this->data['uploads'] = $uploads;

        $this->data['pr'] = PurchaseNo::where('dept_id', '=', session::get('olongapo_emp_depts')->dept_id)->orderBy('id', 'desc')->get();

        $status[] = "";

        foreach($this->data['pr'] as $key=>$data)
        {
            $request_id = $data->id;
            ##ppmp approval
            $ppmp = PurchasePPMPApproval::where('request_no_id', '=', $request_id)->first();

            ##po_number
            $abstract = Abstrct::where('prno_id', '=', $request_id)->first();

            ##abstract
            $bac = BacControlInfo::where('prno_id', '=', $request_id)->first();

            ##po_number
            $po = PurchaseOrderNo::where('prno_id', '=', $request_id)->first();
            $status[$key] =
                array(
                    'ppmp' => $ppmp,
                    'abstract'      => $abstract,
                    'bac'           => $bac,
                    'po_no'         => $po
                );
        }
        $this->data['status'] = $status;

        $this->data['department'] = DEPTsubcode::all();

        $this->data['employee'] = DB::table('olongapo_employee_list')->select('id','fname','mname','lname')->get();

        return view('department::purchase_request.index',$this->setup());
    }


}
