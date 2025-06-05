const ws = new WebSocket("ws://localhost:8080");
const box = document.getElementById("chat-box");

ws.onmessage = e => {
    const data = JSON.parse(e.data);
    const messageElement = document.createElement("div");
    messageElement.className = "chat-message";
    messageElement.innerHTML = `<strong>${data.user}:</strong> ${data.message}`;
    box.appendChild(messageElement);
    box.scrollTop = box.scrollHeight;
};

function sendMessage() {
    const msg = document.getElementById("msg").value;
    if (msg.trim() !== "") {
        ws.send(JSON.stringify({ user: USER_NAME, message: msg }));
        document.getElementById("msg").value = "";
    }
}
