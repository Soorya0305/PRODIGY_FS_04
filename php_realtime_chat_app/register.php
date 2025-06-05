<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        $error = "Username already exists.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #388E3C;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Register</h2>
        <form method="POST">
            <input name="username" required placeholder="Username" autofocus>
            <input name="password" type="password" required placeholder="Password">
            <button>Register</button>
            <p class="error"><?= $error ?? '' ?></p>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
