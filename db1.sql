-- Create the database
CREATE DATABASE IF NOT EXISTS online_bookstore;
USE online_bookstore;

-- Create table for books
CREATE TABLE IF NOT EXISTS books (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Insert sample books
INSERT INTO books (title, author, price) VALUES
('C++ Programming Language, 4e', 'Bjarne Stroustrup', 2250),
('Python Crash Course, 3rd Edition', 'MATTHES ERIC', 1150),
('Hands-On Machine Learning', 'Aurélien Géron', 1300),
('JavaScript: The Good Parts', 'Douglas Crockford', 900),
('Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 1500),
('Introduction to Algorithms, 3rd Edition', 'Thomas H. Cormen', 2700),
('Effective Java, 3rd Edition', 'Joshua Bloch', 1800),
('Design Patterns: Elements of Reusable Object-Oriented Software', 'Erich Gamma', 1600),
('Python for Data Analysis, 2nd Edition', 'Wes McKinney', 1250),
('Deep Learning with Python', 'Francois Chollet', 1400);

-- Create table for orders
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    book_id INT NOT NULL,
    quantity INT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    phone VARCHAR(50) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id)
);
