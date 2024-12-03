Tentu, berikut adalah versi yang lebih terstruktur dan menarik dari README yang bisa meningkatkan daya tarik dan kejelasan:

---

# BukuHub - Sistem Perpustakaan QR Code 📚 QR Code Library System

[![Continuous Integration](https://github.com/ikhsan3adi/sistem-perpustakaan-qr-code/actions/workflows/ci.yml/badge.svg)](https://github.com/ikhsan3adi/sistem-perpustakaan-qr-code/actions/workflows/ci.yml)  
*Dikembangkan oleh [Aji Ngamarta Ramadhan](https://github.com/mol3x/Cakrawala)*

![Preview](https://raw.githubusercontent.com/mol3x/Cakrawala/refs/heads/main/screenshots/home.png)

## 📜 Deskripsi Proyek

BukuHub adalah aplikasi web berbasis QR Code yang mengelola perpustakaan dengan berbagai fitur canggih, mulai dari manajemen anggota, peminjaman buku, hingga pengaturan denda. Sistem ini memungkinkan pengelola untuk mempermudah pengelolaan koleksi dan transaksi perpustakaan, serta memberikan kemudahan bagi anggota untuk meminjam buku dengan cepat menggunakan QR Code.

---

## 🚀 Fitur Utama

- **Login & Registrasi**  
  Masuk dengan akun atau link login magic via email.
  
- **Dashboard Admin**  
  Kelola buku, anggota, dan transaksi peminjaman dengan mudah.

- **QR Code Anggota & Peminjaman**  
  Setiap anggota memiliki QR Code untuk mempermudah proses peminjaman buku.

- **Sistem Denda**  
  Perhitungan denda otomatis jika peminjaman melebihi batas waktu.

- **Pencetakan Kartu Anggota & Struk Peminjaman**  
  Dapatkan kartu anggota dan struk peminjaman/pengembalian buku yang siap dicetak.

- **Customisasi Nama, Logo, dan Lokasi Perpustakaan**  
  Mengubah nama perpustakaan, logo, dan lokasi dengan mudah.

- **OPAC (Online Public Access Catalog)**  
  Fitur pencarian buku berdasarkan kategori untuk mempermudah akses informasi.

- **Dan masih banyak lagi!**

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: [CodeIgniter 4](https://codeigniter.com/), [CodeIgniter Shield](https://codeigniter4.github.io/shield/)
- **Frontend**: [Bootstrap 5](https://getbootstrap.com/), [Modernize Admin Template](https://adminmart.com/product/modernize-free-bootstrap-5-admin-template/)
- **Icons**: [Tabler Icons](https://tabler-icons.io/)
- **Charts**: [Apex Charts](https://apexcharts.com/)
- **QR Code**: [Endroid QR Code Generator](https://github.com/endroid/qr-code), [Mebjas HTML5 QR Code Scanner](https://github.com/mebjas/html5-qrcode)
- **Template**: [Classigrids Free Classified Ads](https://graygrids.com/templates/classigrids-free-classified-ads-html-template-ui-kit)

---

## 📝 Cara Instalasi

### Persyaratan Sistem

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut:

- **Composer** (untuk mengelola dependensi PHP) - [Download Composer](https://getcomposer.org/download/)
- **PHP 8.1+** dan **MySQL** (atau menggunakan [XAMPP](https://www.apachefriends.org/download.html) versi 8.1+ dengan extension `intl` dan `gd` aktif).
- **Opsional**: Kamera/webcam untuk menggunakan scanner QR Code. Anda juga bisa menggunakan aplikasi **DroidCam** untuk menghubungkan kamera HP ke komputer.

### Langkah Instalasi

1. **Instal Composer dan Git**  
   - Unduh dan install Composer dari [sini](https://getcomposer.org/download/).
   - Unduh dan install Git dari [sini](https://git-scm.com/downloads).

2. **Clone atau Download Proyek**  
   - Clone atau unduh repositori ini ke dalam folder proyek Anda (misalnya `htdocs`).

3. **Konfigurasi File `.env`**  
   - Salin file `.env.example` menjadi `.env`.
   - Sesuaikan pengaturan seperti koneksi database, nama perpustakaan, dan logo di file `.env`.

4. **Instal Dependensi**  
   - Buka terminal di direktori proyek dan jalankan:
     ```bash
     composer install
     ```
   - Jika terjadi masalah, coba perintah alternatif:
     ```bash
     composer install --ignore-platform-reqs
     ```

5. **Buat Database**  
   - Buat database dengan nama `db_cakrawalay` di phpMyAdmin atau MySQL.

6. **Migrasi Database**  
   - Jalankan migrasi untuk menyiapkan struktur tabel:
     ```bash
     php spark migrate --all
     ```
   - Jalankan seeder untuk mengisi data awal:
     ```bash
     php spark db:seed Seeder
     ```

7. **Jalankan Aplikasi**  
   - Untuk menjalankan server lokal, ketikkan perintah:
     ```bash
     php spark serve
     ```
   - Buka aplikasi di browser melalui [http://localhost:8080](http://localhost:8080).

8. **Login dengan Kredensial Default**  
   - Gunakan akun `superadmin` untuk login pertama kali:
     ```txt
     username : superadmin
     email    : superadmin@admin.com
     password : superadmin
     ```

---

## 🤝 Contributing

Kami sangat menghargai kontribusi dari komunitas! Jika Anda menemukan bug, masalah, atau ingin berkontribusi pada peningkatan fitur, silakan buka [issue](https://github.com/ikhsan3adi/sistem-perpustakaan-qr-code/issues) atau ajukan [pull request](https://github.com/ikhsan3adi/sistem-perpustakaan-qr-code/pulls).

---

## 💸 Donasi

Jika Anda merasa aplikasi ini bermanfaat dan ingin mendukung pengembangannya lebih lanjut, Anda bisa berdonasi melalui:

- [Donate via PayPal](https://paypal.me/xannxett?country.x=ID&locale.x=en_US)
- [Donate via Saweria](https://saweria.co/xiboxann)
- [Donate Aji via Saweria]([Donate via Saweria](https://saweria.co/xiboxann)

---

## 📝 Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](https://github.com/ikhsan3adi/sistem-perpustakaan-qr-code/raw/main/LICENSE).

---

## 👨‍💻 Penulis

- [@ikhsan3adi](https://github.com/ikhsan3adi)
- [@mol3x](https://github.com/mol3x/) / Aji Ngamaarta ramadhan

---

Dengan format ini, README menjadi lebih menarik, informatif, dan mudah dipahami. Pembaca bisa dengan cepat menemukan informasi yang dibutuhkan tanpa kesulitan.
