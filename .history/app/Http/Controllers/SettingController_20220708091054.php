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
        $logo = Settings::where('config_key','logo')->get();
        dd($logo);
 
        dd($request->all());
        $ids = $request->ids;
        $data = [
            "facebook" => $request->facebook,
            "phone_number" => $request->facebook,
            "telegram" => $request->facebook,
            "email" => $request->facebook,
            "tiktok" => $request->facebook,
            "address" => $request->facebook,
            "twitter" => $request->facebook,
            "instagram" => $request->facebook,
        ];
        Settings::where('id', $ids)->update();
        return redirect()->back()->with('msg','Cập nhật thông tin thành công');
    }
}
