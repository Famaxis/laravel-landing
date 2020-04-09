<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Models\ImageUpload;

class ImageController extends Controller
{
    public function create()
    {
        $image = ImageUpload::latest()->first();
        return view('admin.image', compact('image'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $image = new ImageUpload;
        return $image->upload($request);
    }

    public function destroy()
    {
        ImageUpload::truncate();

        $files = new Filesystem();
        $files->cleanDirectory(public_path('thumbnails'));
        $files->cleanDirectory(public_path('uploaded_images'));

        return back()->with('success', 'Uploaded images was successfully deleted');
    }
}
