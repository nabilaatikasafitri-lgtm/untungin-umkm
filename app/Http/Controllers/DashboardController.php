<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Biaya;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
        ]);

        $queryPendapatan = Pendapatan::query();
        $queryBiaya = Biaya::query();

        if ($request->filled('tanggal_awal')) {
            $queryPendapatan->where('tanggal', '>=', $request->tanggal_awal);
            $queryBiaya->where('tanggal', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $queryPendapatan->where('tanggal', '<=', $request->tanggal_akhir);
            $queryBiaya->where('tanggal', '<=', $request->tanggal_akhir);
        }

        $totalPendapatan = $queryPendapatan->sum('jumlah');
        $totalBiaya = $queryBiaya->sum('jumlah');
        $keuntungan = $totalPendapatan - $totalBiaya;

        return view('dashboard', compact(
            'totalPendapatan',
            'totalBiaya',
            'keuntungan'
        ));
    }
}
