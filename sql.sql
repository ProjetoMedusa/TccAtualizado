CREATE DATABASE cadastro_db;

USE cadastro_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    birthdate DATE NOT NULL,
    location VARCHAR(100) NOT NULL
);
