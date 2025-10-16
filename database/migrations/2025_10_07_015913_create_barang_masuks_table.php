@extends('layouts.app')
@section('content')
<h3>📥 Barang Masuk</h3>

<a href="{{ route('barang_masuks.create') }}" class="btn btn-success mb-3">+ Tambah Barang Masuk</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangMasuks as $i => $bm)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $bm->barang->nama_barang }}</td>
            <td>{{ $bm->jumlah }}</td>
            <td>{{ $bm->tanggal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
