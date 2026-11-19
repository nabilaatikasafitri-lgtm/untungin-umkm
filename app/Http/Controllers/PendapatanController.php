<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index()
    {
        $pendapatans = Pendapatan::latest('tanggal')->get();

        return view('pendapatan.index', compact('pendapatans'));
    }

    public function create()
    {
        return view('pendapatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
        ]);

        Pendapatan::create($request->only([
            'tanggal',
            'keterangan',
            'jumlah',
        ]));

        return redirect()->route('pendapatan.index')
            ->with('success', 'Pendapatan berhasil ditambahkan!');
    }

    public function edit(Pendapatan $pendapatan)
    {
        return view('pendapatan.edit', compact('pendapatan'));
    }

    public function update(Request $request, Pendapatan $pendapatan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $pendapatan->update($request->only([
            'tanggal',
            'keterangan',
            'jumlah',
        ]));

        return redirect()->route('pendapatan.index')
            ->with('success', 'Pendapatan berhasil diperbarui!');
    }

    public function destroy(Pendapatan $pendapatan)
    {
        $pendapatan->delete();

        return redirect()->route('pendapatan.index')
            ->with('success', 'Pendapatan berhasil dihapus!');
    }
}
