<?php

namespace App\Http\Controllers;

use App\Models\JurnalModel;
use Illuminate\Http\Request;
use App\models\KategoriModel;

class JurnalController extends Controller
{
    public function index()
    {
        $kategori= KategoriModel::all();
        $jurnal = JurnalModel::get();
        return view('jurnal.list',compact('jurnal','kategori'));

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


        $filepath = public_path('upfile');
        $jurnal = New JurnalModel();
        $jurnal->judul = $request->judul;
        $jurnal->penulis = $request->penulis;
        $jurnal->penerbit = $request->penerbit;
        $jurnal->tahun = $request->tahun;
        $jurnal->akreditas = $request->akreditas;
        $jurnal->kategori_id = $request->kategori_id;
        $jurnal->bahasa = $request->bahasa;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $file_name = time(). $file->getClientOriginalName();

            $file->move(public_path('upfile'), $file_name);
            $jurnal->file = $file_name;
        }

        $jurnal->save();
        return redirect()->route('admin.jurnal');
     }

     public function update(Request $request,$id){
        $jurnal = JurnalModel::find($id);
        $jurnal->judul = $request->judul;
        $jurnal->penulis = $request->penulis;
        $jurnal->penerbit = $request->penerbit;
        $jurnal->tahun = $request->tahun;
        $jurnal->akreditas = $request->akreditas;
        $jurnal->kategori_id = $request->kategori_id;
        $jurnal->bahasa = $request->bahasa;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $file_name = time(). $file->getClientOriginalName();

            $file->move(public_path('upfile'), $file_name);
            $jurnal->file = $file_name;
        }

        $jurnal->save();
        return redirect()->route('admin.jurnal');
     }
     function delete($id) {
        $jurnal = JurnalModel::find($id);
        $jurnal->delete();
        return redirect()->route('admin.jurnal');
        }
}
