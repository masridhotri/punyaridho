<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailpinjamModel extends Model
{
    use HasFactory;
    protected $table = 'detailpinjam';

    protected $fillable = [
        'pemijaman_id',
        'jurnal_jd',
        'tgl'
    ];

    public function jurnal(){
        return $this->belongsTo(JurnalModel::class,'jurnal_id');
    }

    public function pinjam(){
        return $this->belongsTo(PinjamModel::class,'pinjam');
    }
}
