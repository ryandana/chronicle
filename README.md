# README.md — Setup singkat

Panduan singkat langkah demi langkah untuk menjalankan proyek Laravel ini. Asumsikan Anda sudah punya PHP, Composer, dan database.

## 1. Clone repo
```
git clone <repo-url>
cd <repo-folder>
```

## 2. Salin file environment
```
cp .env.example .env
```
Edit `.env` untuk konfigurasi database dan layanan lain.

## 3. Install dependensi PHP
```
composer install
```

## 4. Set izin folder
```
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## 5. Generate app key
```
php artisan key:generate
```

## 6. Jalankan migrasi database
```
php artisan migrate
```

## 7. Buat symbolic link storage
```
php artisan storage:link
```

## 8. Install Filament
```
composer require filament/filament
php artisan filament:install
```

## 9. Jalankan aplikasi
```
php artisan serve
```
