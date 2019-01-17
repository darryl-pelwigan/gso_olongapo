<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnlxUserCredentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('app.projcode').'_user_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ucrd_realname',50);
            $table->string('ucrd_username',50)->unique();
            $table->string('password');
            $table->integer('employee_id')->comment('refer to olongapo_employee_list')->unique();
            $table->string('ucrd_email',80)->comment('should be the same as jhmc_user_contact_info email')->unique()->nullable();
            $table->integer('group_id')->unsigned()->comment('refer to '.config('app.projcode').'_user_groups');
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('is_approved');

            $table->index(['id', 'group_id', 'ucrd_realname', 'ucrd_username', 'ucrd_email'],config('app.projcode').'_user_credentials');
        });

        # Insert
        DB::table(config('app.projcode').'_user_credentials')->insert(array(
            [
                'ucrd_realname' => 'Administrator',
                'ucrd_username' => 'root',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 1,
                'ucrd_email' => 'root@mail.com',
                'group_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ],
            [
                'ucrd_realname' => 'Invetory',
                'ucrd_username' => 'inventory_root',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 2,
                'ucrd_email' => 'invetory_root@mail.com',
                'group_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ]

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('app.projcode').'_user_credentials');
    }
}
