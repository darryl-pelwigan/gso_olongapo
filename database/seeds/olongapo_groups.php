<?php

use Illuminate\Database\Seeder;

class olongapo_groups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->set_groups();
        $this->set_users();
    }

    public function set_groups(){
         DB::table('olongapo_user_groups')->insert(array(
                    [
                        'ugrp_name' => 'PurchaseRequestOrder',
                        'ugrp_homepage' => 'pr.index',
                        'ugrp_description' => 'Privileged users'
                    ],
                    [
                        'ugrp_name' => 'Bids and Awards Committee',
                        'ugrp_homepage' => 'bac.index',
                        'ugrp_description' => 'Privileged users'
                    ],
                    [
                        'ugrp_name' => 'Abstract of Records',
                        'ugrp_homepage' => 'bac.index',
                        'ugrp_description' => 'Privileged users'
                    ],
                    [
                        'ugrp_name' => 'GSO Assistant Officer',
                        'ugrp_homepage' => 'gso.index',
                        'ugrp_description' => 'Department users'
                    ],
                    [
                        'ugrp_name' => 'Department',
                        'ugrp_homepage' => 'dept.index',
                        'ugrp_description' => 'Department'
                    ],
                     [
                        'ugrp_name' => 'GSO Manager',
                        'ugrp_homepage' => 'gsomngr.index',
                        'ugrp_description' => 'GSO Manager'
                    ]
                ));
    }

    public function set_users(){
            DB::table(config('app.projcode').'_user_credentials')->insert(array(
            [
                'ucrd_realname' => 'Purchase Request and Order',
                'ucrd_username' => 'popr_root',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 3,
                'ucrd_email' => 'popr_root@mail.com',
                'group_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ],
            [
                'ucrd_realname' => 'Bids and Awards Committee',
                'ucrd_username' => 'bac_root',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 4,
                'ucrd_email' => 'bac_root@mail.com',
                'group_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ],
            [
                'ucrd_realname' => 'Absctract of Records',
                'ucrd_username' => 'abstrct_root',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 5,
                'ucrd_email' => 'abstrct_root@mail.com',
                'group_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ],
            [
                'ucrd_realname' => 'GSO Assistant Officer',
                'ucrd_username' => 'gso_assistant',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' => 6,
                'ucrd_email' => 'gso_assistant@mail.com',
                'group_id' => 6,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ],
            [
                'ucrd_realname' => 'GSO MANAGER',
                'ucrd_username' => 'gso_manager',
                'password' => '$2y$10$oyqauLvd34lHcseLRz/6yusVnMba./Y48jIA1giIJhFwW3qGKDjkq',
                'employee_id' =>8,
                'ucrd_email' => 'gso_manager@mail.com',
                'group_id' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'is_approved' => 1,
            ]

        ));
    }
}
