# Romay Finance

Aplikasi tracking keuangan pribadi yang dibangun menggunakan Laravel 12 dan Filament v3. Romay Finance membantu Anda mengelola dan memantau keuangan pribadi dengan mudah dan efisien.

## 🚀 Fitur Utama

-   **Dashboard Keuangan**: Visualisasi ringkasan keuangan Anda secara real-time
-   **Manajemen Transaksi**: Catat pemasukan dan pengeluaran dengan mudah
-   **Kategori Kustom**: Buat kategori transaksi sesuai kebutuhan
-   **Laporan Keuangan**: Analisis pengeluaran dan pemasukan dengan laporan detail
-   **Multi Akun**: Kelola beberapa akun/dompet dalam satu aplikasi
-   **Interface Modern**: UI yang clean dan responsif dengan Filament

## 🛠️ Teknologi

-   **Laravel 12**: Framework PHP modern
-   **Filament v3**: Admin panel yang powerful
-   **MySQL/PostgreSQL**: Database
-   **Tailwind CSS**: Styling

## 📋 Persyaratan Sistem

-   PHP >= 8.4
-   Composer
-   MySQL >= 8.0
-   Node.js & NPM (untuk asset compilation)

## 🔧 Instalasi

1. **Clone Repository**

```bash
git clone https://github.com/username/romay-finance.git
cd romay-finance
```

2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Konfigurasi Environment**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi Database**

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=romay_finance
DB_USERNAME=root
DB_PASSWORD=
```

5. **Migrasi Database**

```bash
php artisan migrate --seed
```

6. **Build Assets**

```bash
npm run build
```

7. **Jalankan Aplikasi**

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 👤 Default Login

Setelah seeding, gunakan kredensial berikut untuk login:

-   **Email**: admin@romayfinance.com
-   **Password**: password

> ⚠️ Pastikan untuk mengubah password default setelah login pertama kali!

## 📱 Penggunaan

### Membuat Transaksi Baru

1. Login ke dashboard
2. Navigasi ke menu "Transaksi"
3. Klik tombol "Buat Transaksi Baru"
4. Isi detail transaksi (jumlah, kategori, tanggal, deskripsi)
5. Simpan

### Melihat Laporan

1. Buka menu "Laporan"
2. Pilih periode yang diinginkan
3. Filter berdasarkan kategori atau akun
4. Export laporan jika diperlukan

## 🗂️ Struktur Project

```
romay-finance/
├── app/
│   ├── Filament/          # Filament resources & pages
│   ├── Models/            # Eloquent models
│   ├── Policies/          # Authorization policies
│   └── Services/          # Business logic
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   └── views/             # Blade templates
└── routes/
    └── web.php            # Web routes
```

## 🤝 Kontribusi

Kontribusi selalu diterima! Silakan:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 👨‍💻 Pengembang

Dibuat dengan ❤️ untuk membantu mengelola keuangan pribadi dengan lebih baik.

## 📧 Kontak

Jika ada pertanyaan atau saran, silakan buat issue di repository ini.

---

⭐ Jangan lupa berikan star jika project ini bermanfaat!
