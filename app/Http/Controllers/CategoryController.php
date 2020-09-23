<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Category;



class CategoryController extends Controller

{



    public function index(Request $request){

        $categories=Category::get();

        return view('categories',compact('categories'));

    }



    public function destroy(Request $request,$id){

        $category=Category::find($id);

        $category->delete();

        return back()->with('success','Category deleted successfully');

    }   



    public function deleteMultiple(Request $request){

        $ids = $request->ids;

        Category::whereIn('id',explode(",",$ids))->delete();

        return response()->json(['status'=>true,'message'=>"Category deleted successfully."]);   

    }


public function upload(){

    // Count total files
$countfiles = count($_FILES['files']['name']);
 
// Upload directory
$upload_location = "uploads/";
 
// To store uploaded files path
$files_arr = array();
 
// Loop all files
for($index = 0;$index < $countfiles;$index++){
 
   // File name
   $filename = $_FILES['files']['name'][$index];
 
   // Get extension
   $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
   // Valid image extension
   $valid_ext = array("png","jpeg","jpg");
 
   // Check extension
   if(in_array($ext, $valid_ext)){
 
     // File path
     $path = $upload_location.$filename;
 
     // Upload file
     if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
        $files_arr[] = $path;
        
        File::create([
            'name' => $path
        ]);
        // mysqli_query($conn,"INSERT INTO pictures (title)
        // VALUES ('".$path."')");
     }
   }
 
}
 
echo json_encode($files_arr);
die;

}


    



}