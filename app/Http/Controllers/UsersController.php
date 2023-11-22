<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function master(){
        return view('users.statusUser');
    }
    function kegiatanUser(){
        return view('users.kegiatanUser');
    }

}
