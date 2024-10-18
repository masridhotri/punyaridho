<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailtransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'detailtransaksi'; 

    protected $fillable =[
        'transaksi_id',
        'buku_id',
        'total',
        'qty',

    ];


    public  function buku()
{
    return $this->belongsTo(BukuModel::class, 'buku_id');
}
public function transaksi(){
    return $this->belongsTo(transaksi::class,'transaksi_id');
}
}
