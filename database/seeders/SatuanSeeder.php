<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
                'kode_satuan' => 'PCS',
                'nama_satuan' => 'Pieces'
            ],
            [
                'kode_satuan' => 'KG',
                'nama_satuan' => 'Kilogram'
            ],
            [
                'kode_satuan' => 'GR',
                'nama_satuan' => 'Gram'
            ],
        ]);
    }
}
