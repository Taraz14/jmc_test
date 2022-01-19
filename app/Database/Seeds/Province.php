<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Province extends Seeder
{
    public function run()
    {
        $data = [
            [
                'province_name'  => 'Papua Barat'
            ],
            [
                'province_name'  => 'Papua'
            ],
        ];
        $this->db->table('province')->insertBatch($data);
    }
}
