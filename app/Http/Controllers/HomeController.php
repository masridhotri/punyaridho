<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class HomeController extends Controller
{


    public function dashboard(){
        $data = User::get();
        return view('dashboard',compact('data'));
    }
    public function create(){
        return view('create');
    } 
    public function index(Request $request){
        return view('user.create');
    }

}
