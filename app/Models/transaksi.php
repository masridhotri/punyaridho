<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
protected $table = 'transaksi';                

protected $fillable = [
    'user_id',
    'tgl',
    'uangmasuk',
    'kembalian',
    'total'
];
public  function user()
{
    return $this->belongsTo(UserModel::class, 'user_id');
}
public function details()
{
    return $this->hasMany(DetailtransaksiModel::class,);
}
}