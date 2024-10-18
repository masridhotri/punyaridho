<?php

namespace App\Http\Controllers;

use App\Models\JurnalModel;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        // $request->validate([
        //     'username' => 'required',
        //     'rating' => 'required|integer|min:1|max:5',
        //     'comment' => 'required',
        // ]);

        $jurnal = JurnalModel::find($id);
        $jurnal->user_id = $request->user_id;

        $jurnal->review()->create([
            'tanggal' => now(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review has been added!');
    }
}

