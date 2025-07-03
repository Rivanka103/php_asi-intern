# PHP Intern Test - Laravel + CLI

Tes magang pemrograman PHP

CLI - Pola X dan O
File: `cli-pattern.php`  
Menampilkan pola X dan O (7x7) ke terminal

Laravel - Employees CRUD

- CRUD karyawan (`/api/employees`)
- Upload gambar → simpan ke `storage/uploads`
- Field `photo_upload_path` berisi URL hasil upload
- Simpan ke Redis: `emp_<nomor>`


Cara Menjalankan:

1. Clone repo
2. Jalankan `composer install`
3. Copy `.env.example` ke `.env`
4. Atur DB + Redis
5. `php artisan migrate`
6. `php artisan storage:link`
7. `php artisan serve`
