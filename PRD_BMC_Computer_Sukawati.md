### **📝 Template Product Requirements Document (PRD)**

**1\. Ringkasan Proyek (Project Summary)**

* **Nama Produk:** \[Nama web app kamu\]  
* **Visi/Latar Belakang:** \[Apa masalah utama yang ingin diselesaikan oleh web app ini?\]  
* **Target Rilis:** \[Estimasi waktu peluncuran MVP/versi pertama\]

**2\. Pengguna Sasaran (Target Audience)**

* **Profil Pengguna:** \[Siapa pengguna utamanya? Misal: mahasiswa, pengurus kampus, pelaku bisnis, dll.\]  
* **Pain Points:** \[Kesulitan atau tantangan apa yang mereka hadapi saat ini tanpa aplikasi ini?\]

**3\. Tujuan & Metrik Kesuksesan (Objectives & Success Metrics)**

* **Tujuan Utama:** \[Dampak apa yang ingin dicapai? Misal: Mengotomatisasi proses evaluasi, meningkatkan penjualan.\]  
* **Metrik Kesuksesan:** \[Bagaimana cara mengukur keberhasilan web app ini? Misal: 100 pendaftar pertama, waktu penyelesaian tugas turun **50%**.\]

**4\. Ruang Lingkup & Fitur Utama (Scope & Key Features)** Di sinilah kita memecah fitur menjadi *User Stories* agar lebih mudah dipahami secara fungsional.

* **Fitur A (Contoh: Sistem Login)**  
  * *User Story:* Sebagai \[Pengguna\], aku ingin \[Bisa login dengan email\], sehingga \[Data pribadiku aman\].  
* **Fitur B (Contoh: Dashboard)**  
  * *User Story:* Sebagai \[Admin\], aku ingin \[Melihat grafik ringkasan\], sehingga \[Bisa memantau aktivitas harian\].

**5\. Kebutuhan Non-Fungsional (Non-Functional Requirements)**

* **Performa & Skalabilitas:** \[Misal: Halaman harus dimuat di bawah 3 detik, mampu menampung 1000 *concurrent users*.\]  
* **Keamanan:** \[Misal: Menggunakan HTTPS, enkripsi *password*, pembatasan hak akses.\]  
* **Platform:** \[Misal: Web yang responsif untuk tampilan *desktop* dan *mobile browser*.\]

**6\. Pertimbangan Teknis (Technical Considerations)**

* ***Tech Stack*** **Utama:** \[Bahasa pemrograman dan *framework* yang akan digunakan untuk *Frontend*, *Backend*, dan *Database*.\]  
* **Integrasi Pihak Ketiga:** \[Apakah butuh API eksternal seperti *payment gateway*, WhatsApp API, atau layanan email?\]

**7\. Timeline & Fase Peluncuran (Milestones)**

* **Fase 1 (MVP):** \[Fitur-fitur paling esensial yang harus ada di rilis pertama untuk menguji pasar/pengguna.\]  
* **Fase 2 (V2):** \[Fitur tambahan atau penyempurnaan yang akan dikerjakan setelah *feedback* dari MVP terkumpul.\]

**PRODUCT REQUIREMENTS DOCUMENT (PRD)**

**Sistem Informasi Penjualan Berbasis Web**

BMC Computer Sukawati, Bali \- On Progress

# **1\. Ringkasan Proyek (Project Summary)**

| Nama Produk | SiPenjualan BMC Computer Sukawati |
| :---- | :---- |
| Nama Produk | SiPenjualan BMC Computer Sukawati |
| Visi / Latar Belakang | BMC Computer Sukawati merupakan toko komputer dan aksesoris elektronik di Sukawati, Bali, yang masih mengelola proses penjualan secara manual menggunakan catatan buku dan spreadsheet sederhana. Hal ini menyebabkan kesalahan pencatatan stok, lambatnya pembuatan laporan, serta sulitnya memantau data penjualan secara real-time. Proyek ini bertujuan membangun Sistem Informasi Penjualan Berbasis Web yang mengotomasi seluruh proses transaksi, pengelolaan stok barang, dan pelaporan penjualan. |
| Target Rilis (MVP) | 2 bulan sejak awal pengembangan (estimasi Juli 2025\) |

# **2\. Pengguna Sasaran (Target Audience)**

## **2.1 Profil Pengguna**

| Peran | Deskripsi |
| :---- | :---- |
| Admin / Pemilik Toko | Pemilik atau pengelola BMC Computer Sukawati yang bertanggung jawab atas keseluruhan operasional penjualan dan pengelolaan data toko. |
| Kasir / Staff Penjualan | Karyawan toko yang bertugas melayani transaksi penjualan harian kepada pelanggan. |
| Pelanggan (tidak langsung) | Pembeli produk di toko; tidak login ke sistem tetapi data transaksinya tercatat untuk keperluan laporan. |

## **2.2 Pain Points**

* Pencatatan stok barang masih manual (buku tulis/Excel), rawan kesalahan dan kehilangan data.

* Tidak ada notifikasi otomatis ketika stok barang hampir habis.

* Pembuatan laporan penjualan membutuhkan waktu lama karena harus direkap secara manual.

* Sulit melacak riwayat transaksi jika terjadi selisih di kas.

* Tidak ada sistem yang terintegrasi antara data barang masuk, penjualan, dan laporan keuangan.

# **3\. Tujuan & Metrik Kesuksesan (Objectives & Success Metrics)**

## **3.1 Tujuan Utama**

* Mengotomasi proses pencatatan transaksi penjualan di BMC Computer Sukawati.

* Menyediakan sistem manajemen stok barang yang akurat dan real-time.

* Menghasilkan laporan penjualan harian, bulanan, dan tahunan secara otomatis.

* Mempermudah admin dalam memantau performa penjualan melalui dashboard.

## **3.2 Metrik Kesuksesan**

| Metrik | Target Keberhasilan |
| :---- | :---- |
| Waktu input transaksi | Berkurang minimal 50% dibandingkan cara manual |
| Akurasi stok barang | Error stok 0% setelah sistem berjalan 1 bulan |
| Waktu pembuatan laporan | Laporan harian otomatis tersedia dalam \< 10 detik |
| Penggunaan sistem | Seluruh staff toko (min. 2 orang) aktif menggunakan dalam 2 minggu pertama |
| Kepuasan pengguna | Rating kepuasan minimal 4/5 dari admin dan kasir setelah uji coba |

# **4\. Ruang Lingkup & Fitur Utama (Scope & Key Features)**

## **4.1 Manajemen Autentikasi (Login & Hak Akses)**

**User Story:** Sebagai Admin, aku ingin bisa login menggunakan email dan password, sehingga hanya pengguna yang berwenang yang dapat mengakses sistem.

**Detail Fitur:**

* Form login dengan validasi email & password.

* Dua level akses: Admin (akses penuh) dan Kasir (akses transaksi saja).

* Fitur logout dan manajemen sesi.

* Proteksi halaman dengan autentikasi middleware.

## **4.2 Manajemen Data Barang (Produk)**

**User Story:** Sebagai Admin, aku ingin bisa menambah, mengubah, dan menghapus data barang, sehingga informasi produk yang dijual selalu up-to-date.

**Detail Fitur:**

* Form input barang: nama barang, kategori, harga beli, harga jual, stok awal, satuan.

* Tabel daftar barang dengan fitur pencarian dan filter berdasarkan kategori.

* Edit dan hapus data barang.

* Upload foto produk (opsional).

* Notifikasi otomatis jika stok barang di bawah batas minimum yang ditentukan.

## **4.3 Transaksi Penjualan (Point of Sale)**

**User Story:** Sebagai Kasir, aku ingin bisa memproses transaksi penjualan dengan memilih barang dan memasukkan jumlah, sehingga transaksi tercatat otomatis dan stok berkurang secara real-time.

**Detail Fitur:**

* Antarmuka transaksi: pencarian barang, pilih barang, input jumlah.

* Perhitungan total harga otomatis termasuk diskon (jika ada).

* Cetak atau tampilkan struk/nota transaksi.

* Stok barang berkurang otomatis setelah transaksi berhasil.

* Riwayat transaksi: dapat dilihat per tanggal dan per kasir.

## **4.4 Manajemen Stok (Barang Masuk)**

**User Story:** Sebagai Admin, aku ingin mencatat barang yang masuk (restock) ke gudang, sehingga stok barang selalu akurat tanpa perlu hitung manual.

**Detail Fitur:**

* Form input barang masuk: pilih barang, jumlah masuk, tanggal, dan keterangan.

* Stok barang otomatis bertambah setelah barang masuk dicatat.

* Riwayat log barang masuk dapat dilihat dan difilter berdasarkan tanggal.

## **4.5 Dashboard & Laporan**

**User Story:** Sebagai Admin, aku ingin melihat ringkasan penjualan hari ini, total pendapatan, dan grafik penjualan bulanan, sehingga aku bisa memantau performa toko secara cepat.

**Detail Fitur:**

* Dashboard: total penjualan hari ini, total pendapatan, jumlah transaksi, barang hampir habis.

* Grafik penjualan (bar chart): perbandingan penjualan per hari dalam 1 bulan.

* Laporan penjualan: filter berdasarkan rentang tanggal, bisa diekspor ke PDF atau Excel.

* Laporan stok barang: daftar stok terkini seluruh produk.

## **4.6 Manajemen Pengguna (Khusus Admin)**

**User Story:** Sebagai Admin, aku ingin bisa menambah atau menonaktifkan akun kasir, sehingga hak akses sistem tetap terkontrol.

**Detail Fitur:**

* Tambah akun pengguna baru dengan role Admin atau Kasir.

* Edit data pengguna (nama, email, password).

* Nonaktifkan akun tanpa menghapus riwayat transaksinya.

# **5\. Kebutuhan Non-Fungsional (Non-Functional Requirements)**

| Aspek | Kebutuhan |
| :---- | :---- |
| Performa & Skalabilitas | Halaman utama (dashboard) dimuat dalam \< 3 detik. Sistem mampu menangani minimal 5 pengguna aktif bersamaan tanpa penurunan performa. |
| Keamanan | Menggunakan HTTPS. Password pengguna dienkripsi menggunakan bcrypt. Pembatasan akses halaman berdasarkan role (Admin vs Kasir). Proteksi terhadap SQL Injection dan XSS. |
| Ketersediaan | Sistem tersedia minimal 95% uptime selama jam operasional toko (08.00 \- 21.00 WITA). |
| Platform | Berbasis web responsif; dapat diakses melalui desktop browser (Chrome, Firefox) maupun mobile browser. Tidak memerlukan instalasi aplikasi tambahan. |
| Kemudahan Penggunaan | Antarmuka intuitif, dapat dipelajari oleh kasir baru dalam waktu \< 30 menit tanpa pelatihan khusus. |
| Backup Data | Backup database dilakukan secara otomatis setiap hari. |

# **6\. Pertimbangan Teknis (Technical Considerations)**

## **6.1 Tech Stack Utama**

| Layer | Teknologi yang Digunakan |
| :---- | :---- |
| Frontend | HTML5, CSS3, JavaScript – dengan framework Bootstrap 5 untuk tampilan responsif. Opsional: Blade Template (Laravel) atau React.js. |
| Backend | PHP dengan framework Laravel (direkomendasikan) atau Node.js dengan Express.js. |
| Database | MySQL / MariaDB untuk penyimpanan data relasional (barang, transaksi, pengguna, stok). |
| Web Server | Apache atau Nginx (dapat di-deploy di shared hosting atau VPS). |
| Version Control | Git dengan repository di GitHub untuk kolaborasi tim. |

## **6.2 Integrasi Pihak Ketiga**

| Integrasi | Keterangan |
| :---- | :---- |
| Export PDF | Library DomPDF (Laravel) atau jsPDF untuk mencetak laporan dan struk transaksi. |
| Export Excel | Library Maatwebsite/Excel (Laravel) atau SheetJS untuk ekspor laporan ke format .xlsx. |
| Notifikasi Email (Opsional) | Menggunakan SMTP (Gmail / Mailtrap) untuk notifikasi stok menipis ke email admin. |
| Chart / Grafik | Library Chart.js untuk visualisasi data penjualan di dashboard. |

## **6.3 Struktur Database (Tabel Utama)**

| Nama Tabel | Keterangan |
| :---- | :---- |
| users | Menyimpan data akun pengguna: id, nama, email, password (hash), role, status. |
| products | Data barang: id, nama\_barang, kategori, harga\_beli, harga\_jual, stok, stok\_minimum, satuan. |
| transactions | Header transaksi: id, no\_transaksi, tanggal, total\_harga, user\_id (kasir). |
| transaction\_details | Detail item per transaksi: id, transaction\_id, product\_id, jumlah, harga\_satuan, subtotal. |
| stock\_in | Pencatatan barang masuk: id, product\_id, jumlah, tanggal, keterangan, user\_id. |

# **7\. Timeline & Fase Peluncuran (Milestones)**

## **Fase 1 – MVP (Minggu 1-4)**

Fokus: Fitur inti yang wajib ada agar sistem dapat digunakan untuk operasional harian.

* Setup project, struktur database, dan konfigurasi environment pengembangan.

* Implementasi sistem autentikasi (login, logout, manajemen sesi, role).

* Modul manajemen data barang (CRUD produk \+ kategori).

* Modul transaksi penjualan (input transaksi, cetak struk sederhana).

* Modul stok otomatis berkurang saat transaksi.

* Pengujian fungsional dasar (unit test & manual testing).

## **Fase 2 – Pengembangan Lanjutan (Minggu 5-7)**

Fokus: Fitur pendukung, laporan, dan penyempurnaan UX berdasarkan feedback MVP.

* Dashboard dengan statistik penjualan dan grafik Chart.js.

* Modul barang masuk (restock) dan riwayat log stok.

* Laporan penjualan dengan filter tanggal \+ ekspor PDF dan Excel.

* Notifikasi stok minimum (visual di dashboard dan opsional email).

* Manajemen pengguna (tambah/edit/nonaktifkan akun kasir).

* Penyempurnaan tampilan responsive untuk mobile browser.

## **Fase 3 – Finalisasi & Presentasi (Minggu 8\)**

* User Acceptance Testing (UAT) bersama pemilik/staff BMC Computer Sukawati.

* Perbaikan bug dan optimasi performa berdasarkan hasil UAT.

* Deployment ke hosting/server production.

* Penyusunan dokumentasi teknis dan laporan capstone.

* Persiapan dan pelaksanaan presentasi proyek capstone.