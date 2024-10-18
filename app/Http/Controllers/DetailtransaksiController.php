<?php

namespace App\Http\Controllers;

use App\Exports\Detailexport;
use App\Models\BukuModel;
use App\Models\DetailtransaksiModel;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



class DetailtransaksiController extends Controller
{
    public function index()
    {
        $detail = DetailtransaksiModel::get();
        $transaksi = transaksi::all();
        $buku = BukuModel::all();
        return view('kasirbuku.detailtransaksi.list', compact('transaksi', 'detail', 'buku'));
    }

    public function checkout(Request $request, $id)
    {

        dd($request->all());
        $uangmasuk = $request->input('uangmasuk');

        $transaksi = transaksi::find($id);
        $user = auth()->user();


        if (!$transaksi) {
            // Tangani kesalahan, misalnya, kembali dengan pesan kesalahan
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        $details = DetailtransaksiModel::where('transaksi_id', $transaksi->id)->get();

        foreach ($details as $detail) {

            DetailtransaksiModel::create([
                'tranksasi_id' => $transaksi->id,
                'user_id' => $user->id,
                'subtotal' => $transaksi->total,
                'uangmasuk' => $uangmasuk,
                'kembalian' => $uangmasuk - $transaksi->total
            ]);
            // Kurangi stok barang
            return redirect()->back();
        }
    }
    public function expor()
    {
        return Excel::download(new Detailexport, 'detailtransaksi.xlsx');
    }
}
