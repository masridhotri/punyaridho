<?php

namespace App\Http\Controllers;

use App\Models\JurnalModel;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index()
    {
        $data_jurnal = JurnalModel::get();
        return view('jurnal.list',compact('data_jurnal'));

    }
}
