<?php

use Illuminate\Database\Seeder;

class BAC_sof extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $list = array(
            'Representation Expenses',
            'Other Supplies and Materials Expenses',
            'Other Maintainance and Operating Expenses',
            'Office Supplies and Devices',
            'Motor Vehicles',
            'Furniture and Fixture'
        );

    public function run()
    {
        foreach ($this->list as $key => $value) {
            DB::table('olongapo_bac_source_fund')->insert(array(
                         [
                            'description' => $value
                        ],
                ));
        }

    }
}
