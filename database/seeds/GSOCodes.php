<?php

use Illuminate\Database\Seeder;

class GSOCodes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $category = array(
                                    1=>'Office Supplies',
                                    2=>'Medical, Dental, and Laboratory Supplies',
                                    3=>'Military, Police and Traffic Supplies',
                                    4=>'School Supplies',
                                    5=>'Hospital Supplies',
                                    6=>'Agricultural and Marine Supplies',
                                    7=>'Maintenance Supplies',
                                    8=>'Other Inventories'
                                );
    public function run()
    {
       $this->set_gso_code_category();
       $this->set_gso_code_list();
    }

    public function set_gso_code_category(){
        foreach ($this->category as $key => $value) {
            DB::table('inv_gsoprop_code_category')->insert(array(
                         [
                            'desc' => $value,
                            'code_family' => $key,
                        ],
                ));
        }

    }

    public function set_gso_code_list(){
        $category = $this->category;
        $code_list_sups = array(
                        'office_sup'=>array(
                                'cat_id' =>$category[1],
                                'code_list' => array(
                                                1=>'Blackboard/White Board/Corkboard',
                                                2=>'Cutter',
                                                3=>'Desk Tray',
                                                4=>'Letter Template',
                                                5=>'Mechanical Pencil',
                                                6=>'Calculator (small)',
                                                7=>'Tech Pen',
                                                8=>'Pencil Sharpener/Sharpener',
                                                9=>'Puncher',
                                                10=>'Measuring Set',
                                                11=>'Scissor (office)',
                                                12=>'Staple wire remover',
                                                13=>'Stapler',
                                                14=>'Tape dispenser',
                                                15=>'Flashdrive/Memory Card',
                                                16=>'Monobloc Chairs',
                                                17=>'Monobloc Tables',
                                                18=>'Brochure/Magazine/Newspaper Rack'
                                            )
                        ),
                        'medlab_sup'=>array(
                                'cat_id' =>$category[2],
                                'code_list' => array(
                                                1=>'Amalgam Carrier',
                                                2=>'Ambo/Ambu Bag',
                                                3=>'Baking Pan',
                                                4=>'Basic (kidnet, et al)',
                                                5=>'Bed sheets',
                                                6=>'Blade holder',
                                                7=>'Bone chisel/File',
                                                8=>'Clam, Towel',
                                                9=>'Dental syringe',
                                                10=>'Depressor, tongue',
                                                11=>'Excavator',
                                                12=>'Explorer, dental periosteal',
                                                13=>'Flashlight',
                                                14=>'Footstool',
                                                15=>'Forceps',
                                                16=>'Gowns',
                                                17=>'Jar',
                                                18=>'Kerosene lamp/Burner',
                                                19=>'Kettle',
                                                20=>'Knife',
                                                21=>'Screen Protector',
                                                22=>'Mortar & Pestle',
                                                23=>'Mouth Mirror',
                                                24=>'Needle holder',
                                                25=>'Scaler',
                                                26=>'Steam inhalator',
                                                27=>'Surgical Mallet',
                                                28=>'Tackle/Tool box',
                                                29=>'Tong',
                                                30=>'Tracheotomy Tube',
                                                31=>'Tray (medical)',
                                                32=>'Utility cart/Troller',
                                                33=>'Utility/IV stand',
                                                34=>'Weighing Scale',
                                                35=>'Enema Can',
                                                36=>'OB Stetrical set',
                                                37=>'Dental Straight Stout Elevator',
                                                38=>'Speculum',
                                                39=>'Scissor (medical)',
                                                40=>'Container/Dressing Jar',
                                                41=>'Thermometer',
                                            )
                        ),
                        'militarypolice_sup'=>array(
                                'cat_id'=>$category[3],
                                'code_list'=>array(
                                                1=>'Hose Key',
                                                2=>'Helmet/Safety hat',
                                                3=>'Bayonet',
                                                4=>'Blanket',
                                                5=>'Boots/Combat shoes/Safety shoes',
                                                6=>'Bullet Proof/Traffic Vest',
                                                7=>'Compass',
                                                8=>'Handcuffs',
                                                9=>'Jungle bolo',
                                                10=>'Medical kit',
                                                11=>'Melanguer Mousse',
                                                12=>'Goggles(night vision)',
                                                13=>'Pillow & pillow case',
                                                14=>'Pistol Belt',
                                                15=>'Probaton',
                                                16=>'Radio Battery Pack',
                                                17=>'Raincoats',
                                                18=>'Sword',
                                                19=>'Telescope',
                                                20=>'Tent',
                                                21=>'Truncheons',
                                                22=>'Gun Holster',
                                                23=>'Shield',
                                                24=>'Metal Container',
                                                25=>'Body Wet Suit/coverall',
                                                26=>'Traffic Wands',
                                                27=>'Safety gloves',
                                            )
                        ),
                        'school_sup'=>array(
                                'cat_id'=>$category[4],
                                'code_list'=>array(
                                                1=>'Textbooks',
                                                2=>'Instructional Material',
                                                3=>'Chairs',
                                                4=>'Desks',
                                                5=>'Tables',
                                )
                        ),
                        'hospital_sup'=>array(
                                'cat_id'=>$category[5],
                                'code_list'=>array(
                                                1=>'Chart holder',
                                                2=>'Cups & Saucer',
                                                3=>'Dinner plates',
                                                4=>'Emergency light',
                                                5=>'Pitcher & Glass Confectionary',
                                                6=>'Rugs, Carpets & Mats',
                                                7=>'Spoon & forks',
                                                8=>'Stool',
                                                9=>'Tea set/Coffee set',
                                )
                        ),
                        'agrimarine_sup'=>array(
                                'cat_id'=>$category[6],
                                'code_list'=>array(
                                                1=>'Chopping board',
                                                2=>'Cooking pot',
                                                3=>'Padlock/Key holder',
                                                4=>'Waterer',
                                                5=>'Water Jug',
                                                6=>'Water hose/Air hose',
                                                7=>'Cage',
                                                8=>'Net',
                                )
                        ),
                        'maintenance_sup'=>array(
                                'cat_id'=>$category[7],
                                'code_list'=>array(
                                                1=>'Chisel',
                                                2=>'Dust pan',
                                                3=>'Extension Cord',
                                                4=>'Hammer',
                                                5=>'Long nose pliers',
                                                6=>'Mop handle/Push broom',
                                                7=>'Pail',
                                                8=>'Paint Roller/brush',
                                                9=>'Plane',
                                                10=>'Saw',
                                                11=>'Trash can/Waste basket',
                                                12=>'Crowbar',
                                                13=>'Screw Driver',
                                                14=>'Side Cutter',
                                                15=>'Vice Grip',
                                )
                        ),
                        'other_invs'=>array(
                                'cat_id'=>$category[8],
                                'code_list'=>array(
                                                1=>'Computer Screen',
                                                2=>'Diskette Storage',
                                                3=>'Mouse/mouse pad',
                                                4=>'Printer Cable',
                                                5=>'Printer Head',
                                                6=>'Surge Protector',
                                                7=>'Computer keyboard',
                                                8=>'Projector pen',
                                )
                        )
        );


        foreach ($code_list_sups as $key => $code_list_sup) {
          $cat_id = $code_list_sup['cat_id'];
          $count = 1;
          foreach ($code_list_sup['code_list'] as $keyx => $value) {
           $items =  $value;
           DB::table('inv_gsoprop_code_list')->insert(array(
                         [
                            'gsocode_cat_id' => $this->get_gso_code_catid($cat_id),
                            'desc' => $items,
                            'useful_life' => $count,
                            'code_no' => $count,
                        ],
                ));
            $count++;
          }
        }

    }

    public function get_gso_code_catid($cat_desc){
        $catid = DB::table('inv_gsoprop_code_category')
            ->where('desc', '=', $cat_desc)
            ->first();
        return $catid->id;
    }
}
