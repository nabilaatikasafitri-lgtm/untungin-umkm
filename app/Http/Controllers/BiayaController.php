<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{public function index()
    {
        $biayas = Biaya::latest('tanggal')->get();

        return view('biaya.index', compact('biayas'));
    }

    public function create()
    {
        return view('biaya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
        ]);

        Biaya::create($request->only([
            'tanggal',
            'kategori',
            'keterangan',
            'jumlah',
        ]));

        return redirect()->route('biaya.index')
            ->with('success', 'Biaya berhasil ditambahkan!');
    }

    public function edit(Biaya $biaya)
    {
        return view('biaya.edit', compact('biaya'));
    }

    public function update(Request $request, Biaya $biaya)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $biaya->update($request->only([
            'tanggal',
            'kategori',
            'keterangan',
            'jumlah',
        ]));

        return redirect()->route('biaya.index')
            ->with('success', 'Biaya berhasil diperbarui!');
    }

    public function destroy(Biaya $biaya)
    {
        $biaya->delete();

        return redirect()->route('biaya.index')
            ->with('success', 'Biaya berhasil dihapus!');
    }
}
