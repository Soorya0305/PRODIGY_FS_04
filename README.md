# Real-Time Chat Application 💬

A real-time chat application built using **WebSocket** technology that allows users to register, log in, join public chat rooms, or initiate private one-on-one conversations. The application supports instant text messaging with seamless real-time updates.

## 📌 Features

- ✅ **User Authentication**
  - Account creation and secure login
  - Session-based access control

- 💬 **Chat System**
  - Real-time public chat rooms
  - Private 1-on-1 conversations
  - Live message exchange using WebSockets

- 🕒 **Live Updates**
  - No page refresh required
  - Messages appear instantly across users

- 🔐 **Security**
  - Passwords are encrypted
  - Input sanitized to prevent XSS and injection attacks

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **WebSocket Server**: Ratchet PHP WebSocket Library / Node.js (depending on your implementation)
- **Database**: MySQL

## 🚀 Getting Started

### Prerequisites

- PHP >= 7.x
- MySQL
- Composer (if using Ratchet)
- Apache/Nginx Server
- Node.js (optional, if WebSocket is Node-based)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/Soorya0305/PRODIGY_FS_02.git
Navigate to the project folder

bash
Copy
Edit
cd PRODIGY_FS_02/chat-app
Set up the database

Open phpMyAdmin

Create a database called chat_app

Import the chat_app.sql file from the project folder

Configure database connection
In config.php, update with your DB credentials:

php
Copy
Edit
$conn = mysqli_connect("localhost", "root", "", "chat_app");
Start WebSocket server

If using Ratchet (PHP WebSocket server):

bash
Copy
Edit
composer install
php server.php
If using Node.js WebSocket:

bash
Copy
Edit
cd websocket-server
npm install
node server.js
Launch the application in your browser

bash
Copy
Edit
http://localhost/PRODIGY_FS_02/chat-app/
Default Test Accounts
Username: testuser

Password: test123

📁 Folder Structure
bash
Copy
Edit
chat-app/
├── assets/                # Static files (CSS, JS)
├── config.php             # DB connection
├── login.php              # Login page
├── register.php           # Registration page
├── chatroom.php           # Public chat room
├── private_chat.php       # Private messaging
├── websocket-server/      # WebSocket backend (Node or PHP-based)
├── chat_app.sql           # Database file
└── README.md              # Project documentation
📸 Screenshots
(Add screenshots of chat room, private chat, login page, etc.)

🧪 Test & Usage
Open two browser windows

Log in with different accounts

Send messages to each other in public or private mode

🤝 Contributing
Feel free to fork this repository, make enhancements, and create pull requests.

📃 License
This project is licensed under the MIT License.
