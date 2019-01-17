<?php

use Illuminate\Database\Seeder;
use Modules\Inventory\Entities\PPEitems;
class PropertyCodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected  $category =     array(
                                    'Land and Land Improvement',
                                    'Building',
                                    'Office Equipment, Furniture and Fixture',
                                    'Machinery & Equipment',
                                    'Transportation Equipment'
                            );

    public function run()
    {
        $this->set_category();
        $this->set_subcategory();
        $this->set_items();
    }

    public function set_category(){
        foreach ($this->category as $key => $value) {
            DB::table('inv_ppe_code_category')->insert(array(
                         [
                            'desc' => $value
                        ],
                ));
        }
    }

    public function set_subcategory(){
        $category = $this->category;
        $subcategory =     array(
                                                array(
                                                        'ppe_cat_id' => $category[0],
                                                        'sub_cat' => array(
                                                                array(
                                                                        'desc' => 'Land',
                                                                        'code_coa' => '201',
                                                                        'code_family' => '1'
                                                                    ),
                                                            )
                                                    ),
                                                array(
                                                        'ppe_cat_id' => $category[1],
                                                        'sub_cat' => array(
                                                                array(
                                                                        'desc' => 'Office Buildings',
                                                                        'code_coa' => '211',
                                                                        'code_family' => '2'
                                                                    ),
                                                                array(
                                                                        'desc' => 'School Buildings',
                                                                        'code_coa' => '212',
                                                                        'code_family' => '3'
                                                                    ),
                                                                array(
                                                                        'desc' => 'Hospitals and Health Centers',
                                                                        'code_coa' => '213',
                                                                        'code_family' => '4'
                                                                    ),
                                                                array(
                                                                        'desc' => 'Markets and Slaughterhouses',
                                                                        'code_coa' => '214',
                                                                        'code_family' => '5'
                                                                    ),
                                                                array(
                                                                        'desc' => 'Other Structures',
                                                                        'code_coa' => '215',
                                                                        'code_family' => '6'
                                                                    ),
                                                            )
                                                    ),
                                                array(
                                                        'ppe_cat_id' => $category[2],
                                                        'sub_cat' => array(
                                                                array(
                                                                        'desc' => 'Office Equipment',
                                                                        'code_coa' => '221',
                                                                        'code_family' => '7'
                                                                    ),
                                                                array(
                                                                        'desc' => 'Furniture & Fixtures',
                                                                        'code_coa' => '222',
                                                                        'code_family' => '8'
                                                                ),
                                                                array(
                                                                        'desc' => 'IT Equipment & Software',
                                                                        'code_coa' => '223',
                                                                        'code_family' => '9'
                                                                ),
                                                                array(
                                                                        'desc' => 'Library Books',
                                                                        'code_coa' => '224',
                                                                        'code_family' => '10'
                                                                )
                                                            )
                                                ),
                                                array(
                                                        'ppe_cat_id' => $category[3],
                                                        'sub_cat' =>array(
                                                                array(
                                                                        'desc' => 'Agricultural, Fishery & Forestry Equipment',
                                                                        'code_coa' => '227',
                                                                        'code_family' => '11'
                                                                ),
                                                                array(
                                                                        'desc' => 'Communication Equipment',
                                                                        'code_coa' => '229',
                                                                        'code_family' => '12'
                                                                ),
                                                                array(
                                                                        'desc' => 'Construction & Heavy Eqpt',
                                                                        'code_coa' => '230',
                                                                        'code_family' => '13'
                                                                ),
                                                                array(
                                                                        'desc' => 'Fire Fighting Equipment & Accessories',
                                                                        'code_coa' => '231',
                                                                        'code_family' => '14'
                                                                ),
                                                                array(
                                                                        'desc' => 'Hospital Equipment',
                                                                        'code_coa' => '232',
                                                                        'code_family' => '15'
                                                                ),
                                                                array(
                                                                        'desc' => 'Medical, Dental & Laboratory Equipment',
                                                                        'code_coa' => '233',
                                                                        'code_family' => '16'
                                                                ),
                                                                array(
                                                                        'desc' => 'Sports Equipment',
                                                                        'code_coa' => '235',
                                                                        'code_family' => '17'
                                                                ),
                                                                array(
                                                                        'desc' => 'Technical & Scientific Equipment',
                                                                        'code_coa' => '236',
                                                                        'code_family' => '18'
                                                                ),
                                                                array(
                                                                        'desc' => 'Other Machinery & Equipment',
                                                                        'code_coa' => '240',
                                                                        'code_family' => '19'
                                                                )
                                                        )
                                                ),
                                                array(
                                                        'ppe_cat_id' => $category[4],
                                                        'sub_cat' => array(
                                                                array(
                                                                        'desc' => 'Moto Vehicles',
                                                                        'code_coa' => '241',
                                                                        'code_family' => '20'
                                                                ),
                                                                array(
                                                                        'desc' => 'Watercrafts',
                                                                        'code_coa' => '244',
                                                                        'code_family' => '21'
                                                                ),
                                                                array(
                                                                        'desc' => 'Other Transportation Equipment',
                                                                        'code_coa' => '',
                                                                        'code_family' => '22'
                                                                ),
                                                                array(
                                                                        'desc' => 'Aircraft',
                                                                        'code_coa' => '248',
                                                                        'code_family' => '23'
                                                                )
                                                        )
                                                )
                                        );
         for ($x = 0 ; $x<count($subcategory); $x++) {
          for($y = 0 ; $y<count($subcategory[$x]['sub_cat']); $y++){
            $subcategory[$x]['sub_cat'][$y]['ppe_cat_id'] = $this->get_category($subcategory[$x]['ppe_cat_id']);
            $data[$x][$y] = ($subcategory[$x]['sub_cat'][$y]);
            DB::table('inv_ppe_code_subcategory')->insert($subcategory[$x]['sub_cat'][$y]);
          }
        }
    }

    public function set_items(){

        $items = array(
                       array(
                            'ppe_subcat_id' => 'Land',
                            'items'         => array(
                                                   'Land',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'Office Buildings',
                            'items'         => array(
                                                    'Office Building',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'School Buildings',
                            'items'         => array(
                                                    'School Building',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'Hospitals and Health Centers',
                            'items'         => array(
                                                    'Hospital and Health Center',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'Markets and Slaughterhouses',
                            'items'         => array(
                                                    'Market and Slaughterhouse',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'Other Structures',
                            'items'         => array(
                                                    'Office Building',
                                    )
                            ),
                        array(
                            'ppe_subcat_id' => 'Office Equipment',
                            'items'         => array(
                                                    'Adding Machine','Check Writer',
                                                    'Clock','Copy machine',
                                                    'Dry seal', 'Paper Cutter',
                                                    'Electric Fan', 'ID Puncher',
                                                    'Lamination machine', 'Mimeographing/Photo offset',
                                                    'Money counter/Money Detector', 'Paper Shredder',
                                                    'Projector', 'Safety Vault',
                                                    'Stamp/Numbering Machine', 'Typewriters/Wheelwriter',
                                                    'Projector Screen', 'Air conditioner',
                                                    'Refrigerator/Freezer', 'Bundy Clock',
                                                    'Video/Digital Camera', 'Tripod',
                                                    'Stencil Duplicator', 'Fingerprint Machine',
                                                    'Voice Recorder','Cash Box',
                                                    'Air Condenser', 'Video Mixer',
                                                    'Power Adaptor', 'Barcode Reader',
                                                    'Signature Pag Replacement'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Furniture & Fixtures',
                            'items'         => array(
                                                    'Bench', 'Filing Cabinet', 'Chair', 'Chandelier',
                                                    'Coffee/Dining table/Canteen table', 'Griller', 'Divider', 'DVD',
                                                    'Faucet/Sink/Hand Dryer', 'Cabinet', 'Head phone', 'Heater',
                                                    'Iron/Iron board', 'Karaoke', 'Kitchen Furniture/Equipment', 'Lamp',
                                                    'Locker', 'Mannequin', 'Musical instrument', 'Painting/Picture/Portrait',
                                                    'Frame', 'Podium', 'Rack/Dough bin', 'Sweing machine',
                                                    'Shelf', 'Sofat Set/Sala set', 'Table', 'Thermos/Airpot',
                                                    'Venetian blind/curtains', 'Washing machine/dryer', 'Water dispenser', 'Water purifier',
                                                    'Wardrobe, Cabinet', 'Cassette/Component', 'Decorative material/Map', 'Television',
                                                    'Gavel', 'Spotlight', 'Lanters', 'Drawer'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'IT Equipment & Software',
                            'items'         => array(
                                                    'AVR/Regulator', 'Cable Tester', 'Computer Set',
                                                    'Computer Monitor', 'Computer table', 'Hub',
                                                    'Printer', 'Robotics', 'Scanner', 'Server',
                                                    'Software', 'UPS', 'CPU & Parts', 'Laptop',
                                                    'Language Lab System', 'Console Kinetic', 'Circuit Logic Tester',
                                                    'Pentrack/Tablet', 'Laptop Battery', 'External HD', 'Power bank'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Library Books',
                            'items'         => array(
                                                    'Books'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Agricultural, Fishery & Forestry Equipment',
                            'items'         => array(
                                                    'Garden Equipment', 'Grass cutter', 'Lawn mower',
                                                    'Shovel', 'Tree Prunner', 'Water Gear', 'Wheelbarrow',
                                                    'Rake'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Communication Equipment',
                            'items'         => array(
                                                    'Cell phone', 'Fax machine', 'Telephone/Telephone Accessories',
                                                    'Antenna', 'Base radio', 'Charger', 'GPS',
                                                    'Intercom', 'Light tower', 'Megaphone', 'Microphone/Microphone Stand',
                                                    'Pagin/PA System', 'Repeater', 'Sound System', 'Speaker', 'Switch board',
                                                    'Transceiver', 'Surveillance Camera'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Construction & Heavy Eqpt',
                            'items'         => array(
                                                    'Cargo Carrier', 'Construction Vehicle', 'Payloader',
                                                    'Truck', 'Dredging Machine', 'Trailer', 'Compactor',
                                                    'Pulverizer', 'Bulldozer', 'Water Truck'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Fire Fighting Equipment & Accessories',
                            'items'         => array(
                                                    'Axe', 'Flame redundant', 'Fire Alarm', 'Fire extinguisher',
                                                    'Fire hose', 'Fire Safety Protection', 'Ladder', 'Nozzle/Nozzle Accessories',
                                                    'Signage', 'Pink Poles', 'Rescue Equipment', 'Revolving light',
                                                    'Safety harness', 'Siren/Car blinker', 'Tow Reel w/ fire launch',
                                                    'Fire hose hood', 'Container', 'Bridge of hose', 'Respiratory Device',
                                                    'Respiratory Testing Device', 'Bi-Tubes', 'Reel for Hoses',
                                                    'High Pressure Instrument', 'Towing Bar', 'Early Warning Device',
                                                    'Hydraulic/Vacuum Valve', 'Pressure Gauge', 'Quick Adjust Assembly',
                                                    'Pendant Control Assembly'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Hospital Equipment',
                            'items'         => array(
                                                    'Anesthesia Machine', 'Colcoscopy', 'Endoscopy', 'Examination table',
                                                    'Hospital Bed/Bed/Double deck/foam', 'incubator', 'Centrifuge Machine', 'Laryngoscope',
                                                    'Microscope', 'Nebulizer', 'Oxygen tank', 'Sphygmomanometer (BP Apparatus)',
                                                    'Sterilizer', 'Stretcher', 'Suction Maching', 'Mayo Steel',
                                                    'Wheel chair', 'Overbed table', 'E cart/trolley', 'Bedside table/cabinet',
                                                    'Oxygen Gauge', 'Walking Frame/Stick', 'Commode chairs', 'Digital Thermostat',
                                                    'Hamper/Draper', 'Medicine Cabinet', 'Water Bath', 'Laboratory Monitor',
                                                    'Cast Trimmer/Cutter', 'Instrument Table', 'Cautery Machine', 'Proctoscope',
                                                    'Lithotriptor', 'Dermatone'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Medical, Dental & Laboratory Equipment',
                            'items'         => array(
                                                    'Computed Tomography scan maching', 'Dental Equipment', 'ECG',
                                                    'Laboratory Equipment', 'Magnetic Resonance Imaging', 'Medical Equipment',
                                                    'Ultrasound Equipment', 'X ray', 'Defibrillator', 'Operating table', 'Negatoscope',
                                                    'Hemodialysis Machine', 'Microtome', 'Hot Plate Stirrer', 'Otoscope',
                                                    'Infusion Pump', 'Colonoscopy', 'Autoclave', 'Syringe Pump', 'Patient Monitor',
                                                    'Cardiac Monitor', 'Rotator', 'blood Warmer', 'Cryostat', 'Treadmill Machine',
                                                    'Pulse Oximete', 'Insufflation Machine', 'Fetal Monitor', 'Film Processor',
                                                    'X-Ray Transformer', 'Laboratory Oven', 'Microtome', 'Hygrometer'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Sports Equipment',
                            'items'         => array(
                                                    'Archery', 'Arnis Equipment', 'Athletic Equipment', 'Badminton Equipment',
                                                    'Basketball Equipment', 'Boxing Equipment', 'Chess set', 'Electric score board',
                                                    'Fixed barbell', 'Flag/Flag pole stand', 'Football Equipment', 'Billiards',
                                                    'Gymnastic Equipment', 'Judo Mat', 'Rifle', 'Scrabble', 'Sepaktakraw Equipment',
                                                    'Soccer Equipment', 'Softball/Baseball Equipment', 'Stationary Bicycle',
                                                    'Stop watch', 'Swimming Equipment', 'Table tennis Equipment', 'Taekwondo Equipment',
                                                    'Tennis Equipment', 'Volleyball Equipment', 'Helmet'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Technical & Scientific Equipment',
                            'items'         => array(
                                                    'Ammeter', 'Caliper', 'Car radio/Truck radio', 'Electronic Device',
                                                    'KWH/PH/VOLTAGE Meter', 'Lettering set/Drawing Material', 'Metal detector',
                                                    'Micrometer', 'Multi tester', 'Running Number Machine', 'Buzzer',
                                                    'Transformer', 'Insulator tester', 'Load Logger', 'Data Logger', 'Ion Meter',
                                                    'Fault Indicator', 'Transformer Relay', 'Voltage Monitor', 'Total Station',
                                                    'Hasty Search Kit'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Other Machinery & Equipment',
                            'items'         => array(
                                                    'Air compressor', 'Axiel Blower', 'Binding/Indicator Machine', 'Canopy/Canvas/Tent',
                                                    'Carpentry tools', 'Chainsaw', 'Circular saw machine/Crosscut saw', 'Compactor (plate)',
                                                    'Cutters', 'Electric drill', 'Escalator', 'Floor Polisher', 'Gas tank', 'Generator',
                                                    'Grease gun', 'Grinder', 'Gun Tucker', 'Hand tools', 'Industrial Mixer', 'Jack',
                                                    'Measuring Tape', 'Mop squeezer', 'Planner machine', 'Plastic sealer', 'Platform balance',
                                                    'Power Supply', 'Pressure Washer/Roller', 'Pump', 'Sanding machine', 'Scaffolding',
                                                    'Inverter', 'Soldering gun', 'Spotlight', 'Sprayer/Separator', 'Riverter', 'Hook stick',
                                                    'Utility Equipment', 'Utility Hammer', 'Vacuum cleaner', 'Hot stick', 'Water Tank',
                                                    'Welding machine', 'Welding outfit', 'Wrench', 'Clamp Stick', 'Hydraulic Crimper',
                                                    'Shredder', 'Metal Railings', 'Smoke Machine', 'Misting Machine', 'Oil Filtering Machine',
                                                    'Power Fuse', 'Vacuum Flask', 'Switch Gears', 'Sealer Machine', 'Portalet', 'Diggint Tools',
                                                    'Techno Test', 'Buggy', 'Equipment/Construction Trolley', 'Push Cart', 'Waste Bin',
                                                    'Container Van', 'Steel Frame Structure', 'Pulverizer', 'Heat Blower', 'Cottage',
                                                    'Baler', 'Perforator', 'Waste Hopper', 'Composting Drum', 'Conveyor', 'Screener', 'MRF Equipment'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Moto Vehicles',
                            'items'         => array(
                                                    'Ambulance', 'Car', 'Jeep/AUV', 'Motorcycle', 'Multi-Cab',
                                                    'SUV', 'Van', 'LCD Mobile Display Truck', 'Fire Truck', 'Pick-Up'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Watercrafts',
                            'items'         => array(
                                                    'Boats'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Other Transportation Equipment',
                            'items'         => array(
                                                    'Bicycle'
                                                )
                            ),
                        array(
                            'ppe_subcat_id' => 'Aircraft',
                            'items'         => array(
                                                    'Airplane'
                                                )
                            )
                        );
    for ($x = 0 ; $x<count($items); $x++) {
        $subcat = $this->get_subcategory($items[$x]['ppe_subcat_id']);
        for ($y = 0 ; $y<count($items[$x]['items']); $y++) {
            $PPEitems = new PPEitems;
            $PPEitems->ppe_cat_id = $subcat->ppe_cat_id;
            $PPEitems->ppe_subcat_id = $subcat->id;
            $PPEitems->desc = $items[$x]['items'][$y];
            $PPEitems->code_no = $y;
            $PPEitems->save();

        }
    }

    }



    public function get_category($cat_desc){
        $catid = DB::table('inv_ppe_code_category')
            ->where('desc', '=', $cat_desc)
            ->first();
        return $catid->id;
    }

    public function get_subcategory($cat_desc){
        $catid = DB::table('inv_ppe_code_subcategory')
            ->where('desc', '=', $cat_desc)
            ->first();
        return $catid;
    }


}
