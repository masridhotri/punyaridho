<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\transaksi;
use App\Models\DetailtransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function showtransaksi()
    {
        $book =BukuModel::all();
        $transaksi = transaksi::get();
        $detail= DetailtransaksiModel::get();
        return view('kasirbuku.transaksi.list', compact('transaksi','book','detail'));
    }

    public function anyar(){
        $buku = BukuModel::all();
        return view('kasirbuku.transaksi.tri', compact('buku'));
    }

    public function addtransaksi(Request $request,$id)
    {
        dd($request->all());  
      
    }

    // Menampilkan isi keranjang
    // public function showCart()
    // {
    //     $transaksi = BukuModel::with('book')->get();

    //     return view('transaksi', compact('transaksi'));
    // }

    // Mengupdate jumlah buku di keranjang


   
    public function store(Request $request)
    {
        
            // @dd($request->all());
           

            $userId = Auth::id();

            // Mulai transaksi database
            DB::beginTransaction();
    
            try {
                // Simpan data ke tabel transaksi
                /**
                 * @var Transaksi $transaksi
                 */
                $transaksi = Transaksi::create([
                    'user_id' => $userId,
                    'tgl' => date('Y-m-d'),
                    'uangmasuk' => $request->input('bayar'),      // Menghilangkan titik pada pembayaran_cs
                    'kembalian' => $request->input('kembalian'),
                    'total' => $request->input('total'),

                ]);     
    
                // dd($transaksi);
                //Simpan data ke tabel detail_transaksi
                foreach ($request->items  as $item) {
                   
                    
                  DetailtransaksiModel::create([
                        'transaksi_id' => $transaksi->id,
                        'buku_id' => $item['id'], // Pastikan ID barang digunakan
                        'total' => $item['total'],
                        'qty' => $item['qty'],
    
                    ]);
    
                    // Mengurangi stok barang
                    $barang = BukuModel::find($item['id']);
                    if ($barang) {
                        $barang->stok -= $item['qty'];
                        $barang->save();
                    }
                }
    
                DB::commit();
    
                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi berhasil disimpan!',
                    'transaksi' => $transaksi,
                ]);
    
                // Jika terjadi kesalahan, rollback transaksi database
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()], 500);
            }
        
    }
}


