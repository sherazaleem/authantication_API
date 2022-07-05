<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Http\Facades\Http;
use GuzzleHttp\Client;
use App\Models\user;

class AuthController extends Controller
{
    public function login(){
        
        return view("user.login");
    }

    public function register(){
        

        return view("user.register");
    
    }
    public function changepassword(){

        return view("user.changepassword");
    
    }
}
