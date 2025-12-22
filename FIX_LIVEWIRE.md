# Cara Memperbaiki Livewire yang Tidak Render

Ikuti langkah-langkah berikut untuk memperbaiki masalah Livewire:

## Langkah 1: Install Livewire

Jalankan perintah berikut di terminal:

```bash
composer require livewire/livewire
```

## Langkah 2: Publish Livewire Config (Optional)

```bash
php artisan livewire:publish --config
```

## Langkah 3: Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## Langkah 4: Install NPM Dependencies & Build Assets

```bash
npm install
npm run build
```

ATAU untuk development mode:

```bash
npm run dev
```

## Langkah 5: Restart Server

Stop server Laravel (Ctrl+C) dan jalankan lagi:

```bash
php artisan serve
```

## Langkah 6: Refresh Browser

Buka browser dan refresh halaman dengan **Ctrl + F5** (hard refresh) atau **Ctrl + Shift + R**

---

## Jika Masih Tidak Berfungsi

1. **Cek apakah Livewire terinstall:**
   ```bash
   composer show livewire/livewire
   ```

2. **Pastikan vendor folder ada:**
   ```bash
   composer install
   ```

3. **Cek browser console** (F12) untuk error JavaScript

4. **Pastikan Vite dev server berjalan** jika menggunakan `npm run dev`

