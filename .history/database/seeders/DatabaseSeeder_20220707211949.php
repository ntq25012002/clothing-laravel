<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // id	icon	config_key	config_value	created_at	updated_at	

        $settings = [
            [
                'icon' => '<i class="fa-brands fa-facebook"></i>',
                'config_key' => 'facebook',
                'config_value' => 'https://www.facebook.com/',

                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-brands fa-tiktok"></i>',
                'config_key' => 'tiktok',
                'config_value' => 'https://www.tiktok.com/',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-brands fa-telegram"></i>',
                'config_key' => 'telegram',
                'config_value' => 'https://web.telegram.org/',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-brands fa-twitter"></i>',
                'config_key' => 'twitter',
                'config_value' => 'https://www.twitter.com/',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-brands fa-instagram"></i>',
                'config_key' => 'instagram',
                'config_value' => 'https://www.instagram.com/',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-regular fa-envelope"></i>',
                'config_key' => 'email',
                'config_value' => 'quanntph18231@fpt.edu.vn',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => '<i class="fa-regular fa-phone-rotary"></i>',
                'config_key' => 'phone',
                'config_value' => '0964540635',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'icon' => 'fa fa-',
                'config_key' => 'phone',
                'config_value' => 'https://www.coolmate.me/images/logo-coolmate.svg'
            ]
        ];
        DB::table('settings')->insert($settings);
    }
}