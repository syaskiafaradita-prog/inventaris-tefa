@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>✏️ Edit Barang</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" 
                           id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" 
                           id="stok" value="{{ old('stok', $barang->stok) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                <a href="{{ route('barangs.index') }}" class="btn btn-secondary">↩ Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
