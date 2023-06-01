<?php

namespace App\Http\Traits;

use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;

trait HandleFiles
{
    public function uploadImage($request)
    {
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destination_path = public_path('storage/images/' . $image_name);
        Image::make($image)->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destination_path, 100);
        return $image_name;
    }
    public function deleteImage($image)
    {
        Storage::delete('/public/images/' . $image);
    }
}
