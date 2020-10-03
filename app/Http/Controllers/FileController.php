<?php


namespace App\Http\Controllers;

use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Http\Request;
use \App\File;

class FileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        return response()->json([
            'success' => true
        ]);

        $target_dir = public_path() ."/uploads/";
        $target_file = $target_dir . basename($_FILES["files"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        if($request->hasfile('files')) {
        $check = getimagesize($_FILES["files"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        
        
        // Check if file already exists
        if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        
        
        // Check file size
        if ($_FILES["files"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
        
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
         
        

        } else {
        if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
           // echo "The file ". htmlspecialchars( basename( $_FILES["files"]["name"])). " has been uploaded.";
            return response()->json([
                "success" => "yes"
            ]);
        } else {
            
            //echo "Sorry, there was an error uploading your file.";
        }
        }

        return response()->json([
            'success' => true
        ]);
        
    }


    //     $this->validate($request, [
    //             'filenames' => 'required',
    //             'filenames' => 'mimes:jpg|png|jpeg|doc|pdf|docx|zip'
    //     ]);


    //     if($request->hasfile('filesnames'))
    //      {

            
    //         foreach($request->file('filesnames') as $file)
    //         {
    //             $name = time().'.'.$file->extension();
    //             $file->move(public_path().'/files/', $name);  
    //             $data[] = $name;  
    //         }
    //      }


    //      //return response()->json($data);


    //     return response()->json([
    //         'name' => "paul"
    //     ]);
            
    // }
}