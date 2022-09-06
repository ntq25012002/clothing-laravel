<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        $setting = Settings::where('config_key','logo')->get();
        $logoOld = $setting[0]['config_value'];
       
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/logo',$fileNameHash);
            $dataLogo = [
                'file_name' => $fileNameHash,
                'fie_path' => Storage::url($filePath)
            ];
        }
        foreach ($request->all() as $key=>$item) {
            var_dump( $key);
            echo '<pre>';
        }
        die;
        $ids = $request->ids;
        $data = [
            "logo" => $dataLogo['file_path'] ?? $logoOld,
            "facebook" => $request->facebook,
            "phone_number" => $request->facebook,
            "telegram" => $request->facebook,
            "email" => $request->facebook,
            "tiktok" => $request->facebook,
            "address" => $request->facebook,
            "twitter" => $request->facebook,
            "instagram" => $request->facebook,
        ];
        Settings::where('id', $ids)->update($data);
        return redirect()->back()->with('msg','Cập nhật thông tin thành công');
    }
}
