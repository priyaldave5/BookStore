<?php
session_start();
if(!isset($_SESSION['username'])) header("Location: index.php");

$host = 'localhost';
$db   = 'online_bookstore'; // database name
$user = 'root';             // DB username
$pass = '';                 // DB password (XAMPP default empty)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

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

$book_id = $_GET['book_id'] ?? 1;
$book = array_values(array_filter($books, fn($b)=>$b['id']==$book_id))[0];

// Handle order submission
if(isset($_POST['order'])){
    $stmt = $pdo->prepare("INSERT INTO orders (book_id, quantity, full_name, address, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $book_id,
        $_POST['quantity'],
        $_POST['full_name'],
        $_POST['address'],
        $_POST['phone']
    ]);
    $success = "Order placed successfully!";
}

// Fetch all orders
$stmt = $pdo->prepare("SELECT o.*, b.title FROM orders o JOIN books b ON o.book_id = b.id ORDER BY o.order_date DESC");
$stmt->execute();
$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order - Bookstore</title>
<style>
body {
    font-family: sans-serif;
    margin:0;
    padding:0;
    background: linear-gradient(135deg, #fff, #ccc, #000);
    color: #000;
}
.main {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}
h2 {
    text-align:center;
    margin-bottom:20px;
}
input, textarea {
    width:100%;
    padding:10px;
    margin-bottom:10px;
    border-radius:5px;
    border:1px solid #888;
    background:#fff;
    color:#000;
}
input::placeholder, textarea::placeholder { color:#666; }
input[type=submit] {
    background:#000;
    color:#fff;
    border:none;
    cursor:pointer;
    font-weight:bold;
}
input[type=submit]:hover { background:#333; }
.success { color:green; margin-bottom:15px; }
table {
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}
th, td {
    border:1px solid #888;
    padding:8px;
    text-align:left;
}
th { background:#ccc; }
tr:nth-child(even){ background:#eee; }
</style>
</head>
<body>
<div class="main">
<h2>Order Book: <?= htmlspecialchars($book['title']) ?></h2>
<form method="POST">
<input type="number" name="quantity" value="1" min="1" required placeholder="Quantity">
<input type="text" name="full_name" required placeholder="Full Name">
<textarea name="address" required placeholder="Address"></textarea>
<input type="text" name="phone" required placeholder="Phone">
<input type="submit" name="order" value="Place Order">
</form>

<?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>

<?php if(!empty($orders)): ?>
<h3>All Orders:</h3>
<table>
<tr><th>Book</th><th>Qty</th><th>Name</th><th>Address</th><th>Phone</th><th>Order Date</th></tr>
<?php foreach($orders as $o): ?>
<tr>
<td><?= htmlspecialchars($o['title']) ?></td>
<td><?= $o['quantity'] ?></td>
<td><?= htmlspecialchars($o['full_name']) ?></td>
<td><?= htmlspecialchars($o['address']) ?></td>
<td><?= htmlspecialchars($o['phone']) ?></td>
<td><?= $o['order_date'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</div>
</body>
</html>
