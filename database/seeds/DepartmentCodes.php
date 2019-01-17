<?php

use Illuminate\Database\Seeder;
use Modules\Administrator\Entities\DeptCodes;
use Modules\Administrator\Entities\DEPTsubcode;

class DepartmentCodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $category = array(
                                'City Accounting Department',
                                "City Administrator's Office",
                                "City Assessor's Office",
                                'City Budget Office',
                                'City Civil Registry Office',
                                "City Council's Office",
                                'City Engineering Department',
                                'City Agriculture Department',
                                'City Health Department',
                                'City Legal Office',
                                "City Mayor's Office - Admin",
                                'City Planning and Development Office',
                                'City Population Office' ,
                                "City Treasurer's Office ",
                                'Olongapo City Public Market EBB',
                                'James L. Gordon Avenue Market and Mall',
                                'City Veterinary Office',
                                'City Social Welfare and Development Office',
                                'Environmental Sanitation Management Office',
                                'General Services Office',
                                'Gordon College',
                                'James L. Gordon Memorial Hospital',
                                'N-PNP - Olongapo City Police Office',
                                'N-BFP Bureau of Fire Protection',
                                'N-COA Commission on Audit',
                                'N-COMELEC Commission On Election',
                                'N-DILG Department of Interior and Local Government',
                                "N-CPO City Prosecutor's Office",
                                'N-MTCC Municipal Trial Court in the City Branch 1 to 5',
                                'N-RTC Regional Trial Court 72 , 73',
                                'N-DEPED Department Of Education',
                            );


    protected $subcategory = array(
        array(
            'cat_id' => "City Administrator's Office",
            'items' => array(
                                'City Administrator - HRM Personnel Division',
                            )
            ),
        array(
            'cat_id' => "City Mayor's Office - Admin",
            'items' => array(
                        'CMO - Bids and Awards Committee / SBAC',
                        "CMO - Building Administrator's Office ",
                        'CMO - CSSU',
                        'CMO - Task Force',
                        'CMO - Internal Audit Unit',
                        'CMO - Public Library',
                        'CMO - Special Event',
                        'CMO - Beautification Parks and Plaza',
                        'CMO - Barangay Affairs Office',
                        'CMO - Business Permit Section',
                        'CMO - City Sport & Youth Development Office',
                        'CMO - City Dissaster Risk Reduction and Management Office',
                        'CMO - ID Section',
                        'CMO - Livelihood Coop and Devt Office',
                        'CMO - Manpower Devt & Skills Training Center',
                        'CMO - Management Information System',
                        'CMO - Olongapo City Museum',
                        'CMO - OSCA Senior Citizen',
                        'CMO - Office of Traffice Management and Public Safety',
                        'CMO - Public Affairs Office',
                        'CMO - Public Employment Service Office',
                        'CMO - PhilHealth Indigent Unit / Office',
                        'CMO - People Law Enforcement Board',
                        'CMO - Tourism and Convention Center',
                        'CMO - UBSP Reach Up'
            )
        ),
        array(
            'cat_id' => 'City Planning and Development Office',
            'items' => array(
                        'CPDO - Systematic Adjudication and Land Titling Project Office'
            )
        ),
        array(
            'cat_id' => 'City Social Welfare and Development Office',
            'items' => array(
                        'CSWDO - Center for Women',
                        'CSWDO - Center for Youth',
                        'CSWDO - Social Development Center',
                        'CSWDO - Persons with Disability Affairs Office'
            )
        )
    );


    public function run()
    {
        $this->set_deptcode();
        $this->set_sub_deptcode();
    }

    public function set_deptcode(){
        $category = $this->category;
        $count = 1;
        for($x=0;$x<count($category);$x++){
            $dept_code = new DeptCodes;
            $dept_code->dept_code = $count;
            $dept_code->dept_desc =  $category[$x];
            $dept_code->year = date('Y');
            $dept_code->save();
                $dept_subcode = new DEPTsubcode;
                $dept_subcode->dept_id  = $dept_code->id;
                $dept_subcode->subdept_code = 0;
                $dept_subcode->dept_desc = $category[$x];
                $dept_subcode->year = date('Y');
                $dept_subcode->save();
            $count++;
        }


    }

    public function set_sub_deptcode(){
        $category = $this->category;
        $subdeptcode =     $this->subcategory;
        for($x=0; $x<count($subdeptcode); $x++){

            for($y =0;$y<count($subdeptcode[$x]['items']); $y++){
                $dept = $this->get_count_subdept($subdeptcode[$x]['cat_id']);
                $dept_subcode = new DEPTsubcode;
                $dept_subcode->dept_id  = $dept[0]->id;
                $dept_subcode->subdept_code = $dept[0]->c_id;
                $dept_subcode->dept_desc = $subdeptcode[$x]['items'][$y];
                $dept_subcode->year = date('Y');
                $dept_subcode->save();
            }
        }

    }

    public function get_count_subdept($cat_desc){
         $dept = DB::table('olongapo_department')
                                            ->join('olongapo_subdepartment','olongapo_subdepartment.dept_id','=','olongapo_department.id')
                                            ->select(DB::raw('count(olongapo_subdepartment.id) as c_id,olongapo_department.id'))
                                            ->where('olongapo_department.dept_desc','=',$cat_desc)
                                            ->get();
                                            return $dept ;
    }


}
