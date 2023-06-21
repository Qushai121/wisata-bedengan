<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'foto' => [
                'type' => "text"
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'    => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'    => true
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'role_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'default' => 1,
                'null' => true
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ]
        ]);

        $this->forge->addKey('user_id', true);
        $this->forge->addForeignKey('role_id', 'role', 'role_id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
