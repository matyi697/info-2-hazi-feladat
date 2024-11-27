-- Adatbázis létrehozása
DROP DATABASE IF EXISTS ButorlapSzabaszat;
CREATE DATABASE ButorlapSzabaszat;
USE ButorlapSzabaszat;

-- Felhasználók tábla
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

-- Bútorlapok tábla
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    stock INT NOT NULL
);

-- Rendelések tábla
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (name, email, password, role) VALUES
('Admin Felhasználó', 'admin@example.com', 'admin123hashed', 'admin'),
('Teszt Felhasználó', 'user1@example.com', 'user123hashed', 'user'),
('Másik Felhasználó', 'user2@example.com', 'user456hashed', 'user');

INSERT INTO products (name, price, description, stock) VALUES
('Tölgy Bútorlap', 12000.50, 'Prémium minőségű tölgyfa bútorlap.', 50),
('Fenyő Bútorlap', 8000.00, 'Könnyű és tartós fenyő bútorlap.', 100),
('Dió Bútorlap', 15000.75, 'Elegáns diófa bútorlap.', 30);

INSERT INTO orders (user_id, product_id, quantity, status) VALUES
(2, 1, 2, 'completed'),
(3, 2, 5, 'pending'),
(2, 3, 1, 'cancelled');

SELECT * FROM orders;
SELECT * FROM users;
SELECT * FROM products;
