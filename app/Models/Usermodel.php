<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailtransaksiModel;


class Usermodel extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksi');
    }
}

