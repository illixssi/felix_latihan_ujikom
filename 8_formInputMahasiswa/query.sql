CREATE DATABASE db_mhs;

CREATE TABLE mahasiswa (
    no INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15) NOT NULL,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(10) NOT NULL,
    jurusan VARCHAR(50) NOT NULL
);