<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
        
    }
    public function update(Request $request)
    {
        $user = User::find(Auth()->user()->id);
        $user->email = !empty($request->get('email')) ? $request->get('email') : old('email');
        $user->name = !empty($request->get('name')) ? $request->get('name') : old('name');

        if(!empty($request->get('password-old'))  &&  !empty($request->get('password')))
        {
            $hasher = app('hash');
            if ($hasher->check($request->get('password-old'), $user->password))
            {
                $user->password = bycrypt($request->get('password-old'));
            }
        }

        if($user->save())
        {
            $request->session()->flash('succes', 'Modifié');
        }
        else
        {
            $request->session()->flash('succes', 'Modifié');
        }

        return view('profile');

           
    }

    public function delete(Request $request)
    {

        User::find($request->get('user-id'))->delete();
        return view('welcome');

    }
}
