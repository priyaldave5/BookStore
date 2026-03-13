<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "user1" && $password === "1234") {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #797c7cff, #1f1f1fff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-box {
            width: 320px;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.3);
            text-align: center;
        }
        .login-box h2 {
            margin-bottom: 25px;
            color: #333;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }
        .login-box input[type="text"]:focus,
        .login-box input[type="password"]:focus {
            border-color: #2193b0;
            box-shadow: 0px 0px 5px rgba(33,147,176,0.5);
        }
        .login-box input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #2193b0;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-box input[type="submit"]:hover {
            background: #176d82;
        }
        .error {
            color: red;
            margin-top: 12px;
            font-size: 14px;
        }
    </style>
    <script>
        function validateForm() {
            var username = document.forms[0]["username"].value.trim();
            var password = document.forms[0]["password"].value.trim();
            var errorMsg = "";

            if (username === "") {
                errorMsg += "Username is required.\n";
            } else if (username.length < 3) {
                errorMsg += "Username must be at least 3 characters long.\n";
            }

            if (password === "") {
                errorMsg += "Password is required.\n";
            } else if (password.length < 4) {
                errorMsg += "Password must be at least 4 characters long.\n";
            }

            if (errorMsg !== "") {
                alert(errorMsg);
                return false; // prevent form submission
            }
            return true;
        }
    </script>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form method="POST" onsubmit="return validateForm()">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
</body>
</html>  