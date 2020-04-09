<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class ImageUpload extends Model
{
    protected $fillable = [
        'image'
    ];

    public function upload(Request $request)
    {
        $originalImage= $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnails/';
        $originalPath = public_path().'/uploaded_images/';
        $time = time();
        $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
        $thumbnailImage->resize(400, null, function($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());

        $imagemodel= new ImageUpload();
        $imagemodel->image=$time.$originalImage->getClientOriginalName();
        $imagemodel->save();

        return back()->with('success', 'Image was successfully uploaded');
    }
}
