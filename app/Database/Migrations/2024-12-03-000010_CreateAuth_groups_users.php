<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthGroupsUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'group' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => false,
            ],
        ]);

        // Menambahkan Primary Key pada kolom 'id'
        $this->forge->addPrimaryKey('id');

        // Menambahkan Index pada kolom 'user_id' untuk foreign key
        $this->forge->addKey('user_id');

        // Membuat tabel 'auth_groups_users'
        $this->forge->createTable('auth_groups_users', true);

        // Menambahkan Foreign Key Constraint
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Menghapus tabel 'auth_groups_users' jika migrasi dibatalkan
        $this->forge->dropTable('auth_groups_users');
    }
}
