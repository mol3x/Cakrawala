<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        // Membuat tabel 'settings'
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'class'     => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'key'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'value'     => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'type'      => [
                'type'       => 'VARCHAR',
                'constraint' => 31,
                'default'    => 'string',
            ],
            'context'   => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at'=> [
                'type' => 'DATETIME',
            ],
            'updated_at'=> [
                'type' => 'DATETIME',
            ],
        ]);
        
        // Menambahkan primary key pada kolom 'id'
        $this->forge->addKey('id', true); // Primary Key
        
        // Membuat tabel 'settings'
        $this->forge->createTable('settings');
    }

    public function down()
    {
        // Menghapus tabel 'settings'
        $this->forge->dropTable('settings');
    }
}
