<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable =[
        'nama'
    ];
    public function buku(){
        return $this->hasMany(BukuModel::class,'id_buku');
    }
}
