<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang')->orderBy('tanggal', 'desc')->get();
        return view('barang_masuks.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_masuks.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $barangMasuk = BarangMasuk::create($request->all());

        // Update stok barang
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        return redirect()->route('barang_masuks.index')->with('success', 'Data barang masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangs = Barang::all();
        return view('barang_masuks.edit', compact('barangMasuk', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangLama = Barang::find($barangMasuk->barang_id);

        // Kurangi stok lama
        $barangLama->stok -= $barangMasuk->jumlah;
        $barangLama->save();

        // Update data baru
        $barangMasuk->update($request->all());

        // Tambahkan stok baru
        $barangBaru = Barang::find($request->barang_id);
        $barangBaru->stok += $request->jumlah;
        $barangBaru->save();

        return redirect()->route('barang_masuks.index')->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barang = Barang::find($barangMasuk->barang_id);

        // Kurangi stok ketika data dihapus
        $barang->stok -= $barangMasuk->jumlah;
        if ($barang->stok < 0) $barang->stok = 0;
        $barang->save();

        $barangMasuk->delete();

        return redirect()->route('barang_masuks.index')->with('success', 'Data barang masuk berhasil dihapus.');
    }
}
