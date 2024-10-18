<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function home(){
        return view('home');
    }
    public function index(){
        $user = User::all();
        return view('home.homapage',compact('user'));
       
    } 
    public function suer(){
       
    }

    // public function dashboard(){
    //     $data = User::get();
    //     return view('dashboard',compact('data'));
    // }
    // public function create(){
    //     return view('create');
    // } 
    // public function index(Request $request){
    //     return view('user.create');
    // }

}
