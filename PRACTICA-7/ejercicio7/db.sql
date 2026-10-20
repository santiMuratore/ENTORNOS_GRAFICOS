CREATE DATABASE Compras;
USE Compras;

CREATE TABLE catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9,2) NOT NULL
);

INSERT INTO catalogo (producto, precio) VALUES ('Teclado Mecánico', 45.50), ('Mouse Óptico', 18.00), ('Monitor 24"', 150.75);