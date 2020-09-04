<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
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
    public function upload(EmailRequest $request, $directory)
    {
      $file = $request->file('file');
      $name = $file->getClientOriginalName();
      if($file->move($directory, $file->getClientOriginalName()))
        return $name;
    return null;
    }
}
