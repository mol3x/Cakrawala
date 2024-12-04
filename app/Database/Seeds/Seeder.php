<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder as DatabaseSeeder;
use CodeIgniter\Model;

class Seeder extends DatabaseSeeder
{
    public function run()
    {
        $superadminExists = (new Model)
            ->setTable('auth_groups_users')
            ->where('group', 'superadmin')
            ->first();

        if (!$superadminExists) {
            // run superadmin seeder
            $this->call('SuperAdminSeeder');
        }

        // run category, rack, book & bookstock seeder
        $this->call('SettingSeeder');

        $this->call('CategoriesSeeder');

    }
}
