<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->orderBy('tanggal', 'desc')->get();
        return view('barang_keluars.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluars.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $barang = Barang::find($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk barang keluar.');
        }

        BarangKeluar::create($request->all());

        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('barang_keluars.index')->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_keluars.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);
        $barangLama = Barang::find($barangKeluar->barang_id);

        // Kembalikan stok lama
        $barangLama->stok += $barangKeluar->jumlah;
        $barangLama->save();

        $barangBaru = Barang::find($request->barang_id);
        if ($barangBaru->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk update barang keluar.');
        }

        $barangKeluar->update($request->all());

        $barangBaru->stok -= $request->jumlah;
        $barangBaru->save();

        return redirect()->route('barang_keluars.index')->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $barang = Barang::find($barangKeluar->barang_id);

        // Kembalikan stok saat data dihapus
        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        $barangKeluar->delete();

        return redirect()->route('barang_keluars.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
