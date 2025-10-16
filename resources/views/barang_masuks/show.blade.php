@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h4>🔍 Detail Barang Masuk</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <td>{{ $barangMasuk->barang->nama_barang }}</td>
                </tr>
                <tr>
                    <th>Jumlah Masuk</th>
                    <td>{{ $barangMasuk->jumlah }}</td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>{{ \Carbon\Carbon::parse($barangMasuk->tanggal)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $barangMasuk->created_at->format('d M Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Diperbarui Terakhir</th>
                    <td>{{ $barangMasuk->updated_at->format('d M Y H:i') }}</td>
                </tr>
            </table>
            <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">↩ Kembali</a>
        </div>
    </div>
</div>
@endsection
