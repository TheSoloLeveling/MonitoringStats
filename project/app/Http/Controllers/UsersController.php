<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /*public function start($id) {
        if($id == ""){
            $id = "NULL";
        }
            $username = "yassine";
            $password = "1123";
            return view('auth.login',
        compact('username', 'password', 'id'));
    }*/

    public function show($id) {
        $users;
       $data = [
            1 => "yassine",
            2 => "ilyas",
            3 => "younes"
       ];

       return view('index', ['users' => $data[$id] ?? 'users '. $id . ' unaivailable']);
    }
}
