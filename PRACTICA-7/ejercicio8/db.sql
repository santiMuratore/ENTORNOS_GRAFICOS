CREATE DATABASE prueba;
USE prueba;

CREATE TABLE buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(255) NOT NULL
);

INSERT INTO buscador (canciones) VALUES ('Bohemian Rhapsody'), ('Stairway to Heaven'), ('Hotel California'), ('Imagine'), ('Smells Like Teen Spirit');