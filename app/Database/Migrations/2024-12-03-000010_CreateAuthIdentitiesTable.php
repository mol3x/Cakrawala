<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthIdentitiesTable extends Migration
{
    public function up()
    {
        // Membuat tabel 'auth_identities'
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'type'        => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'name'        => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'secret'      => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'secret2'     => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'expires'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'extra'       => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'force_reset' => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'last_used_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        // Menambahkan primary key dan index
        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addUniqueKey(['type', 'secret']); // Unique key untuk kombinasi type dan secret
        $this->forge->addKey('user_id'); // Index untuk user_id
        
        // Membuat tabel
        $this->forge->createTable('auth_identities');
    }

    public function down()
    {
        // Menghapus tabel 'auth_identities'
        $this->forge->dropTable('auth_identities');
    }
}
