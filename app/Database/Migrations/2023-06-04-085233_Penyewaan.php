<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyewaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'penyewaan_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'penyewaan_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                
            ],
            'penyewaan_detail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'penyewaan_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                
            ],
            'penyewaan_status' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'null' => true
            ],
            'penyewaan_gambar' => [
                'type' => 'text'
            ],
            'penyewaan_harga' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
            ],
            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],


        ]);

        $this->forge->addKey('penyewaan_id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id','CASCADE','CASCADE');
        $this->forge->addForeignKey('penyewaan_status', 'status', 'status_id','SET NULL','SET NULL');
        $this->forge->createTable('penyewaan');
    }

    public function down()
    {
        $this->forge->dropTable('penyewaan');
    }
}
