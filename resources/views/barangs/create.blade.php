@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>➕ Tambah Barang Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barangs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok Awal</label>
                    <input type="number" id="stok" name="stok" class="form-control" placeholder="Masukkan jumlah stok" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">↩ Kembali</a>
                    <button type="submit" class="btn btn-success">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
