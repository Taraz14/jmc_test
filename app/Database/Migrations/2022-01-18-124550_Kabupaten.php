<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kabupaten extends Migration
{
    protected $DBGroup = 'default';
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'kabupaten_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'province_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],

            'kabupaten_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],

            'jumlah_penduduk' => [
                'type' => 'BIGINT',
                'constraint' => 50,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL'
        ]);

        $this->forge->addKey('kabupaten_id', TRUE);
        $this->forge->addKey(['province_id', 'kabupaten_name']);
        $this->forge->addForeignKey('province_id', 'province', 'province_id', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('kabupaten', TRUE);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('kabupaten', TRUE);
    }
}
