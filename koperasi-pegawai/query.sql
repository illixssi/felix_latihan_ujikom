CREATE DATABASE koperasi_pegawai;
USE koperasi_pegawai;
CREATE TABLE customer (
    id_customer INT AUTO_INCREMENT PRIMARY KEY,
    nama_customer VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    telp VARCHAR(20) NOT NULL,
    fax VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL
);
CREATE TABLE level (
    id_level INT AUTO_INCREMENT PRIMARY KEY,
    level VARCHAR(20) NOT NULL
);
CREATE TABLE petugas (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama_user VARCHAR(100) NOT NULL,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_level INT NOT NULL,
    FOREIGN KEY (id_level) REFERENCES level(id_level)
);
CREATE TABLE manager (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama_user VARCHAR(100) NOT NULL,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_level INT NOT NULL,
    FOREIGN KEY (id_level) REFERENCES level(id_level)
);
CREATE TABLE sales (
    id_sales INT AUTO_INCREMENT PRIMARY KEY,
    tgl_sales DATE NOT NULL,
    id_customer INT NOT NULL,
    do_number VARCHAR(32) NOT NULL UNIQUE,
    status ENUM('Pending', 'Completed', 'Cancelled') NOT NULL,
    FOREIGN KEY (id_customer) REFERENCES customer(id_customer)
);
CREATE TABLE item (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    nama_item VARCHAR(100) NOT NULL,
    uom VARCHAR(20) NOT NULL,
    harga_beli DECIMAL(10, 2) NOT NULL,
    harga_jual DECIMAL(10, 2) NOT NULL
);
CREATE TABLE transaction (
    id_transaction INT AUTO_INCREMENT PRIMARY KEY,
    id_sales INT NOT NULL,
    id_item INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_sales) REFERENCES sales(id_sales),
    FOREIGN KEY (id_item) REFERENCES item(id_item)
);
CREATE TABLE transaction_temp (
    id_transaction INT AUTO_INCREMENT PRIMARY KEY,
    id_sales INT NOT NULL,
    id_item INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    session_id VARCHAR(50) NOT NULL,
    remark VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_sales) REFERENCES sales(id_sales),
    FOREIGN KEY (id_item) REFERENCES item(id_item)
);