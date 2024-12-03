<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    // Nama tabel yang akan digunakan
    protected $table = 'setting';

    // Kolom-kolom yang dapat diakses atau dimodifikasi
    protected $allowedFields = ['logo', 'nama', 'maps', 'alamattext'];

    // Primary key tabel
    protected $primaryKey = 'id';

    // Menentukan apakah id menggunakan auto increment
    protected $useAutoIncrement = true;

    // Menentukan tipe data untuk id
    protected $returnType = 'array'; // Mengembalikan hasil dalam bentuk array
    protected $useSoftDeletes = false; // Jika menggunakan soft delete, set ke true

    // Menentukan waktu yang digunakan untuk timestamp
    protected $createdField  = 'created_at'; // Jika ada field created_at
    protected $updatedField  = 'updated_at'; // Jika ada field updated_at

  

    // Mengatur pengecekan data dalam tabel (optional)
    protected $skipValidation = false;
}
