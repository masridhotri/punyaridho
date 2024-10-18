<?php

namespace App\Http\Controllers;

use App\Models\JurnalModel;
use Illuminate\Http\Request;
use App\models\KategoriModel;
use App\Models\Review;
use PhpOffice\PhpWord\IOFactory;

class JurnalController extends Controller
{
    public function index()
    {
        $kategori= KategoriModel::all();    
        $jurnal = JurnalModel::get();
        $review = Review::all();
        return view('jurnal.list',compact('jurnal','kategori','review'));

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
        $jurnal->akreditas = $request->akreditas;
        $jurnal->kategori_id = $request->kategori_id;

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
        $jurnal->akreditas = $request->akreditas;
        $jurnal->kategori_id = $request->kategori_id;

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

    
        public function show($id)
        {
            $jurnal = JurnalModel::findOrFail($id);
    
            // Baca file Word dari storage
            $path = public_path('upfile/' . $jurnal->file);
            $phpWord = IOFactory::load($path);
    
            // Konversi ke HTML
            $content = '';
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    // Periksa tipe elemen dan ambil teks jika elemen mendukungnya
                    if ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $content .= $element->getText() . "<br>";
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        foreach ($element->getElements() as $textElement) {
                            if ($textElement instanceof \PhpOffice\PhpWord\Element\Text) {
                                $content .= $textElement->getText() . "<br>";
                            }
                        }
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Table) {
                        // Jika elemen adalah tabel, tambahkan logika untuk menampilkan tabel
                        $content .= "Table Detected<br>";
                        // Kamu bisa menambahkan logika untuk menampilkan tabel di sini
                    }
                    // Tambahkan logika lain untuk elemen lain seperti gambar, break, dll.
                }
            }
            
    
            return view('jurnal.iqra', ['content' => $content, 'document' => $jurnal ]);
        }
}
