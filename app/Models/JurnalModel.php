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
        'kategori_id',
        'file'
    ];     
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
    public function pinjaman() {
        return $this->hasMany(PinjamModel::class);
    }

}
