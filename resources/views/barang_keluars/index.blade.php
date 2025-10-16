@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-4">📤 Daftar Barang Keluar</h3>

    <a href="{{ route('barang_keluars.create') }}" class="btn btn-success mb-3">+ Tambah Barang Keluar</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-danger">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Stok Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluars as $i => $b)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $b->barang->nama_barang }}</td>
                <td>{{ $b->tanggal }}</td>
                <td>{{ $b->jumlah }}</td>
                <td>{{ $b->stok_akhir ?? $b->barang->stok }}</td>
                <td>
                    <a href="{{ route('barang_keluars.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang_keluars.destroy', $b->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
