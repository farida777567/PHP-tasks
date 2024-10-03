<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function createUsers()
    {
        User::factory(100)->create();
        /*return "100 Users created!";*/
        return redirect()->route('showUsers');
       
    }

    
    public function showUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
}
