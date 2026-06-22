# BMC Komputer - Capstone Project

Aplikasi POS (Point of Sale), Manajemen Stok (Stock In/Out), Katalog Barang, dan Pelaporan Penjualan untuk Toko BMC Komputer Sukawati. Aplikasi ini dibangun menggunakan framework **Laravel 12** dan compiler frontend **Vite**.

---

## Prasyarat (Prerequisites)

Pastikan perangkat Anda sudah terinstal beberapa tools berikut sebelum memulai setup:
- **PHP** (minimal versi 8.2)
- **Composer** (untuk dependensi PHP)
- **Node.js** (minimal versi 18) & **NPM**
- **Git**
- Web Server & Database (seperti **XAMPP / Laragon** jika menggunakan MySQL, atau menggunakan **SQLite** bawaan)

---

## Langkah-Langkah Clone & Setup Project

Ikuti instruksi di bawah ini untuk menjalankan project ini secara lokal di komputer Anda:

### 1. Clone Repositori
Buka terminal/CMD Anda, lalu jalankan perintah clone berikut:
```bash
git clone https://github.com/aryadiwiguna-dev/bmc-komputer.git
cd bmc-komputer
```

### 2. Instal Dependensi
Instal seluruh library PHP dan JavaScript yang diperlukan:

**Instal dependensi Backend (Composer):**
```bash
composer install
```

**Instal dependensi Frontend (NPM):**
```bash
npm install
```

### 3. Setup Environment File
Salin file konfigurasi `.env.example` menjadi `.env`:
```bash
# Untuk Windows (Command Prompt)
copy .env.example .env

# Untuk Windows (PowerShell) atau Linux/macOS
cp .env.example .env
```

### 4. Generate Application Key
Jalankan command berikut untuk men-generate key enkripsi Laravel:
```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Secara default, project ini dikonfigurasi menggunakan **SQLite**. 

#### Opsi A: Menggunakan SQLite (Rekomendasi & Praktis)
1. Buat file database kosong bernama `database.sqlite` di folder `database/` jika belum ada:
   ```bash
   # Di Windows (PowerShell/CMD) atau Git Bash
   touch database/database.sqlite
   ```
2. Pastikan baris database di file `.env` Anda dikonfigurasi seperti berikut:
   ```env
   DB_CONNECTION=sqlite
   ```

#### Opsi B: Menggunakan MySQL
1. Buat database baru di phpMyAdmin/MySQL server Anda dengan nama `bmc_komputer`.
2. Sesuaikan konfigurasi database pada file `.env` Anda seperti berikut:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bmc_komputer
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 6. Jalankan Migrasi & Database Seeder
Lakukan migrasi tabel database dan masukkan data awal (seeders) seperti data pengguna default dan produk contoh:
```bash
php artisan migrate --seed
```

*(Opsional)* Jika Anda ingin melakukan import data produk massal dari file CSV beserta gambarnya, jalankan command custom berikut:
```bash
php artisan import:products
```

### 7. Buat Symbolic Link untuk Storage
Agar file gambar produk yang diunggah dapat diakses dari browser, buat symbolic link ke direktori public:
```bash
php artisan storage:link
```

### 8. Jalankan Aplikasi
Anda dapat menjalankan aplikasi di server lokal menggunakan perintah **Concurrent Dev Server** (menjalankan laravel serve, queue listener, dan vite dev server secara bersamaan):
```bash
composer run dev
```

Atau Anda juga bisa menjalankannya di terminal terpisah secara manual:
- **Terminal 1 (Laravel Server):** `php artisan serve`
- **Terminal 2 (Vite Server):** `npm run dev`

Buka browser Anda dan akses aplikasi melalui link yang tertera di terminal (biasanya `http://127.0.0.1:8000`).

---

## Akun Login Default (Seed Users)

Gunakan akun berikut untuk masuk ke sistem setelah menjalankan perintah `db:seed`:

| Role | Email | Password | Status |
|---|---|---|---|
| **Administrator** | `admin@bmc.com` | `admin123` | Active |
| **Staff Kasir** | `kasir@bmc.com` | `kasir123` | Active |

---

## Struktur Folder Utama
* `/app` - Berisi Controller, Model, dan logic inti PHP.
* `/database` - File migrasi tabel, pabrik data (factories), dan seeders.
* `/resources/views` - Tampilan UI menggunakan Blade Templates.
* `/resources/sass` - Kode styling SASS/CSS.
* `/routes/web.php` - Definisi rute web aplikasi.
