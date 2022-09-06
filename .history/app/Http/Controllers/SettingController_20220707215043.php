<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
class SettingController extends Controller
{
    //
    public function index() {
        $settings = Settings::all();
        return view('admin.settings.index',compact('settings'));
    }
    public function update(Request $request) {

        $data = [
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
                'icon' => '<i class="fa-regular fa-location-dot"></i>',
                'config_key' => 'address',
                'config_value' => 'Canh Nậu, Thạch Thất, Hà Nội',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        // foreach ($data as $item) {

        // }
        Settings::insert($data);
        // return 
    }
}
