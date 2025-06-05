<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hash);
        $stmt->fetch();
        if (password_verify($_POST['password'], $hash)) {
            $_SESSION['user'] = $_POST['username'];
            header("Location: index.php");
            exit;
        }
    }
    $error = "Invalid login.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            /* Base64 image as background */
            background: url('data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD...YOUR_BASE64_STRING_HERE...') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-box {
            background: rgba(255,255,255,0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 300px;
        }
        input, button {
            padding: 10px;
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Login</h2>
        <form method="POST">
            <input name="username" required placeholder="Username" autofocus>
            <input name="password" type="password" required placeholder="Password">
            <button>Login</button>
            <p class="error"><?= $error ?? '' ?></p>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
