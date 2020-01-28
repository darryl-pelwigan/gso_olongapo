<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Modules\Administrator\Entities\Holiday;
use Modules\GSOassistant\Entities\Procmethod;
use Modules\BAC\Entities\BacControlInfo;
use Modules\BAC\Entities\bacCategory;
use Modules\BAC\Entities\SourceOfFund;



class BACPRlistController extends Controller
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
        $holiday = Holiday::all();

        $this->data['holiday'] = $holiday;
        $this->data['procurement'] = Procmethod::all();
        return view('bac::bac-pr.pr-list',$this->setup());
    }

    public function set_bac_control_no(Request $request){
        $bac_date = $request->input('bac_date') ;
        $bac_contno = DB::table('olongapo_bac_control_info')
                                    ->select(DB::raw('LPAD(COUNT(id),2,"0") as counter'))
                                    ->where('bac_date','=',$bac_date)
                                    ->get();

        $bac_date = new Carbon($bac_date);
        $control_no = $bac_date->format('y').'-'.$bac_date->format('m').$bac_contno[0]->counter.$bac_date->format('d').'-'.$request->input('pr_dept_code');
        return json_encode($control_no);
    }

    public function get_sof(Request $request){
        $check_data = DB::table('olongapo_bac_source_fund as sof')
                                    ->select(['sof.id AS data','sof.description AS value'])
                                    ->where('sof.description','like','%'.$request->input('query').'%')
                                    ->orderby('sof.description','ASC')
                                    ->limit(15)
                                    ->get();


        $result = array_merge($check_data->all());
        $data['suggestions'] = array();
        foreach($result as $key => $value){
            $data['suggestions'][$key] = array();
            foreach ($value as $keyx => $valuex) {
                $data['suggestions'][$key][$keyx] = "$valuex";
            }
        }
        return $data;
    }
    public function process_pr(Request $request){

        $validator = Validator::make($request->all(), [
            'bac_control_no'    => 'required',
            'bac_date'       => 'required|date',
            'total_amount'   => 'required',
            'sof_id'   => 'required',
            'bac_categ_id.*'   => 'required',
            'bac_reso_type.*'   => 'required'
        ],
        [
            'bac_control_no.required'   => 'BAC CONTROL NUMBER IS REQUIRED',
            'bac_date.required'      => 'BAC DATE IS REQUIRED',
            'total_amount.required'  => 'TOTAL AMOUNT IS REQUIRED',
            'sof_id.required'  => 'SOURCE OF FUND IS REQUIRED',
            'bac_categ_id.required'  => 'BAC CATEGORY IS REQUIRED',
            'bac_reso_type.required'  => 'BAC RESOLUTION TYPE IS REQUIRED',        
        ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();

        }else{

            $controlno = $request->input('bac_control_no');
            $prno_id = $request->input('prno_id'); 
            $bac_date = $request->input('bac_date');
            $amount = $request->input('total_amount');
            $sourcefund = $request->input('sof_id');
            $category = $request->input('bac_categ_id');
            $apprved_abstract = $request->input('supplier_approved_id');
            $bac_type_id= $request->input('bac_reso_type');
            $remarks = $request->input('bac_remarks');
            
            if($request->input('bac_control_id') > 0){
                $controlinfo = BacControlInfo::find($request->input('bac_control_id'));
            }else{
                $controlinfo = new BacControlInfo;
            }
            
            $controlinfo->bac_control_no = $controlno;
            $controlinfo->prno_id = $prno_id;
            $controlinfo->bac_date = $bac_date;
            $controlinfo->amount = $amount;
            $controlinfo->sourcefund_id = $sourcefund;
            $controlinfo->category_id = $category;
            $controlinfo->apprved_pubbid_id = $apprved_abstract;
            $controlinfo->bac_type_id = $bac_type_id;
            $controlinfo->remarks = $remarks;
            $controlinfo->save();

            $data['status'] = 1;
            $data['errors'] = 'Successfully save control info.';
        }
        return $data;

    }
    
    public function destroy(Request $request)
    {
        $data = DB::table('olongapo_bac_control_info')->where('id','=', $request->input('control_id'))->delete();
        return $data;
    }

    

}
