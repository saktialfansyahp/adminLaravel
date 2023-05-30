<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserEbookController extends Controller
{
    public function index(){
        $user = User::all();
        // return view('dataUser.index', compact('user'));
        return view('dataUser.index',[
            'user' => $user
        ]);
    }
}
