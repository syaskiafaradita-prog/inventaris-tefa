@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mb-4">📦 Daftar Barang</h3>

    <a href="{{ route('barangs.create') }}" class="btn btn-success mb-3">+ Tambah Barang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $i => $b)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->stok }}</td>
                <td>
                    <a href="{{ route('barangs.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barangs.destroy', $b->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus barang ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
