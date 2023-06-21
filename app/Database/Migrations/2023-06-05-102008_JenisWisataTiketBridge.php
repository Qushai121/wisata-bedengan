<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisWisataTiketBridge extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'bridge_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            
            'jeniswisata_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],

            'tiket_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],

        ]);
        
        $this->forge->addKey('bridge_id', true);
        $this->forge->addForeignKey('jeniswisata_id', 'jeniswisata', 'jeniswisata_id','CASCADE','CASCADE');
        $this->forge->addForeignKey('tiket_id', 'tiket', 'tiket_id','CASCADE','CASCADE');
        $this->forge->createTable('JenisWisataTiketBridge');
    }
    
    public function down()
    {
        $this->forge->dropTable('JenisWisataTiketBridge');
        //
    }
}
