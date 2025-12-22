# 🚀 INSTALASI LENGKAP - Perbaiki Livewire

Ikuti langkah-langkah ini **BERURUTAN**:

## ✅ Langkah 1: Install Composer Dependencies

```bash
composer install
```

**ATAU jika error, install Livewire secara manual:**
```bash
composer require livewire/livewire
```

## ✅ Langkah 2: Install NPM Dependencies

```bash
npm install
```

## ✅ Langkah 3: Clear Semua Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan optimize:clear
```

## ✅ Langkah 4: Build Assets Vite

**Opsi A - Production Build:**
```bash
npm run build
```

**Opsi B - Development Mode (disarankan untuk development):**
```bash
npm run dev
```
*Biarkan terminal ini berjalan di background*

## ✅ Langkah 5: Pastikan Database Sudah Dibuat

1. Buka Laragon
2. Buat database `klinik` via HeidiSQL atau phpMyAdmin
3. Atau jalankan di terminal MySQL:
   ```sql
   CREATE DATABASE klinik;
   ```

## ✅ Langkah 6: Jalankan Migrasi

```bash
php artisan migrate
php artisan db:seed
```

## ✅ Langkah 7: Start Laravel Server

```bash
php artisan serve
```

## ✅ Langkah 8: Akses Dashboard

Buka browser: **http://localhost:8000/dashboard**

**PENTING:** 
- Jika menggunakan `npm run dev`, pastikan Vite dev server juga berjalan
- Hard refresh browser dengan **Ctrl + Shift + R** atau **Ctrl + F5**

---

## ❌ Jika Masih Error:

1. **Cek apakah Livewire terinstall:**
   ```bash
   composer show livewire/livewire
   ```

2. **Pastikan file vendor/livewire ada:**
   ```bash
   dir vendor\livewire
   ```

3. **Cek browser console (F12)** untuk error JavaScript

4. **Pastikan Vite dev server running** jika pakai `npm run dev`:
   - Terminal harus menunjukkan: `VITE v7.x.x  ready in xxx ms`

