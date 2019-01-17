<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLoggingTimeline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create(config('app.projcode').'_user_logging', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credential_id')->unsigned()->comment('refer to '.config('app.projcode').'_user_credentials');
            $table->datetime('login_time');
            $table->datetime('logout_time');
            $table->string('login_ip');
            $table->string('login_mac_addr')->nullable();
            $table->timestamps();
            $table->index(['id', 'credential_id', 'login_time', 'logout_time',  'login_ip',  'login_mac_addr'],config('app.projcode').'_user_logging');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists(config('app.projcode').'_user_logging');
    }
}
