<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: index.php");

// Sample books array
$books = [
    ['id'=>1,'title'=>'C++ Programming Language, 4e','author'=>'Bjarne Stroustrup','price'=>2250],
    ['id'=>2,'title'=>'Python Crash Course, 3rd Edition','author'=>'MATTHES ERIC','price'=>1150],
    ['id'=>3,'title'=>'Hands-On Machine Learning','author'=>'Aurélien Géron','price'=>1300],
    ['id'=>4,'title'=>'JavaScript: The Good Parts','author'=>'Douglas Crockford','price'=>900],
    ['id'=>5,'title'=>'Clean Code: A Handbook of Agile Software Craftsmanship','author'=>'Robert C. Martin','price'=>1500],
    ['id'=>6,'title'=>'Introduction to Algorithms, 3rd Edition','author'=>'Thomas H. Cormen','price'=>2700],
    ['id'=>7,'title'=>'Effective Java, 3rd Edition','author'=>'Joshua Bloch','price'=>1800],
    ['id'=>8,'title'=>'Design Patterns: Elements of Reusable Object-Oriented Software','author'=>'Erich Gamma','price'=>1600],
    ['id'=>9,'title'=>'Python for Data Analysis, 2nd Edition','author'=>'Wes McKinney','price'=>1250],
    ['id'=>10,'title'=>'Deep Learning with Python','author'=>'Francois Chollet','price'=>1400],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Bookstore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #b4b5b9ff, #0d0d0eff);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            display: flex;
            flex: 1;
            padding: 30px;
            gap: 20px;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: rgba(0,0,0,0.7);
            padding: 30px 20px;
            border-radius: 15px;
            animation: slideIn 1s ease forwards;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .sidebar ul li a:hover {
            color: #ffd700;
            transform: translateX(5px);
        }

        /* Main content */
        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            animation: fadeIn 1.5s ease forwards;
        }

        h2 {
            grid-column: 1 / -1;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.4);
        }

        /* Book cards */
        .book-card {
            background: rgba(0,0,0,0.6);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.7);
        }

        .book-card h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .book-card p {
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .book-card a {
            text-align: center;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            background: #ffd700;
            transition: 0.3s;
        }

        .book-card a:hover {
            background: #ffb700;
        }

        /* Animations */
        @keyframes slideIn {
            from { transform: translateX(-100%); opacity:0; }
            to { transform: translateX(0); opacity:1; }
        }

        @keyframes fadeIn {
            from { opacity:0; transform: translateY(20px); }
            to { opacity:1; transform: translateY(0); }
        }

        /* Responsive */
        @media(max-width:768px){
            .container { flex-direction: column; }
            .sidebar { width: 100%; display:flex; justify-content:center; margin-bottom:20px; }
            .sidebar ul { display:flex; gap:15px; }
            .main-content { grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Website</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="info.php">Info</a></li>
            <li><a href="home.php?logout=true">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2>Books Available</h2>
        <?php foreach($books as $book): ?>
        <div class="book-card">
            <h3><?= $book['title'] ?></h3>
            <p><strong>Author:</strong> <?= $book['author'] ?></p>
            <p><strong>Price:</strong> ₹<?= number_format($book['price'], 2) ?></p>
            <a href="order.php?book_id=<?= $book['id'] ?>">Purchase</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
