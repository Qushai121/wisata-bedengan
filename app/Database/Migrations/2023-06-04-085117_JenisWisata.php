<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jeniswisata extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'jeniswisata_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'wisata_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'wisata_thumbnail' => [
                'type'       => 'text',
            ],
            'wisata_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'wisata_detail' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'wisata_status' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'null' => true
            ],
            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addForeignKey('user_id', 'user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('wisata_status', 'status', 'status_id', 'SET NULL', 'SET NULL');
        $this->forge->addKey('jeniswisata_id', true);
        $this->forge->createTable('jeniswisata');
    }

    public function down()
    {
        $this->forge->dropTable('jeniswisata');
    }
}
