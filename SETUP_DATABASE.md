# Setup Database untuk Laragon

## Langkah 1: Buat Database MySQL

1. Buka **Laragon**
2. Klik **Menu** → **Database** → **Open HeidiSQL** (atau phpMyAdmin)
3. Buat database baru dengan nama: `klinik`

Atau gunakan terminal MySQL:
```sql
CREATE DATABASE klinik CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## Langkah 2: Verifikasi Konfigurasi .env

Pastikan file `.env` memiliki konfigurasi berikut:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klinik
DB_USERNAME=root
DB_PASSWORD=
```

## Langkah 3: Jalankan Migrasi

```bash
php artisan migrate
```

## Langkah 4: Seed Data Sample

```bash
php artisan db:seed
```

Jika ada error koneksi, pastikan:
- MySQL service berjalan di Laragon (Status hijau)
- Database `klinik` sudah dibuat
- Username dan password MySQL sesuai

