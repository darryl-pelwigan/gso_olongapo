<?php

use Illuminate\Database\Seeder;

class BACcategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected  $category =     array(
                                    'Advertising Agency Services',
                                    'Agricultural Chemicals',
                                    'Agricultural Machinery and Equipment',
                                    'Agricultural Products (Seeds, Seedlings, Plants)',
                                    'Airconditioning and Airconditioning System',
                                    'Airconditioning Maintenance Services',
                                    'Aircraft Spare Parts',
                                    'Ammunitions and Explosives',
                                    'Animal Feeds',
                                    'Appliances',
                                    'Architectural Design',
                                    'Arts and Crafts Accessories and Supplies',
                                    'Audio and Visual Equipment',
                                    'Automation Equipment',
                                    'Aviation Products',
                                    'Bedclothes, Linens and Towels',
                                    'Beverages',
                                    'Books, Maps and other Publications',
                                    'CAD Services',
                                    'Cargo Forwading and Hauling Services',
                                    'Catering Services',
                                    'Chemical Detergents',
                                    'Chemical and Chemical Products',
                                    'Communication Equipment',
                                    'Communication Equipment & Parts and Accessories',
                                    'Computer Furniture',
                                    'Construction Equipment',
                                    'Construction Management Services',
                                    'Construction Materials and Supplies',
                                    'Construction Projects',
                                    'Consulting Services',
                                    'Corporate Giveaways',
                                    'Dairy Products',
                                    'Diagnostic and Laboratory Services',
                                    'Drugs and Medicines',
                                    'Educational Materials and Supplies',
                                    'Electrical Supplies',
                                    'Electrical Systems and Lightning Components',
                                    'Electronic Parts and Components',
                                    'Engineering and Laboratory Testing Equipment',
                                    'Environmental Health/Safety Equipment',
                                    'Events Management',
                                    'Fertilizers',
                                    'Fire Fighting & Rescue and Safety Equipment',
                                    'Furnitures & Fixtures',
                                    'Flags',
                                    'Food Processing Equipment',
                                    'Food Stuff',
                                    'Freight Forwader Services',
                                    'Fuels/Fuel Additives & Lubricants & Anti Corrosive',
                                    'Furniture & Fixtures',
                                    'Furniture Parts and Accessories',
                                    'Games and Toys',
                                    'Gaming Equipment and Paraphernalia',
                                    'Garments',
                                    'General Contractor',
                                    'General Engineering Services',
                                    'General Merchandise',
                                    'General Repair and Maintenance Services',
                                    'Geotechnical Instrumentation',
                                    'Grocery Items',
                                    'Guns and Weapons',
                                    'Hardware and Construction Supplies',
                                    'Hospital/Medical Equipment',
                                    'Hotel and Lodging and Meeting Facilities',
                                    'Hydrological Instruments',
                                    'Industrial Machinery and Equipment',
                                    'Industrial Pumps and Compressors',
                                    'Industrial Safety Equipment',
                                    'Information Technology',
                                    'Information Technology Parts & accessories & Perip',
                                    'Institutional Food Services Equipment',
                                    'Internet Services',
                                    'Investigative Equipment',
                                    'IT Broadcasting and Telecommunications',
                                    'Janitorial Equipment',
                                    'Janitorial Services',
                                    'Janitorial Supplies',
                                    'Kitchenware',
                                    'Laboratory Supplies and Equipment',
                                    'Laundry Services',
                                    'Lease and Rental',
                                    'Lifting Equipment and Accessories',
                                    'Live Animals (Livestock, Birds, Live Fish & etc.,)',
                                    'Machine Tools',
                                    'Mail and Cargo Transport Services',
                                    'Mailing Tools',
                                    'Marine Transport',
                                    'Maritime Spare Parts',
                                    'Market Research Services',
                                    'Medical and Dental Equipment',
                                    'Medical Supplies and Laboratory Instrument',
                                    'Metal Fabrication',
                                    'Meteorological Equipments and instruments',
                                    'Mining Equipment and Supplies',
                                    'Musical Instrument Parts and Accessories',
                                    'Musical Instruments',
                                    'Navigation Equipment',
                                    'Newspaper',
                                    'Office Equipment',
                                    'Office Equipment Parts and Accessories',
                                    'Office Supplies and Devices',
                                    'Oil/Heat Chemical Resistant Rubber',
                                    'Ordinance Products',
                                    'Packaging Supplies and Materials',
                                    'Personal Care Products',
                                    'Pest Control Services',
                                    'Photographic Equipment',
                                    'Photographic Parts, Supplies and Accessories',
                                    'Photography Services',
                                    'Plastic Products',
                                    'Power Generating Sets',
                                    'Preserved or Processed Foods',
                                    'Print and Broadcast and Aerial Advertising',
                                    'Printing Services',
                                    'Printing Supplies',
                                    'Public Relations Programs or Services',
                                    'Purses, handbags and bags',
                                    'Quartermaster Items',
                                    'Radiological/Diagnostic Equipment',
                                    'Reproduction Services',
                                    'Rice Miling Services',
                                    'Safety and Occupational Products',
                                    'Sale of Property or Building',
                                    'Security Services',
                                    'Security Surveillance and Detection Equipment',
                                    'Services',
                                    'Signage and Accessories',
                                    'Sporting Goods',
                                    'Structured Cabling',
                                    'Surveying Instruments',
                                    'Surveying Services',
                                    'Systems Integration',
                                    'Telecommunications Engineering',
                                    'Telecommunications Provider',
                                    'Textiles',
                                    'Timepieces and Jewerly and Gemstone Products',
                                    'Tokens and Awards',
                                    'Traffic Control Systems',
                                    'Transmission and Distribution Lines',
                                    'Transportation and Communication Services',
                                    'Travel, Food, Lodging and Entertainment Services',
                                    'Vehicle Parts and Accessories',
                                    'Vehicle Repair and Maintenance',
                                    'Vehicles',
                                    'Veterinary Products and Supplies',
                                    'Video Production Services',
                                    'Waste Management and Recycling',
                                    'Water and Waste Water Treatment Supply & Disposal',
                                    'Water Service Connection Materials/Fittings',
                                    'Well Drilling and Construction Services'

                            );


       protected  $bac_type =       array(
                                          'SHOPPING',
                                          'NEGOTIATED',
                                          'PUBLIC BIDDING',
                                          'DIRECT CONTRACT',
                                          'REPEAT ORDER',
                                          'EMERGENCY CASES'
                                    );


    public function run()
    {
      $this->bac_category();
      $this->bac_type();
    }

    public function bac_category()
    {
          foreach ($this->category as $key => $value) {
            DB::table('olongapo_bac_category')->insert(array(
                         [
                            'description' => $value
                        ],
                ));
        }
    }

    public function bac_type()
    {
          foreach ($this->bac_type as $key => $value) {
            DB::table('olongapo_bac_type')->insert(array(
                         [
                            'description' => $value
                        ],
                ));
        }
    }


}
