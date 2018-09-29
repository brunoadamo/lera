<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Narrative;
use App\User;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('auth.edit', compact('user'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $data, User $user)
    {
        $path       = 'uploads/user/profile/';
        $file_name  = "user.png";
        
        if(Input::hasFile('picture')){

            if (Input::file('picture')->isValid()) {
                
                $path_full = public_path($path);
                $extension = Input::file('picture')->getClientOriginalExtension();
                $file_name = uniqid().'.'.$extension;
    
                Input::file('picture')->move($path_full, $file_name);
            }
        }
        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'folder' => $path,
            'picture' => $file_name,
            'alias' => $data['alias'],            
        ]);

        return redirect('/profile');
    }
}
