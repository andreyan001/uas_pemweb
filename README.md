Bagian 1: Client-side Programming
1.1. Untuk membuat halaman tampilan table data penjualan gadget dengan CRUD, kita perlu membuat form input dan menampilkan data menggunakan tag `<table>` pada halaman index.
1.2. Implementasikan event untuk menghandle interaksi pada halaman web, seperti event pada form input.

Bagian 2: Server-side Programming
2.1. Implementasikan script PHP pada file create, edit, dan delete untuk mengelola data dari formulir di atas menggunakan `$_POST` dan `$_GET`.
2.2. Buat objek PHP berbasis OOP (`Connection` dan `Lagu` yang turunan dari `Connection`) untuk mengelola koneksi ke database dan operasi CRUD.

Bagian 3: Database Management
3.1. Buat tabel pada MySQL dengan syntax basisdata:
   ```sql
CREATE TABLE Peserta (
    id_peserta INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255),
    usia INT,
    asal_kota VARCHAR(255),
    jenis_kelamin VARCHAR(10),
    cabang_lomba VARCHAR(10)
    tanggal_daftar DATE,
);
INSERT INTO Peserta (nama, usia, asal_kota, jenis_kelamin, cabang_lomba, tanggal_daftar) VALUES
   -- Data sample di sini...

3.2. Konfigurasikan koneksi ke database MySQL pada file `classConnection`.
3.3. Lakukan manipulasi data pada tabel database dengan query SQL dalam form CRUD menggunakan `$_POST` dan `$_GET`.

Bagian 4: State Management
4.1. Gunakan session PHP untuk menyimpan state pengguna ke dalam variabel global `$_SESSION`.
4.2. Terapkan manajemen status (state) dengan memanfaatkan cookie dan penyimpanan lokal pada sisi klien menggunakan JavaScript. Sertakan skrip khusus di halaman indeks untuk pengelolaan data status yang efektif dan responsif.

Bagian Bonus: Hosting Aplikasi Web
-> Langkah-langkah hosting aplikasi web:
   1. Pilih penyedia hosting gratis.
   2. Daftar dan login.
   3. Buat website dan database.
   4. Atur cpanel.

-> Pilihan penyedia hosting: 000webhost.
   - Alasan: Gratis, optimal untuk proyek kecil, panel kontrol sederhana, pendaftaran cepat.
-> Keamanan aplikasi web:
   - Menggunakan HTTPS untuk enkripsi data.
-> Konfigurasi server:
   - Mengkonfigurasi versi PHP sesuai kebutuhan.
