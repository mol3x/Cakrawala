<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        // Data untuk tabel setting
        $data = [
            'logo'        => 'Cakrawala_logo.svg',
            'nama'        => 'Cakrawala',
            'maps'        => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6670313867517!2d110.43564185500144!3d-7.048356956136295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c0230b5b061%3A0xfef333e5f3860212!2sLibrary%20and%20UNDIP%20Press!5e0!3m2!1sen!2sid!4v1732886727427!5m2!1sen!2sid', // bisa diganti dengan map dalam format sesuai keinginan
            'alamattext'  => 'Komplek Gedung Widya Puraya Jl. Prof. Soedarto No.13, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275',
        ];

        // Menyimpan data ke tabel setting
        $this->db->table('setting')->insert($data);
    }
}
