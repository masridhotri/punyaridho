<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function index(){
        $kategori = KategoriModel::get();
        return view('kategori.list', compact('kategori'));
    }
    function store(Request $request){
        $kategori= kategoriModel::new();
        $kategori->nama = $request->nama;
    }
    function update(Request $request,$id){
        $kategori= kategoriModel::find();
        $kategori->nama = $request->nama;
    }
}
