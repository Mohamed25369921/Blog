<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class SettingController extends Controller
{
    use UploadImage;

    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index(){
        $this->authorize('viewAny', $this->setting);
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
            
            $setting->update(['logo' => $this->upload($request->logo)]);
        }
        if ($request->has('favicon')) {
            
            $setting->update(['favicon' => $this->upload($request->favicon)]);
        }
        return redirect()->route('dashboard.settings');
    }
}
