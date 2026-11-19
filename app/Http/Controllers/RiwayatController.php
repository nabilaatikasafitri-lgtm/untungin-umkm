<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Biaya;
use Illuminate\Http\Request;


class RiwayatController extends Controller
{
     public function index(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
        ]);

        $pendapatans = Pendapatan::all()->map(function ($item) {
            return [
                'tanggal' => $item->tanggal,
                'jenis' => 'Pendapatan',
                'kategori' => '-',
                'keterangan' => $item->keterangan,
                'jumlah' => $item->jumlah,
            ];
        });

        $biayas = Biaya::all()->map(function ($item) {
            return [
                'tanggal' => $item->tanggal,
                'jenis' => 'Biaya',
                'kategori' => $item->kategori,
                'keterangan' => $item->keterangan,
                'jumlah' => $item->jumlah,
            ];
        });

        $riwayat = $pendapatans->merge($biayas);

        if ($request->filled('tanggal_awal')) {
            $riwayat = $riwayat->filter(function ($item) use ($request) {
                return $item['tanggal'] >= $request->tanggal_awal;
            });
        }

        if ($request->filled('tanggal_akhir')) {
            $riwayat = $riwayat->filter(function ($item) use ($request) {
                return $item['tanggal'] <= $request->tanggal_akhir;
            });
        }

        $riwayat = $riwayat->sortByDesc('tanggal')->values();
        $totalPendapatan = $riwayat
    ->where('jenis', 'Pendapatan')
    ->sum('jumlah');

$totalBiaya = $riwayat
    ->where('jenis', 'Biaya')
    ->sum('jumlah');

$keuntungan = $totalPendapatan - $totalBiaya;

       return view('riwayat.index', compact(
    'riwayat',
    'totalPendapatan',
    'totalBiaya',
    'keuntungan'
    ));
}
}