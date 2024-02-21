# Sistem Rental Mobil
![Logo](https://raw.githubusercontent.com/hudaputrasantosa/sewa-mobil-app/main/public/assets/img/usecase.png)

## ⚡ Deskripsi
Sewa App merupakan aplikasi yang ditawarkan dengan tujuan untuk memberikan solusi manajemen dan layanan untuk penyewaan rental mobil.

## ✨ Fitur
### Penyewa
- Autentikasi dan authorisasi pengguna
- homepage pelanggan
- pencarian data mobil
- penyewaan dan pengembalian mobil
- Logout dan setting account

### Admin
- Autentikasi dan authorisasi pengguna
- dashbor pengelola data mobil admin
- dashbor melihat data mobil yang disewa admin
- Logout dan setting account

## ✅ Requirement and tools
 - PHP min 8.1
 - MariaDB/MySQL
 - Laravel 10
 - Tailwind
 - Datatables
 - Jquery
 - Exalidraw

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


