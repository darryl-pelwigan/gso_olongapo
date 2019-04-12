<?php

namespace Modules\BAC\Http\Controllers;

use Modules\Setup\Init;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\BAC\Entities\Positions;
use Modules\BAC\Entities\AwardsCommittee as AC;
use Modules\BAC\Entities\AwardsCommitteeApprovedBy  as approvedby;
use Modules\BAC\Entities\AwardsCommitteeAttestedBy   as atestedby;
class BACawardscomitteeController extends Controller
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

    public function awards_committee()
    {
        $this->data['committee'] = db::table('olongapo_bac_awards_committee')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee.id as comm_id','olongapo_bac_awards_committee.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee.deleted_at','=',null)
                                        ->where('department', '=','Bids and Awards Committee')
                                        ->get();

        $this->data['approved_by'] = db::table('olongapo_bac_awards_committee_approved_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_approved_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_approved_by.id as comm_id','olongapo_bac_awards_committee_approved_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_approved_by.deleted_at','=',null)
                                        ->where('department', '=','Bids and Awards Committee')
                                        ->get();

        $this->data['attested_by'] = db::table('olongapo_bac_awards_committee_attested_by')
                                        ->join('olongapo_position','olongapo_position.id','=','olongapo_bac_awards_committee_attested_by.employee_bacposition')
                                        ->select([
                                                    'olongapo_position.title',
                                                    'olongapo_bac_awards_committee_attested_by.id as comm_id','olongapo_bac_awards_committee_attested_by.employee_name'
                                                ])
                                        ->where('olongapo_bac_awards_committee_attested_by.deleted_at','=',null)
                                        ->where('department', '=','Bids and Awards Committee')
                                        ->get();

        return view('bac::bac-templates.bids_awards_committee',$this->setup());
    }

    public function set_awards_committee(Request $request){
        $validator = Validator::make($request->all(),
            [
                'employee_name'              => 'required',
                'employee_id'              => 'required|exists:olongapo_employee_list,id',
                'employee_position'              => 'required',


            ],
            [
                   'employee_name.required'          => 'Employee name is required',
                   'employee_id.required'          => 'Employee name is required',
                   'employee_id.exist'          => 'Employee name is required',
                   'employee_position.required'          => 'Employee Position is required',
            ]);

        if($validator->fails()){
            $data['status'] = 0;
            $data['errors'] = $validator->messages();
        }else{
            $data['status'] = 1;
            $data['errors'] = 'NO Errors';
            if($request->input('type_process')=='addCommittee'){
                $this->save_bac_committee($request);
            }elseif($request->input('type_process')=='addApprovedBy'){
                $this->save_bac_committee_approvedby($request);
            }elseif($request->input('type_process')=='addAttestedBy'){
                $this->save_bac_committee_attestedby($request);
            }else{
                $data['status'] = 0;
                $data['errors'] = 'Please refresh and try again';
            }
        }
        return $data;
    }

    public function save_bac_committee($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;

         $ac = new AC;
        if($request->input('committe_update')){
            $ac =  AC::find($request->input('committe_update'));
        }

        $ac->employee_id = $request->input('employee_id');
        $ac->employee_name = $request->input('employee_name');
        $ac->employee_bacposition = $this->add_position($request);
        $ac->department = $data;
        $ac->save();

    }

    public function save_bac_committee_approvedby($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;

        $aa = new approvedby;
        if($request->input('committe_update')){
            $aa =  approvedby::find($request->input('committe_update'));
        }

        $aa->employee_id = $request->input('employee_id');
        $aa->employee_name = $request->input('employee_name');
        $aa->employee_bacposition = $this->add_position($request);
        $aa->department = $data;
        $aa->save();
    }

    public function save_bac_committee_attestedby($request){
        $data =  $request->session()->get(config('app.projcode').'_user')->ucrd_realname;

        $at = new atestedby;
        if($request->input('committe_update')){
            $ac =  atestedby::find($request->input('committe_update'));
        }

        $at->employee_id = $request->input('employee_id');
        $at->employee_name = $request->input('employee_name');
        $at->employee_bacposition = $this->add_position($request);
        $at->department = $data;
        $at->save();
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

    public function rm_awards_committee(Request $request){
        $AC = AC::find($request['committee_id']);

        if($AC->count()>0){
            return json_encode($AC->delete());
        }
        return null;
    }

    public function rm_attested_by_committee(Request $request){
        $atestedby = atestedby::find($request['attested_by']);
        if($atestedby->count()>0){
            return json_encode($atestedby->delete());
        }
        return null;

    }

    public function rm_approved_by_committee(Request $request){
        $approvedby = approvedby::find($request['approved_by']);
        if($approvedby->count()>0){
           return json_encode($approvedby->delete());
        }
        return null;

    }

}
