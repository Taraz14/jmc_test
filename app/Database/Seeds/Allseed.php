<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Allseed extends Seeder
{
    public function run()
    {
        $this->call('Province');
        $this->call('Kabupaten');
    }
}
