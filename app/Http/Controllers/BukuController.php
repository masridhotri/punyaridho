<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use iluminate\validation\Rule;
use App\Models\KategoriModel;

class BukuController extends Controller
{
    public function buku(){
        return view('buku');
    }
    public function index()
    {
        $buku = BukuModel::get();
        $kategori= KategoriModel::all();
        return view('buku.list',compact('buku','kategori'));
    }

    function store(Request $request){
        $validated = $request->validate([
            'judul' =>'required',
            'penulis'=>'required',
            'tahun' =>'required',
            'kategori_id'=>'required',
            'bahasa'=>'required',
            'harga'=>'required',
            'foto'=>'required|image|mimes:jpg,png,gif|max:2048',
            'stock'=>'required',
        ]);
        if($request->hasfile('foto')){
            $path = $request->file('foto')->store('fotos', 'public');
         }
        $buku = New BukuModel();
        $buku->judul = $request->judul;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->kategori_id = $request->kategori_id;
        $buku->bahasa = $request->bahasa;
        $buku->harga = $request->harga;
        $buku->foto = $request->file('foto')->submit('fotos');
        $buku->stok = $request->stok;
        $buku->save();
        dd($request->all());
        return redirect()->route('admin.buku')->with('success', 'Buku berhasil ditambahkan!');
     }
}
