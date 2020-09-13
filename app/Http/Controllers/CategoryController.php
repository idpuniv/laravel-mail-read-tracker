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

    header('Content-Type: application/json');
    
    $uploaded = [];
    $allowed = ['mp4', 'png','pdf', 'docx'];
    
    $succeeded = [];
    $failed = [];
    
    if(!empty($_FILES['file'])){
        foreach($_FILES['file']['name'] as $key => $name){
            if($_FILES['file']['error'][$key] === 0){
                $temp = $_FILES['file']['tmp_name'][$key];
    
                $ext = explode('.', $name);
                $ext = strtolower(end($ext));
                
                $file = md5_file($temp) . time() . '.' . $ext;
    
                if(in_array($ext, $allowed) === true && move_uploaded_file($temp, "images/{$file}") === true){
                    $succeeded[] = array(
                        'name' => $name,
                        'file' => $file
                    );
                }else{
                    $failed[] = array(
                        'name' => $name
                    );
                }
            }
        }
    
        if(!empty($_POST['ajax'])){
            echo json_encode(array(
                'succeeded' => $succeeded,
                'failed' => $failed
            ));
        }
    }


    }



}