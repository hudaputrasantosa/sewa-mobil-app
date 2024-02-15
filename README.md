# Sistem Rental Mobil
![Logo](https://raw.githubusercontent.com/hudaputrasantosa/sewa-mobil-app/main/public/assets/img/usecase.png)

## ⚡ Deskripsi
Sewa App merupakan aplikasi yang ditawarkan bertujuan untuk memberikan solusi manajemen dan layanan untuk penyewaan rental mobil.

## ✨ Fitur

- Autentikasi dan authorisasi pengguna
- homepage pelanggan
- dashbor admin

## ✅ Requirement and tools
 - PHP min 8.1
 - MariaDB/MySQL
 - Laravel 10

## 🔥 Install & running local dev
Clone Repository

```bash
git clone https://github.com/hudaputrasantosa/sewa-mobil-app.git
cd sewa-mobil-app
```
Copy .env from .env.example
```bash
cp .env.example .env
```
Installation from Composer
```bash
composer Install
```
Generate Key
```bash
php artisan key:generate
```
Create migration table and data
```bash
php artisan migrate --seed
```
Running Laravel
```bash
php artisan serve
```


