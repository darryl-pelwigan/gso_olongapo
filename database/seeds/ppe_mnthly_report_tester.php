<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ppe_mnthly_report_tester extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $ppe_mnthly =  DB::table('olongapo_ppe_mnthly_report')->insertGetId(
                array(
                    'date_log'=> Carbon::now(),
                    'inv_control_no' =>  'E-1601-018',
                    'type' => 'Equipement',
                    'department' => '3',
                    )
                );

       DB::table('olongapo_ppe_mnthly_report_items')->insert(array(
                    [
                        'ppe_mnthly_id'=> $ppe_mnthly,
                        'item_desc' =>  'Island',
                        'property_code' => '08.39 - 0018',
                        'po_no' => '15-1221-009',
                        'qty' => '1',
                        'unit_value' => '90000',
                        'total_value' => '90000',
                        'accountable_person' => '2',
                        'supplier' => '2',
                        'invoice' => '0638',
                    ],
                    [
                        'ppe_mnthly_id'=> $ppe_mnthly,
                        'item_desc' =>  '20 Fobter Xmas',
                        'property_code' => '08.35 - 0064',
                        'po_no' => '15-1221-010',
                        'qty' => '1',
                        'unit_value' => '87000',
                        'total_value' => '87000',
                        'accountable_person' => '2',
                        'supplier' => '2',
                        'invoice' => '0641',
                    ],
                    [
                        'ppe_mnthly_id'=> $ppe_mnthly,
                        'item_desc' =>  'Snow Flakes Made of Flan Bar',
                        'property_code' => '08.39 - 0019',
                        'po_no' => '15-1221-011',
                        'qty' => '100',
                        'unit_value' => '1850',
                        'total_value' => '185000',
                        'accountable_person' => '2',
                        'supplier' => '2',
                        'invoice' => '0640',
                    ]
                    )
                );


    }
}
