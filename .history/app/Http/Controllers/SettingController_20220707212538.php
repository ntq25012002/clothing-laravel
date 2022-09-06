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

        dd(Settings::create([
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
        ]));

        // $data = [

        // ];
    }
}
