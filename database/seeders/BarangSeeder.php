<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_barang' => 'Baju kaos polos warna abu-abu M', 'stok' => 4],
            ['nama_barang' => 'Baju kaos polos warna abu-abu L', 'stok' => 8],
            ['nama_barang' => 'Baju kaos polos warna abu-abu XL', 'stok' => 8],

            ['nama_barang' => 'Baju kaos polos warna hitam M', 'stok' => 5],
            ['nama_barang' => 'Baju kaos polos warna hitam L', 'stok' => 8],
            ['nama_barang' => 'Baju kaos polos warna hitam XL', 'stok' => 8],
            ['nama_barang' => 'Baju kaos polos warna hitam XXL', 'stok' => 1],

            ['nama_barang' => 'Baju kaos polos warna putih M', 'stok' => 4],
            ['nama_barang' => 'Baju kaos polos warna putih L', 'stok' => 6],
            ['nama_barang' => 'Baju kaos polos warna putih XL', 'stok' => 1],
            ['nama_barang' => 'Baju kaos polos warna putih XXL', 'stok' => 3],

            ['nama_barang' => 'Baju kaos polos warna merah L', 'stok' => 3],
            ['nama_barang' => 'Baju kaos polos warna merah XL', 'stok' => 2],

            ['nama_barang' => 'Baju kaos polos warna biru neci M', 'stok' => 4],
            ['nama_barang' => 'Baju kaos polos warna biru neci L', 'stok' => 8],
            ['nama_barang' => 'Baju kaos polos warna biru neci XL', 'stok' => 10],

            ['nama_barang' => 'Baju digantung warna putih L', 'stok' => 7],
            ['nama_barang' => 'Baju digantung warna biru nevi L', 'stok' => 1],
            ['nama_barang' => 'Baju digantung warna biru ambar XXL', 'stok' => 1],
            ['nama_barang' => 'Baju digantung warna abu-abu XL', 'stok' => 2],
            ['nama_barang' => 'Baju digantung warna hijau tosca XL', 'stok' => 1],
            ['nama_barang' => 'Baju digantung warna hitam L', 'stok' => 1],
            ['nama_barang' => 'Baju digantung warna merah L', 'stok' => 1],
            ['nama_barang' => 'Baju digantung warna merah XL', 'stok' => 1],

            ['nama_barang' => 'Gelas mug', 'stok' => 3],
            ['nama_barang' => 'Kotak mug putih', 'stok' => 4],
            ['nama_barang' => 'Kotak mug coklat', 'stok' => 3],
        ];

        foreach ($data as $barang) {
            Barang::create($barang);
        }
    }
}
