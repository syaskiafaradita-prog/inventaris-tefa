@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>✏️ Edit Barang Masuk</h4>
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

            <form action="{{ route('barang_masuks.update', $barangMasuk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="barang_id" class="form-label">Nama Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $barangMasuk->barang_id == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Masuk</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $barangMasuk->jumlah }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $barangMasuk->tanggal }}" required>
                </div>

                <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">↩ Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
