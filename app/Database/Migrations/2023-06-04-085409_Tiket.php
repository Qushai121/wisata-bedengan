<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tiket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tiket_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tiket_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                
            ],
            'tiket_harga' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                
            ],
            'tiket_promo' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
            ],
           

        ]);

        $this->forge->addKey('tiket_id', true);
        $this->forge->createTable('tiket');
    }

    public function down()
    {
        $this->forge->dropTable('tiket');
    }
}
