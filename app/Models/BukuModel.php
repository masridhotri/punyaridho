<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun',
        'kategori_id',
        'bahasa',
        'harga',
        'foto',
        'stok'
    ];
    
        public function kategori()
        {
            return $this->belongsTo(KategoriModel::class, 'kategori_id');
        }
        public function detail(){
            return $this->belongto(DetailtransaksiModel::class, 'detail_id');
        }
}
