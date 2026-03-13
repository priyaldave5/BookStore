<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Bookstore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset & fonts */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: url('https://t4.ftcdn.net/jpg/01/46/40/35/360_F_146403506_381OxD624hppWMQcIbjLuSr8TCW1q2lj.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            transition: background 0.5s;
        }

        .container {
            display: flex;
            width: 100%;
            backdrop-filter: blur(10px);
            background: rgba(0,0,0,0.6);
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: rgba(0,0,0,0.8);
            padding: 30px 20px;
            animation: slideIn 1s ease forwards;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: color 0.3s, transform 0.3s;
        }

        .sidebar ul li a:hover {
            color: #ffd700;
            transform: translateX(5px);
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 50px;
            animation: fadeIn 2s ease forwards;
        }

        .main-content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.2rem;
            line-height: 1.8;
        }

        /* Logo */
        .logo {
            width: 100px;
            margin-bottom: 30px;
        }

        /* Animations */
        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive */
        @media(max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .sidebar ul {
                display: flex;
                gap: 20px;
            }
            .main-content {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="https://t4.ftcdn.net/jpg/02/11/07/81/360_F_211078110_mttxEdu3gsSbMKajsy98E4M4E5RUCiuo.jpg" alt="Bookstore Logo" class="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Website</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="info.php">Info</a></li>
                <li><a href="index.php?logout=true">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Welcome to our Online Bookstore! <?php echo $_SESSION['username']; ?></h1>
            <p>📚 We’re delighted to have you here. Whether you’re looking for timeless classics, <br>
            modern bestsellers, or academic guides, our collection is designed to meet every reader’s <br>
            need. Take your time to explore, discover new titles, and shop your favorite books<br>
            with ease. Happy reading and happy shopping!</p>
            <?php
            if(isset($_GET['logout'])){
                session_destroy();
                header("Location: index.php");
            }
            ?>
        </div>
    </div>
</body>
</html>

