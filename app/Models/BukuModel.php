<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'buku';

    protected $fillable = [
        'id_buku',
        'id_kategori',
        'id_penerbit',
        'id_penulis',
        'id_peminjam',
        'id_petugas',
        'id_petugas',];
    
        public function kategori()
        {
            return $this->belongsTo(KategoriModel::class, 'id_kategori');
        }
        public  function detailtransaksi()
        {
            return $this->hasMany(DetailTransaksiModel::class, 'no_transaksi');
        }
}
