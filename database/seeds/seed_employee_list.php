<?php

use Illuminate\Database\Seeder;
use Modules\Administrator\Entities\DEPTsubcode;

class seed_employee_list extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed_emp();
    }

    public function seed_emp(){
        $faker = Faker\Factory::create();
        $sex = array('m','f');
        $limit = 300;
        for ($i = 1; $i <= $limit; $i++) {
             $sex_rnd = array_rand($sex,1);
             $dept_id = DEPTsubcode::inRandomOrder()->first();

           $emp_id = DB::table('olongapo_employee_list')->insert([
                'fname' => $faker->firstName,
                'mname' => $faker->firstNameFemale,
                'lname' => $faker->lastName,
                'ename' => null,
                'sex' => $sex[$sex_rnd],
                'dept_id' => $dept_id->id,
            ]);

        }
    }
}
