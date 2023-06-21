<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FasilitasUmum extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'fasilitasumum_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fasilitasumum_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',

            ],
            'fasilitasumum_detail' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'fasilitasumum_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'fasilitasumum_status' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'null' => true

            ],
            'fasilitasumum_gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],


        ]);

        $this->forge->addKey('fasilitasumum_id', true);
        $this->forge->addForeignKey('user_id', 'user', 'user_id','CASCADE','CASCADE');
        $this->forge->addForeignKey('fasilitasumum_status', 'status', 'status_id','SET NULL','SET NULL');
        $this->forge->createTable('fasilitasumum');
    }

    public function down()
    {
        $this->forge->dropTable('fasilitasumum');
    }
}
