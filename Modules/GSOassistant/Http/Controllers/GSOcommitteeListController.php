<?php

namespace Modules\GSOassistant\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\BAC\Entities\Positions;
use Modules\BAC\Entities\AwardsCommittee as gso_committee;
use Modules\BAC\Entities\AwardsCommitteeApprovedBy  as gso_approvedby;
use Modules\BAC\Entities\AwardsCommitteeAttestedBy   as gso_atestedby;

class GSOcommitteeListController extends Controller
{
    protected $data;
    protected $page_title = 'GSOassistant';

    function setup($vars = null)
    {
        $Init = new Init;
        $vars['page'] = $this->page_title;
        $this->data['template'] = $Init->setup($vars);
        return $this->data;
    }

     public function committee_list()
    {
        $this->data['committee'] = db::table('olongapo_bac_awards_committee')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee.id as comm_id','olongapo_bac_awards_committee.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee.deleted_at','=',null)
                                        ->where('department', '=','GSO Assistant Officer')
                                        ->get();

        $this->data['approved_by'] = db::table('olongapo_bac_awards_committee_approved_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_approved_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_approved_by.id as comm_id','olongapo_bac_awards_committee_approved_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_approved_by.deleted_at','=',null)
                                        ->where('department', '=','GSO Assistant Officer')
                                        ->get();

        $this->data['attested_by'] = db::table('olongapo_bac_awards_committee_attested_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_attested_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_attested_by.id as comm_id','olongapo_bac_awards_committee_attested_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_attested_by.deleted_at','=',null)
                                        ->where('department', '=','GSO Assistant Officer')
                                        ->get();

        return view('gsoassistant::gso_templates.gso_committee_list',$this->setup());
    }

     public function set_gso_committee(Request $request){

        $validator = Validator::make($request->all(),
            [
                'employee_name'              => 'required',
                'employee_id'              => 'required|exists:olongapo_employee_list,id',
                'employee_position'              => 'required',


            ],
            [
                   'employee_name.required'          => 'Employee name is required',
                   'employee_position.required'          => 'Employee Position is required',
            ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 1;
            $data['errors'] = 'NO Errors';
            if($request->input('type_process')=='addCommittee'){
                $this->save_gso_committee($request);
            }elseif($request->input('type_process')=='addApprovedBy'){
                $this->save_gso_committee_approvedby($request);
            }elseif($request->input('type_process')=='addAttestedBy'){
                $this->save_gso_committee_attestedby($request);
            }else{
                $data['status'] = 0;
                $data['errors'] = 'Please refresh and try again';
            }
        }
        return $data;
    }

    public function save_gso_committee($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;
        
        $ac = new gso_committee;
        if($request->input('committe_update')){
            $ac =  gso_committee::find($request->input('committe_update'));
        }

        $ac->employee_id = $request->input('employee_id');
        $ac->employee_name = $request->input('employee_name');
        $ac->employee_bacposition = $this->add_position($request);
        $ac->department = $data;
        $ac->save();

    }
    public function save_gso_committee_approvedby($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;

        $ac = new gso_approvedby;
        if($request->input('committe_update')){
            $ac =  gso_approvedby::find($request->input('committe_update'));
        }

        $ac->employee_id = $request->input('employee_id');
        $ac->employee_name = $request->input('employee_name');
        $ac->employee_bacposition = $this->add_position($request);
        $ac->department = $data;
        $ac->save();
    }

    public function save_gso_committee_attestedby($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;

        $ac = new gso_atestedby;
        if($request->input('committe_update')){
            $ac =  gso_atestedby::find($request->input('committe_update'));
        }

        $ac->employee_id = $request->input('employee_id');
        $ac->employee_name = $request->input('employee_name');
        $ac->employee_bacposition = $this->add_position($request);
        $ac->department = $data;
        $ac->save();
    }


    public function add_position($request){
        $position_id = $request->input('employee_position_id');
        if(!$position_id){
            $Positions = new Positions;
            $Positions->title = $request->input('employee_position');
            $Positions->save();
            $position_id = $Positions->id;
        }
        return $position_id;

    }

     public function rm_bac_committee(Request $request){
        $comm = gso_committee::find($request['committee_id']);

        if($comm->count()>0){
            return json_encode($comm->delete());
        }
        return null;
    }

    public function rm_attested_by_committee(Request $request){
        $atestedby = gso_atestedby::find($request['attested_by']);
        if($atestedby->count()>0){
            return json_encode($atestedby->delete());
        }
        return null;

    }

    public function rm_approved_by_committee(Request $request){
        $approvedby = gso_approvedby::find($request['approved_by']);
        if($approvedby->count()>0){
           return json_encode($approvedby->delete());
        }
        return null;

    }

/**Autocomplete**/
   public function get_employee_name(Request $request){
          $check_data = DB::table('olongapo_employee_list')
                                    ->leftjoin('olongapo_department','olongapo_department.id','=','olongapo_employee_list.dept_id')
                                    ->select(['olongapo_employee_list.id AS data',db::raw('CONCAT(olongapo_employee_list.fname," ",olongapo_employee_list.lname) AS value'),'olongapo_department.dept_desc'])
                                    ->where('olongapo_employee_list.fname','like','%'.$request->input('query').'%')
                                    ->orWhere('olongapo_employee_list.lname','like','%'.$request->input('query').'%')
                                    ->orderby('olongapo_employee_list.fname','ASC')
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


    public function a_get_position(Request $request){
        $check_data = DB::table('olongapo_position')
                                    ->select(['olongapo_position.id AS data','olongapo_position.title AS value'])
                                    ->where('olongapo_position.title','like','%'.$request->input('query').'%')
                                    ->orderby('olongapo_position.title','ASC')
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

}
