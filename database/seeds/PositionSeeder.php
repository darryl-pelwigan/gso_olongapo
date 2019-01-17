<?php

use Illuminate\Database\Seeder;
use Modules\BAC\Entities\Positions;
class PositionSeeder extends Seeder
{
  /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $category = array(
                                'Chief of Hospital',
                                'Department Head',
                                'OIC-College President',
                                'City Vice Mayor',
                                'OIC-GSO',
                                'OIC-City Health Officer',
                                'Secretary to the Mayor',
                                'OIC-City Engineer',
                                'Marker Administrator',
                                'State Auditor IV-ATL',
                                'OIC-Schools Division Superintendent',
                                'City Auditor',
                                'Head-CPDO',
                                'OIC-OCCC',
                                'Asst. Gen. Manager/OIC-Technical Div.',
                                'OIC-PUD',
                                'Hospital Administrator',
                                'OIC-City Assessor',
                                'Presiding Judge',
                                'OIC-CSWDO',
                                'City Administrator',
                                'OIC-City Budget Office',
                                'OIC-Accounting Dept.',
                                'ICO-City Treasurer',
                                'City Registrar',
                                'City Prosecutor',
                                'Presiding & Vice-Executive Judge',
                                'Head-Business Permit',
                                'OIC-Philhealth',
                                'Head-OTMPS',
                                'OIC-Livelihood',
                                'Building Administrator',
                                'OIC-City Assessor',
                                'City Veterinarian',
                                'City Legal Officer',
                                'BAC Member-City Budget Officer',
                                'BAC Member-OIC-City Engineer',
                                'BAC Vice Chairman-City Administrator',
                                'BAC Member-OIC-General Service Office',
                                'BAC Chairman-City Legal Office',
                                'Head BAC Secretariat'


                            );



    public function run()
    {
        $this->set_position();
    }

    public function set_position(){
        $category = $this->category;
        $count = 1;
        for($x=0;$x<count($category);$x++){
            $dept_code = new Positions;
            $dept_code->title = $category[$x];
            $dept_code->save();
            $count++;
        }


    }

}
