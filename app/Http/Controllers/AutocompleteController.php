<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
            $query = $request->get('query');
            $data = DB::table('contacts')
                ->where('user_id', Auth()->user()->id)
                ->where('email', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
            $output .= '
            <li><a href="#">'.$row->email.'</a></li>
            ';
            }
            $output .= '</ul>';
            echo $output;
     }
    }

}
