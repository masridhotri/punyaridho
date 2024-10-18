<?php

namespace App\Http\Controllers;

use App\Models\JurnalModel;
use App\Models\PinjamModel;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function ngehek()
    {
        $jurnal =JurnalModel::all();
        $pinjam = PinjamModel::get();
        return view('peminjaman.pinjam.list', compact('pinjam','jurnal'));
    }

    public function addtransaksi($id)
    {
        $jurnal = JurnalModel::find($id);

        // Cek apakah buku sudah ada di keranjang
        $pinjam = PinjamModel::where('buku_id', $jurnal->id)->first();

        if ($pinjam){
            // Jika buku sudah ada di keranjang, tambahkan jumlahnya
            $pinjam->qty+= 1;
            $pinjam->save();
        } else {
            // Jika belum, tambahkan buku ke keranjang
            PinjamModel::create([
                'jurnal_id' => $jurnal->id,
                'tanggal' => now(),
                'qty' => 1,
               
            ]);
            $pinjam->decrement('qty');
        }

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan isi keranjang
    // public function showCart()
    // {
    //     $pinjaman = JurnalModel::with('book')->get();

    //     return view('transaksi', compact('transaksi'));
    // }


    // Mengupdate jumlah buku di keranjang
    public function updateCart(Request $request, $id)
    {
        $pinjam = PinjamModel::findOrFail($id);
        $pinjam->quantity = $request->input('quantity');
        $pinjam->save();

        return redirect()->back()->with('success', 'Jumlah buku berhasil diperbarui!');
    }
}
