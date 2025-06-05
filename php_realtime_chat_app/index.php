<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="chat.css">
</head>
<body>
    <div style="display:flex; justify-content:space-between; max-width:600px;">
        <h2>Welcome, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <a href="logout.php" style="text-decoration:none;padding:8px 12px;background:#f33;color:#fff;border-radius:4px;">Logout</a>
    </div>
    <div id="chat-box"></div>
    <input type="text" id="msg" placeholder="Type a message..." onkeypress="if(event.key==='Enter')sendMessage();">
    <button onclick="sendMessage()">Send</button>
    <script>const USER_NAME = "<?= htmlspecialchars($_SESSION['user']) ?>";</script>
    <script src="ws-client.js"></script>
</body>
</html>
