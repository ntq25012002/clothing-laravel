<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
class SettingController extends Controller
{
    //
    public function index() {
        $settings = Settings::all();
        return view('admin.settings.index');
    }
    public function update(Request $request) {

    }
}
