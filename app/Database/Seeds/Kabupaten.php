<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kabupaten extends Seeder
{
    public function run()
    {
        $data = [
            [
                'province_id'  => 1,
                'kabupaten_name'  => 'Sorong',
                'jumlah_penduduk'  => 543488
            ],
            [
                'province_id'  => 1,
                'kabupaten_name'  => 'Manokwari',
                'jumlah_penduduk'  => 342231
            ],
            [
                'province_id'  => 1,
                'kabupaten_name'  => 'Aimas',
                'jumlah_penduduk'  => 645343
            ],
            [
                'province_id'  => 1,
                'kabupaten_name'  => 'Teminabuan',
                'jumlah_penduduk'  => 865622
            ],
            [
                'province_id' => 2,
                'kabupaten_name'  => 'Jayapura',
                'jumlah_penduduk'  => 123342
            ],
            [
                'province_id' => 2,
                'kabupaten_name'  => 'Merauke',
                'jumlah_penduduk'  => 324353
            ],
        ];
        $this->db->table('kabupaten')->insertBatch($data);
    }
}
