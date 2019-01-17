<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Modules\BAC\Entities\PurchasePPMPApproval;
use Modules\PurchaseRequest\Entities\PurchaseItems;
use Modules\PurchaseRequest\Entities\PurchaseNo;
use Modules\BAC\Entities\PRPostInpection;
use Modules\BAC\Entities\PRPostInpectionItems;


class PRPostInspectionController extends Controller
{

    protected $data;
    protected $page_title = 'Purchase Request';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }


    public function index()
    {
        return view('bac::inspection.index',$this->setup());
    }

    public function create(Request $request)
    {
        $items = "";
        if($request->input('category_id') > 0)
        {
            $items = "required";
        }    
        $validator = Validator::make($request->all(),
                       [
                            'equimentmodel'             => 'required',
                            'modelplate'                => 'required',
                            'daterepair'                => 'required',
                            'post_inspection_report_no' => 'required',
                            'end_user'                  => 'required',
                            'name_address_repair_store' => 'required',
                            'date_inspection_report'    => 'required',
                            'date_lto_reg'              => 'required',
                            'date_acquired'             => 'required',
                            'items'                     => $items,
                        ],
                        [
                            'equimentmodel'               => 'Equipment model is required.' ,
                            'modelplate'                  => 'Model Plate is required.' ,
                            'daterepair'                  => 'Date of repair is required.' ,
                            'post_inspection_report_no'   => 'Post Inspection report number is required.' ,
                            'end_user'                    => 'End user is required.' ,
                            'name_address_repair_store'   => 'Name and adress of repair is required.' ,
                            'date_inspection_report'      => 'Date of inspection is required.' ,
                            'date_lto_reg'                => 'Date of LTO Registration is required.' ,
                            'date_acquired'               => 'Date acquired is required.' ,
                            'items'                       => 'Check at least one(1) item.' 
                        ]
                    );
                       

        if($validator->fails())
        {
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }
        else
        {
            $data['status'] = 1;
            $data['errors'] = 'NO Errors';
            if($request->input('post_inspection_id') > 0)
            {
                $inspection = PRPostInpection::find($request->input('post_inspection_id'));;
                $inspection->request_no_id = $request->input('pr_id');
                $inspection->equimentmodel = $request->input('equimentmodel');
                $inspection->modelplate = $request->input('modelplate');
                $inspection->daterepair = $request->input('daterepair');
                $inspection->post_inspection_report_no = $request->input('post_inspection_report_no');
                $inspection->end_user = $request->input('end_user');
                $inspection->name_address_repair_store = $request->input('name_address_repair_store');
                $inspection->date_inspection_report = $request->input('date_inspection_report');
                $inspection->date_lto_reg = $request->input('date_lto_reg');
                $inspection->date_acquired = $request->input('date_acquired');
                $inspection->save();

                for ($i=0; $i < count($request->input('items')); $i++) { 
                    $inspectionitems = new PRPostInpectionItems;
                    $inspectionitems->post_inspect_id = $inspection->id;
                    $inspectionitems->item_id = $request->input('items')[$i];
                    $inspectionitems->save();
                }
            }else{
                $inspection = new PRPostInpection;
                $inspection->request_no_id = $request->input('pr_id');
                $inspection->equimentmodel = $request->input('equimentmodel');
                $inspection->modelplate = $request->input('modelplate');
                $inspection->daterepair = $request->input('daterepair');
                $inspection->post_inspection_report_no = $request->input('post_inspection_report_no');
                $inspection->end_user = $request->input('end_user');
                $inspection->name_address_repair_store = $request->input('name_address_repair_store');
                $inspection->date_inspection_report = $request->input('date_inspection_report');
                $inspection->date_lto_reg = $request->input('date_lto_reg');
                $inspection->date_acquired = $request->input('date_acquired');
                $inspection->save();

                for ($i=0; $i < count($request->input('items')); $i++) { 
                    $inspectionitems = new PRPostInpectionItems;
                    $inspectionitems->post_inspect_id = $inspection->id;
                    $inspectionitems->item_id = $request->input('items')[$i];
                    $inspectionitems->save();
                }
            }
        }
        return $data;

    }

    public function show(Request $request)
    {
        $this->data['pr'] = PurchaseNo::find($request->input('pr_id'));
        $this->data['inspection'] = PRPostInpection::where('request_no_id', '=', $request->input('pr_id'))->first();
        $pi_ids = array();
        if($this->data['inspection']){
            $this->data['inspection_items'] = PRPostInpectionItems::where('post_inspect_id', '=', $this->data['inspection']->id)->get();
       
            for ($i=0; $i < count($this->data['inspection_items']); $i++) { 
                array_push($pi_ids,  $this->data['inspection_items'][$i]->item_id);
            }
        }
        $this->data['inspection_ids'] = $pi_ids;
        return view('bac::inspection.edit',$this->setup());
    }

    public function destroy(Request $request)
    {
        $data = PRPostInpectionItems::where('post_inspect_id', '=', $request->input('inspct_id'))->where('item_id', '=', $request->input('pr_id'))->first();
        $data->delete();
        return $data;
    }

    public function report(Request $request)
    {
        $this->data['inspection'] = PRPostInpection::where('id', '=', $request->input('inspct_id'))->first();
        $this->data['pr'] = PurchaseNo::find($this->data['inspection']->request_no_id);
        $this->data['inspection_items'] = PRPostInpectionItems::where('post_inspect_id', '=', $this->data['inspection']->id)->get();
        $pi_ids = array();
   
        for ($i=0; $i < count($this->data['inspection_items']); $i++) { 
            array_push($pi_ids,  $this->data['inspection_items'][$i]->item_id);
        }
        $this->data['inspection_ids'] = $pi_ids;
        
        $pdf = PDF::loadView('bac::inspection.pdf',$this->setup());
        $pdf->setPaper('Legal', 'landscape');
        return @$pdf->stream();
    }


}
