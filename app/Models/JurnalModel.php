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
        'penulis',
        'penerbit',
        'tahun',
        'akreditasi',
        'kategori_id',
        'file'
    ];     
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

}
