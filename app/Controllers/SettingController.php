<?php

namespace App\Controllers;

use App\Models\SettingModel;

class SettingController extends BaseController
{
    protected SettingModel $SettingModel;

    public function __construct()
    {
        $this->SettingModel = new SettingModel;

        helper('upload');
    }
    // Menampilkan data setting
    public function index()
    {
        $model = new SettingModel();

        // Ambil data pertama dari tabel setting
        $setting = $model->first(); 

        // Kirim data ke view
        return view('/setting/index', ['setting' => $setting]);
    }

    // Menampilkan form untuk mengubah data
    public function edit($id)
    {
        $model = new SettingModel();

        // Ambil data berdasarkan ID
        $setting = $model->find($id);

        if (!$setting) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Setting dengan ID $id tidak ditemukan");
        }

        // Kirim data ke view
        return view('/setting/edit', ['setting' => $setting]);
    }

    // Proses perubahan data setting
    public function update($id)
    {
        $setting = $this->SettingModel->where('id', $id)->first();

        // Validasi inputan
        if (!$this->validate([
            'logo' => 'is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/gif,image/png,image/webp,image/svg+xml]|max_size[logo,25048]',
            'nama' => 'permit_empty|string|max_length[255]',
            'maps' => 'permit_empty|string|',
            'alamattext' => 'permit_empty|string'
        ])) {
            // Jika validasi gagal, set flashdata untuk menampilkan error
            session()->setFlashdata('msg', 'Update gagal: ' . implode(', ', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'maps' => $this->request->getPost('maps'),
            'alamattext' => $this->request->getPost('alamattext'),
        ];

        // Proses upload logo baru jika ada
        $logo = $this->request->getFile('logo');
        $logoName = $setting['logo']; // Default ke logo lama

        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            // Gunakan nama berdasarkan 'nama' ditambah '_logo' dan ekstensi file
            $logoName =  $this->request->getPost('nama') . '_logo.' . $logo->getExtension();

            // Cek jika ada logo lama dan hapus
            if (!empty($setting['logo']) && file_exists('uploads/logo/' . $setting['logo'])) {
                if (!unlink('uploads/logo/' . $setting['logo'])) {
                    session()->setFlashdata('msg', 'Failed to delete old logo');
                    return redirect()->back()->withInput();
                }
            }

            // Pindahkan logo baru ke direktori
            if (!$logo->move('uploads/logo/', $logoName)) {
                session()->setFlashdata('msg', 'Failed to upload new logo');
                return redirect()->back()->withInput();
            }
        }

        // Menambahkan logo ke data yang akan diupdate
        $data['logo'] = $logoName;

        // Simpan data yang diupdate
        if (!$this->SettingModel->update($id, $data)) {
            session()->setFlashdata('msg', 'Update failed');
            return redirect()->back()->withInput();
        }

        session()->setFlashdata('msg', 'Update setting successful');
        return redirect()->to('admin/setting');
    }
}