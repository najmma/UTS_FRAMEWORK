<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode_barang' => '1001',
                'nama_barang' => 'Buku',
                'harga_barang'=> 2000,
                'deskripsi_barang' => 'Buku Tulis',
                'satuan_barang_id' => 1
            ],
        ]);
    }
}
