<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
