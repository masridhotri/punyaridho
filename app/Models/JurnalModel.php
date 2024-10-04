<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalModel extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $fillable = [
        'id_jurnal',
        'judul',
        'akreditasi',
        'penerbit',
        'tgl_terbit',
        'id_kategori'
    ];
}
