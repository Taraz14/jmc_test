<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Province extends Migration
{
    protected $DBGroup = 'default';
    public function up()
    {
        $this->forge->addField([
            'province_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'province_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL',
            'updated_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL'
        ]);

        $this->forge->addKey('province_id', TRUE);
        $this->forge->addUniqueKey('province_name');
        $this->forge->createTable('province', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('province', TRUE);
    }
}
