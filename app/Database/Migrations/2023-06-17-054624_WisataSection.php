<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WisataSection extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'wisatasection_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'wisatasection_gambar' => [
                'type'           => 'text',
            ],

            'wisatasection_judul' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            
            'wisatasection_deskripsi' => [
                'type'           => 'text',
            ],
            
            'wisatasection_detail' => [
                'type'           => 'text',
            ],

            'jeniswisata_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],

            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],

        ]);

        $this->forge->addKey('wisatasection_id',true);
        $this->forge->addForeignKey('jeniswisata_id', 'jeniswisata', 'jeniswisata_id','CASCADE','CASCADE');
        $this->forge->addForeignKey('user_id', 'jeniswisata', 'user_id','CASCADE','CASCADE');
        $this->forge->createTable('wisatasection');
    }

    public function down()
    {
        $this->forge->dropTable('wisatasection');
    }
}
