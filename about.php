<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Online Bookstore</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #92949eff, #1a0b29ff);
            color: #fff;
            padding: 50px;
            line-height: 1.8;
            animation: fadeIn 2s ease forwards;
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
        }

        b {
            color: #ffd700;
            font-size: 1.3rem;
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
            content: "📖";
            position: absolute;
            left: 0;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
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
    <h1>Our Book Collection</h1>
    <div class="content">
        <p>Our online bookstore offers a diverse collection of books to suit every reader’s taste.<br>
        From gripping novels and timeless classics to academic guides, self-help books, and children’s<br>
        literature, there’s something for everyone. Each book listing provides essential details such<br>
        as the title, author, and price, helping users make informed choices. Customers can easily <br>
        browse the collection, select their favorite books, and place orders through a simple, <br>
        user-friendly interface. We continually update our catalog to include new releases and popular<br>
        titles, ensuring our readers always have access to the latest and most sought-after books.</p>
        
        <b>Books Available</b>
        <ul>
            <li>Wide Variety of Genres: Fiction, Non-Fiction, Academic, Self-Help, Children’s Books, and more.</li>
            <li>Detailed Information: Each book displays its Title, Author, Price, and Description.</li>
            <li>Easy Browsing: Users can navigate through categories to quickly find their favorite books.</li>
            <li>Latest Releases: Regularly updated collection with newly released and trending books.</li>
            <li>Popular Titles: Featured books section highlights bestsellers and customer favorites.</li>
            <li>User-Friendly Ordering: Add books to order with a simple form requiring quantity and shipping details.</li>
            <li>Personalized Experience: Logged-in users can view their previous orders and preferences.</li>
            <li>Secure Shopping: Safe and reliable ordering process, even without a database .</li>
            <li>Accessible Design: Works on desktops, tablets, and mobile devices for easy browsing anywhere.</li>
            <li>Affordable Prices: Competitive pricing to make books accessible for all readers.</li>
        </ul>
    </div>
</body>
</html>
';
?>
