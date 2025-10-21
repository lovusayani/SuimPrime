<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function edit()
    {
        $logos = [
            'logo_normal' => Setting::get('logo_normal'),
            'logo_dark' => Setting::get('logo_dark'),
            'logo_mini' => Setting::get('logo_mini'),
            'logo_dark_mini' => Setting::get('logo_dark_mini'),
        ];

        return view('admin.settings.edit', compact('logos'));
    }

    public function update(Request $request)
    {
        foreach ($request->only(['logo_normal','logo_dark','logo_mini','logo_dark_mini']) as $key => $file) {
            if($file && $file->isValid()){
                $path = $file->store('uploads/logos', 'public');
                Setting::set($key, 'storage/' . $path);
            }
        }

        return redirect()->back()->with('success', 'Logos updated successfully.');
    }
}