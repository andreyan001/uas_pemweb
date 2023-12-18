CREATE TABLE Lagu (
    id_peserta INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255),
    usia INT,
    asal_kota VARCHAR(255),
    jenis_kelamin VARCHAR(10),
    cabang_lomba VARCHAR(10)
    tanggal_daftar DATE,
);

INSERT INTO Peserta (nama, usia, asal_kota, jenis_kelamin, cabang_lomba, tanggal_daftar) VALUES
    ('Alfi', 18, 'Lampung', 'Laki-Laki', 'Lari', '2023-11-10'),
    ('Bryan', 19, 'Jakarta', 'Laki-Laki', 'Lari', '2023-11-10'),
    ('Viony', 18, 'Jakarta', 'Perempuan', 'Renang', '2023-11-11'),
    ('Gusti', 18, 'Bali', 'Peeempuan', 'Renang', '2023-11-12');