## Instalation

### Clone Project

Clone project di path yang diinginkan

### Buat Database

Buat database untuk project ini

### Buat Env file

Duplikat file .env.example dan ubah nama file menjadi .env
Kemudian sesuaikan database credential dengan database yang telah dibuat
misal:
DB_DATABASE=test-app
DB_USERNAME=root
DB_PASSWORD=1234

### Install

Masuk ke folder project yang telah di clone, lalu jalankan code berukut di terminal:

```
$ composer install
$ php artisan key:generate
$ php artisan migrate --seed
```

### Import Table obat dan signa

Import file sql 'obatalkes_m' dan 'signa_m' pada database yang telah dibuat

### Menjalankan aplikasi

Masuk ke folder project, lalu jalankan code berukut di terminal:

```
$ php artisan serve
```

dan aplikasi berjalan di http://localhost:8000