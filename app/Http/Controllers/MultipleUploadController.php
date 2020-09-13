<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultipleUploadController extends Controller
{
    function index()
    {
     return view('multiple_file_upload');
    }

    function upload(Request $request)
    {
     $image_code = '';
     $images = $request->file('file');
     foreach($images as $image)
     {
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';
     }

     $output = array(
      'success'  => 'Images uploaded successfully',
      'image'   => $image_code
     );

     return response()->json($output);
    }
}

