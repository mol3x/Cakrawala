<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Data untuk tabel categories
        $data = [
            [
                'name'        => 'Fiksi',
                'created_at'  => '2024-12-02 08:28:45',
                'updated_at'  => '2024-12-02 08:28:45',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Komputer, informasi dan referensi umum',
                'created_at'  => '2024-12-02 10:37:50',
                'updated_at'  => '2024-12-02 10:37:50',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Filsafat dan psikologi',
                'created_at'  => '2024-12-02 10:38:06',
                'updated_at'  => '2024-12-02 10:38:06',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Agama',
                'created_at'  => '2024-12-02 10:38:16',
                'updated_at'  => '2024-12-02 10:38:16',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Ilmu sosial',
                'created_at'  => '2024-12-02 10:38:28',
                'updated_at'  => '2024-12-02 10:38:28',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Bahasa',
                'created_at'  => '2024-12-02 10:38:35',
                'updated_at'  => '2024-12-02 10:38:35',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Sains dan matematika',
                'created_at'  => '2024-12-02 10:38:43',
                'updated_at'  => '2024-12-02 10:38:43',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Teknologi',
                'created_at'  => '2024-12-02 10:38:49',
                'updated_at'  => '2024-12-02 10:38:49',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Kesenian dan rekreasi',
                'created_at'  => '2024-12-02 10:38:58',
                'updated_at'  => '2024-12-02 10:38:58',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Sastra',
                'created_at'  => '2024-12-02 10:39:20',
                'updated_at'  => '2024-12-02 10:39:20',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'Sejarah dan geografi',
                'created_at'  => '2024-12-02 10:39:30',
                'updated_at'  => '2024-12-02 10:39:30',
                'deleted_at'  => null,
            ],
            [
                'name'        => 'komik',
                'created_at'  => '2024-12-04 15:13:01',
                'updated_at'  => '2024-12-04 15:13:12',
                'deleted_at'  => '2024-12-04 15:13:12',
            ],
        ];

        // Menyimpan data ke tabel categories
        $this->db->table('categories')->insertBatch($data);
    }
}
