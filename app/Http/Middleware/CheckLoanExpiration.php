<?php

namespace App\Http\Middleware;

use App\Models\DetailpinjamModel;
use Closure;
use Illuminate\Http\Request;
use App\Models\PinjamModel;
use Carbon\Carbon;


class CheckLoanExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
 
        public function handle(Request $request, Closure $next)
        {
            $jurnalLoan = DetailpinjamModel::where('jurnal_id', $request->jurnal->id)
                                    ->where('user_id', auth()->id())
                                    ->first();
    
            // Perbarui status jika sudah kadaluarsa
            if ($jurnalLoan) {
                $jurnalLoan->updateStatus();
            }
    
            if (!$jurnalLoan || $jurnalLoan->status != 'dipinjam') {
                // Jika belum diverifikasi atau sudah kadaluarsa
                return redirect()->route('jurnals.index')->with('error', 'Akses diblokir: Pemesanan belum diverifikasi atau waktu peminjaman telah habis.');
            }
    
            return $next($request);
        }
    }

 
