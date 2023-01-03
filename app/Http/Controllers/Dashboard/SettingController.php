<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index(){
        return view('dashboard.settings');
    }

    public function update(Request $request, Setting $setting){
        $data = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ];

        foreach (config('app.languages') as $key => $val) {
            $data[$key.'*.title'] = 'nullable|string';
            $data[$key.'*.content'] = 'nullable|string';
            $data[$key.'*.address'] = 'nullable|string';
        }
        $validated_data = $request->validate($data);
        $setting->update($request->except('image','favicon','_token'));

        if ($request->has('logo')) {
            $file = $request->file('logo');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images'),$file_name);
            $path = 'images/'.$file_name;
            $setting->update(['logo' => $path]);
        }
        if ($request->has('favicon')) {
            $file = $request->file('favicon');
            $file_name = Str::uuid(). $file->getClientOriginalName();
            $file->move(public_path('images'),$file_name);
            $path = 'images/'.$file_name;
            $setting->update(['favicon' => $path]);
        }
        return redirect()->route('dashboard.settings');
    }
}
