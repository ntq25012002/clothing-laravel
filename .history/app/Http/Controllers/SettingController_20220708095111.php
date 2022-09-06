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
            if($key != 'submit' && $key != '_token' && $key != 'ids') {
                Settings::where('config_key', $key)->update([
                    "config_key" => $item
                ]);
            }
        }

       

            

        return redirect()->back()->with('msg','Cập nhật thông tin thành công');
    }
}
