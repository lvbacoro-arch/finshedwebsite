-- schema.sql
-- Run this file to create the `shop` database and required tables.

CREATE DATABASE IF NOT EXISTS shop;
USE shop;

CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS cart_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  total_amount DECIMAL(12,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Sample data (optional)
INSERT INTO products (name, price, stock) VALUES
('Laptop', 500.00, 10),
('Phone', 300.00, 5);

-- Parts table for more detailed inventory records
CREATE TABLE IF NOT EXISTS parts (
  part_id INT PRIMARY KEY,
  part_name VARCHAR(255) NOT NULL,
  category VARCHAR(100) NOT NULL,
  manufacturer VARCHAR(100),
  model_number VARCHAR(100),
  specs TEXT,
  price DECIMAL(10,2) NOT NULL,
  stock_quantity INT NOT NULL DEFAULT 0,
  release_date DATE
);

-- Seed parts with the provided data
INSERT INTO parts (part_id, part_name, category, manufacturer, model_number, specs, price, stock_quantity, release_date) VALUES
(1, 'Ryzen 7 7800X', 'CPU', 'AMD', '7800X', '8-core, 16-thread, 4.5GHz', 399.99, 10, '2023-03-15'),
(2, 'GeForce RTX 4070', 'GPU', 'NVIDIA', '4070', '12GB GDDR6X', 599.99, 5, '2023-04-20'),
(3, 'Corsair Vengeance 16GB', 'RAM', 'Corsair', 'CMK16GX4M2', 'DDR4, 3200MHz', 79.99, 25, '2022-11-10');
