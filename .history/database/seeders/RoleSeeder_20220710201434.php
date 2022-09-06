<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = [
            [
                'name' => 'admin',
                'display_name' => 'Quản trị hệ thống'
            ],
            [
                'name' => 'guest',
                'display_name' => 'Khách hàng'
            ],
            [
                'name' => 'content',
                'display_name' => 'Quản trị hệ thống'
            ],
            // [
            //     'name' => 'developer',
            //     'display_name' => 'Phát triển hệ thống'
            // ],
        ];

        DB::table('roles')->insert($data);
    }
}
