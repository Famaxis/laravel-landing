<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ImageUpload;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        $image = ImageUpload::latest()->first();

        return view('frontend.main',compact(['settings', 'image']));
    }

    public function mail(Request $request)
    {
        Mail::send(new ContactMail($request));

        return back();
    }
}
