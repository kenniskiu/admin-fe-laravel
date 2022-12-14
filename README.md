<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Instalasi
#### Via Git
```bash
git clone https://github.com/muhamadAzis32/admin-kampusgratis.git
```

### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:

```bash
composer install
```

Copy file .env dari .env.example
```bash
cp .env.example .env
```



Generate key
```bash
php artisan key:generate
```
<!--
Migrate database
```bash
php artisan migrate
```
-->

Seeder table 
```bash
php artisan db:seed
```

Menjalankan aplikasi
```bash
php artisan serve
```

## Ketentuan Nama Branch
>- **main** →  untuk productions
>- **development** → untuk staging
>- **feature/feature-name* ** → untuk membuat fitur baru atau mengerjakan task (card) baru 
>- **issue/issue-name* ** → untuk memperbaiki issue/permasalahan/kekurangan dari code yang sudah dikerjakan
>- **bugfix/bug-name* ** → untuk mengatasi bug yang muncul dari code yang sudah dikerjakan
