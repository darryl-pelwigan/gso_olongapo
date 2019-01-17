<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGsoTemplate extends Migration
{

     private $table = 'olongapo_gso_template';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
           $table->increments('id');
            $table->string('template_desc');
            $table->text('template');
            $table->text('code');
            $table->softDeletes();
            $table->timestamps();
        });
         DB::table($this->table)->insert(
            array(
                [ 'template_desc' => 'gso_temp', 'template' => '"<p style=\"text-align: justify;\">This certifies that [locatorname] with address at the [address], has been subjected to an <strong>ENVIRONMENT AND SANITATION INSPECTION<\/strong> and has been found to be in compliance with existing applicable Philippine Environmental and Sanitation Laws and Regulations.<br \/> <br \/> The John Hay Management Corporation (JHMC) through the Environment and Asset Management Department (EAMD) issues this clearance for the issuance of a Permit-to-Operate (PTO) inside the John Hay Special Economic Zone (JHSEZ). Periodic I nspection of premises will be conducted by the EAMD. Non-compliance with any of the environmentaland sanitation laws will be sufficient ground for the revocation of the certificate.<br \/> <br \/> Issued this [day] of [month], [yearinwords] at Camp John Hay, Baguio City, Philippines.<\/p><table style=\"width: 698px; height: 69px;\"><tbody><tr><td style=\"width: 352px; text-align: center;\">[signature_0]<\/td><td style=\"width: 344px; text-align: center;\">[signature_1]<\/td><\/tr><tr><td style=\"width: 352px; text-align: center;\">[approval_0]<\/td><td style=\"width: 344px; text-align: center;\">&nbsp;[approval_1]<\/td><\/tr><tr><td style=\"width: 352px; text-align: center;\">[position_0]<\/td><td style=\"width: 344px; text-align: center;\">&nbsp;[position_1]<\/td><\/tr><\/tbody><\/table><p>&nbsp;<\/p><table style=\"border-collapse: collapse; height: 107px; width: 720px; border: 1px solid black;\"><tbody><tr style=\"height: 109px; border-color: #000000;\"><td style=\"width: 238px; height: 109px; border: 1px solid #000000; text-align: center;\"><strong>THIS CEC SHOULD BE DISPLAYED CONSPICUOUS PLACE IN THE OFFICE<\/strong><\/td><td style=\"width: 184px; height: 109px; border: 1px solid #000000; text-align: center;\"><p><strong>Certificate No.:<\/strong><\/p><p>[certno]<\/p><\/td><td style=\"width: 147px; height: 109px; border: 1px solid black; text-align: center;\"><p><strong>Date Issued: <\/strong><\/p><p>[validfrom]<\/p><\/td><td style=\"width: 150px; height: 109px; border: 1px solid #000000;\"><p style=\"text-align: center;\"><strong>Valid Until:<\/strong><\/p><p style=\"text-align: center;\">[validuntil]<\/p><\/td><\/tr><\/tbody><\/table><table style=\"width: 344px; height: 142px;\"><tbody><tr style=\"height: 23px;\"><td style=\"width: 116px; height: 23px;\">Amount<\/td><td style=\"width: 26px; height: 23px;\">:<\/td><td style=\"width: 200px; height: 20px; text-align: left;\">[amount]<\/td><\/tr><tr style=\"height: 15px;\"><td style=\"width: 116px; height: 15px;\">O.R. No.<\/td><td style=\"width: 26px; height: 15px;\">:<\/td><td style=\"width: 200px; height: 15px; text-align: left;\">[orno]<\/td><\/tr><tr style=\"height: 13px;\"><td style=\"width: 116px; height: 13px;\">Date<\/td><td style=\"width: 26px; height: 13px;\">:<\/td><td style=\"width: 200px; height: 13px; text-align: left;\">[datepaid]<\/td><\/tr><\/tbody><\/table><p><em>Note: The application for the renewal of this certificate shall be field one (1) to fifteen (15) days prior to its expiry date<\/em><\/p>"', 'code' => 'gso' ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
