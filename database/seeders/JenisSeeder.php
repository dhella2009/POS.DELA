<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    public function run(): void
    {
        $jenisList = ['Sepatu', 'Baju', 'Parfum', 'Mobil', 'Skincare', 'Makeup'];

        foreach ($jenisList as $nama) {
            Jenis::firstOrCreate(['nama' => $nama]);
        }
    }
}