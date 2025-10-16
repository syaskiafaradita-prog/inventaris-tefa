@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>📥 Tambah Barang Masuk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barang_masuks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="barang_id" class="form-label">Pilih Barang</label>
                    <select id="barang_id" name="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Masuk</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan jumlah barang masuk" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Masuk</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">↩ Kembali</a>
                    <button type="submit" class="btn btn-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
