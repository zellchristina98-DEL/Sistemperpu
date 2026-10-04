<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function index()
    {
        return view('/login');
    }
    public function aksilogin(Request $Request){
        echo $username= $Request->input('u');
         echo $password= $Request->input('p');
         $where= array(
            'name'=>$username,
            'password'=> $password
         );
    }
}
