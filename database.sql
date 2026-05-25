CREATE DATABASE IF NOT EXISTS hizbullah_14936;

USE hizbullah_14936;

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO books (title, author, price) VALUES
('Web Engineering', 'Hizbullah', 1200.00),
('Database Systems', 'Ramez Elmasri', 1500.00),
('PHP and MySQL', 'Luke Welling', 1800.00);
