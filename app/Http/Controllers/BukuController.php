<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use iluminate\validation\Rule;
use App\Models\KategoriModel;
use illuminate\strorage\Exception;
use illuminate\Support\file;

class BukuController extends Controller
{
    public function buku(){
        return view('buku');
    }
    public function index()
    {
        $kategori = KategoriModel::all();
        
        $buku = BukuModel::get();
       
        return view('buku.list',compact('buku','kategori'));
    }

    function store(Request $request){
        // dd($request->all());
        // $validated = $request->validate([
        //     'judul' =>'required',
        //     'penulis'=>'required',
        //     'penerbit'=>'required',
        //     'tahun' =>'required',
        //     'kategori_id'=>'required',
        //     'bahasa'=>'required',
        //     'harga'=>'required',
        //     'foto'=>'required|image|mimes:jpg,png,gif|max:2048',
        //     'stock'=>'required',
        // ]);
        // $foto =$request->file('foto');
        // $path = $foto->store('path','public');


        $filepath = public_path('uploads');
        $buku = New BukuModel();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->kategori_id = $request->kategori_id;
        $buku->bahasa = $request->bahasa;
        $buku->harga = $request->harga;
        $buku->stok = $request->stok;

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $file_name = time(). $file->getClientOriginalName();

            $file->move(public_path('uploads'), $file_name);
            $buku->foto = $file_name;
        }

        $buku->save();
        return redirect()->route('admin.buku');
     }

      function update(Request $request,$id) {
        $buku = BukuModel::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->kategori_id = $request->kategori_id;
        $buku->bahasa = $request->bahasa;
        $buku->harga = $request->harga;
        $buku->stok = $request->stok;

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $file_name = time(). $file->getClientOriginalName();

            $file->move(public_path('uploads'), $file_name);
            $buku->foto = $file_name;
        }
        
        $buku->save();

        return redirect()->route('admin.buku');
    }
    function delete($id) {
    $buku = BukuModel::find($id);
    $buku->delete();
    return redirect()->route('admin.buku');
    }
}