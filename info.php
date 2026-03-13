<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project Overview - Bookstore</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #c2c2c6ff, #393839ff);
        color: #fff;
        padding: 40px;
        line-height: 1.8;
        animation: fadeIn 1.5s ease forwards;
    }

    h1 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.5rem;
        text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    }

    .content {
        background: rgba(0,0,0,0.6);
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.5);
        max-width: 900px;
        margin: auto;
        animation: slideUp 1s ease forwards;
    }

    b, strong {
        color: #ffd700;
        font-size: 1.2rem;
    }

    ul {
        margin-top: 20px;
        padding-left: 20px;
    }

    li {
        margin-bottom: 15px;
        position: relative;
        padding-left: 25px;
    }

    li::before {
        content: "✔️";
        position: absolute;
        left: 0;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media(max-width:768px){
        body { padding: 20px; }
        .content { padding: 20px; }
    }
</style>
</head>
<body>
    <h1>Project Overview</h1>
    <div class="content">
        <p>🔹 This is a simple Book Selling Website built using HTML, CSS, JavaScript, <br>AngularJS, and PHP.<br>
        The project demonstrates a login system, book listing,<br> and ordering system.<br>
        It can run with or without a database.</p>

        <p><strong>Login System</strong> – users can log in (and register if needed).</p>
        <p><strong>Sidebar Navigation</strong> – links to Home, About, Books, and Info pages.</p>
        <p><strong>Books Page</strong> – shows available books with price and author.</p>
        <p><strong>Order Page</strong> – allows users to purchase books by filling in details.</p>
        <p><strong>Session-Based Orders</strong> – orders are stored in session (no database).</p>

        <b>Features:</b>
        <ul>
            <li>Login & Logout functionality</li>
            <li>User registration (new account creation)</li>
            <li>Sidebar navigation (About, Home, Books, Info)</li>
            <li>Book listing with author and price</li>
            <li>Order form (quantity, name, address, phone)</li>
            <li>Display of all orders placed by the user</li>
            <li>Styled with CSS for a clean UI</li>
        </ul>
    </div>
</body>
</html>
';
?>
