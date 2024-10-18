<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'jurnal_id',
        'tgl_pinjam',
        'tgl_kembali',
        'quantity'
        
    ];
    public function jurnal() {
        return $this->belongsTo(JurnalModel::class);
    }
}
