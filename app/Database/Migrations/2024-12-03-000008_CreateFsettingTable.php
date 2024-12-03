<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingTable extends Migration
{
    public function up()
    {
        // Membuat field untuk tabel setting
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'logo' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'maps' => [
                'type'           => 'TEXT',
                'null'           => false,
                'charset'        => 'utf8mb4',
                'collation'      => 'utf8mb4_0900_ai_ci',
            ],
            'alamattext' => [
                'type'           => 'VARCHAR',
                'constraint'     => 250,
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL',
            'deleted_at TIMESTAMP NULL',
        ]);

        // Menambahkan primary key untuk kolom id
        $this->forge->addPrimaryKey('id');

        // Membuat tabel
        $this->forge->createTable('setting', true);
    }

    public function down()
    {
        // Menghapus tabel setting jika rollback migrasi
        $this->forge->dropTable('setting');
    }
}
