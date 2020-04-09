<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings',compact('settings'));
    }


    public function update(Request $request)
    {
        $settings = Setting::first();

        // all fields are required
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);

        $settings->update($request->all());

        return back()->with('success', 'Settings was successfully updated');
    }
}
