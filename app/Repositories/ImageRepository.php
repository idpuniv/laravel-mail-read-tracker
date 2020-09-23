<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageRepository
{
        
    /**
     * upload file to given directory
     *
     * @param  file $file
     * @param  directory $directory
     * @return filname or null
     */
    public function store($file)
    {
        // Save image
        if($path = basename ($file->store('attachments')));
          return $path;
        // Save thumb
        // $image = InterventionImage::make ($request->image)->widen (500)->encode ();
        // Storage::put ('thumbs/' . $path, $image);
        // Save in base
        // $image = new Image;
        // $image->description = $request->description;
        // $image->category_id = $request->category_id;
        // $image->adult = isset($request->adult);
        // $image->name = $path;
        // $request->user()->images()->save($image);
        return null;
    }
}
