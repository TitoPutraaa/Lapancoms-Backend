<h1 align="center">🏘️Backend CMS Desa Wisata</h1>

Backend service untuk Content Management System (CMS) Desa Wisata, yang digunakan untuk mengelola konten website seperti blog, galeri, landing page, serta manajemen admin dengan sistem role-based access.
Project ini dikembangkan sebagai bagian dari Project Akademik Program Studi Teknologi Rekayasa Perangkat Lunak, Semester 3 – Politeknik Negeri Bali.

## 📌 Deskripsi Singkat

⚙️Backend ini bertanggung jawab untuk:
Menyediakan REST API untuk frontend
Mengelola autentikasi & otorisasi admin
Mengatur konten blog, galeri, dan landing page
Menyimpan dan mengelola data menggunakan database relasional (MySQL)

🧑 Sistem memiliki 3 jenis aktor:
Public → hanya melihat konten
Admin → mengelola konten miliknya sendiri
Super Admin → mengelola seluruh konten dan admin

## 🪶Fitur Utama

🔐 Autentikasi & Role

-   Login Admin & Super Admin
-   Pembatasan akses berdasarkan role

📝 Manajemen Konten

-   Creat, Read, Delate Blog (menggunakan beberapa template)
-   Upload & hapus Galeri
-   Pengaturan visibilitas konten

🖥️ Landing Page Management

-   Update teks Home, About, Map, Footer
-   Update link sosial media

👤 Manajemen Admin (Super Admin)

-   Tambah admin baru
-   Hapus admin
-   Validasi data admin
