# E-Survei Kampus UNSERA

Sistem survei kepuasan akademik berbasis web untuk Universitas Serang Raya (UNSERA). Aplikasi ini memungkinkan mahasiswa dan dosen mengisi survei kepuasan kampus, serta admin melihat dan menganalisis hasil survei.

## Fitur

- **Mahasiswa & Dosen** — mengisi survei kepuasan kampus dengan skala penilaian 1–5
- **Admin** — melihat hasil survei dalam bentuk tabel dan grafik (Chart.js)
- **Manajemen Pertanyaan** — admin dapat memperbarui pertanyaan survei
- **Autentikasi** — login dan registrasi dengan validasi peran (mahasiswa / dosen / admin)

## Teknologi

| Kategori | Teknologi |
|---|---|
| Backend | PHP (native MVC) |
| Database | MySQL |
| Frontend | Bootstrap 5, Plus Jakarta Sans |
| Chart | Chart.js |
| Icon | Font Awesome 6 |
| Alert | SweetAlert2 |

## Struktur Direktori

```
e-survey/
├── app/
│   ├── config/         # Koneksi database
│   ├── controller/     # Logic autentikasi & survei
│   ├── model/          # Model update pertanyaan
│   └── views/          # Tampilan (login, survei, admin)
│       ├── admin/
│       ├── dosen/
│       └── mahasiswa/
├── database/
│   └── kampus-e-survey.sql
├── public/
│   ├── css/            # Design system (style.css)
│   ├── js/
│   └── picture/
└── uml/                # Diagram use case & ERD
```

## Instalasi

1. Clone repositori ini ke direktori web server (contoh: `C:\laragon\www\`)
2. Import database:
   ```
   mysql -u root -e "CREATE DATABASE \`kampus-e-survey\`;"
   mysql -u root kampus-e-survey < database/kampus.sql
   ```
3. Sesuaikan `BASE_URL` di `app/views/header.php` dengan URL lokal Anda
4. Akses aplikasi melalui browser: `http://localhost/e%20survey/app/views/login.php`

## Peran Pengguna

| Peran | Akses |
|---|---|
| Mahasiswa | Login, isi survei kepuasan kampus |
| Dosen | Login, isi survei evaluasi akademik |
| Admin | Dashboard, tabel hasil, grafik, kelola pertanyaan |
