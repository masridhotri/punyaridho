<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function buku(){
        return view('buku');
    }
    public function index()
    {
        $buku_data = BukuModel::get();
        return view('buku.list',compact('buku_data'));
    }
}
