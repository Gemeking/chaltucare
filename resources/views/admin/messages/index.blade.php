<div class="container1">
  <h1>Doctor's Messaging</h1>

  <!-- User Selection -->
  <div class="user-selection">
    <label for="userSelect">Select User:</label>
    <select id="userSelect">
      <option value="">Select a User</option>
      <option value="1">John Doe</option>
      <option value="2">Jane Smith</option>
    </select>
  </div>

  <!-- Chat Container -->
  <div class="chat-container" id="chatContainer" style="display: none;">
    <!-- Chat Header -->
    <div class="chat-header">
      <h2 id="chatUserName"></h2>
      <p>Online</p>
    </div>

    <!-- Chat Messages -->
    <div class="chat-messages" id="chatMessages">
      <!-- Messages will be dynamically populated here -->
    </div>

    <!-- Chat Input -->
    <div class="chat-input">
      <textarea id="messageInput" placeholder="Type your message..."></textarea>
      <input type="file" id="fileInput" style="display: none;">
      <button onclick="document.getElementById('fileInput').click()">📎</button>
      <button onclick="sendMessage()">Send</button>
    </div>
  </div>
</div>

<style>
  .container1 {
    margin: 20px auto;
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    max-width: 800px;
  }

  h1 {
    color:#3498db;
    text-align: center;
  }

  .user-selection {
    margin-bottom: 20px;
  }

  .user-selection label {
    font-weight: bold;
  }

  .user-selection select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .chat-container {
    display: fixed;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.1);
  }

  .chat-header {
    background-color:#3498db;
    color: white;
    padding: 15px;
    text-align: center;
  }

  .chat-header h2 {
    margin: 0;
    font-size: 1.5rem;
  }

  .chat-header p {
    margin: 5px 0 0;
    font-size: 0.9rem;
  }

  .chat-messages {
    flex: 1;
    padding: 15px;
    overflow-y: auto;
    background: rgba(255, 255, 255, 0.1);/* Set the width */
            height: 400px; /* Set a fixed height */
            overflow-y: auto; /* Enable vertical scrolling */
            border: 1px solid #ccc;
            padding: 10px;
  }

  .message {
    display: flex;
    margin-bottom: 15px;
  }

  .message.user {
    justify-content: flex-start;
  }

  .message.doctor {
    justify-content: flex-end;
  }

  .message-content {
    max-width: 70%;
    padding: 10px;
    border-radius: 10px;
    position: relative;
  }

  .message.user .message-content {
    background: rgba(255, 255, 255, 0.1);
    color: #333;
  }

  .message.doctor .message-content {
    background-color: #28a745;
    color: white;
  }

  .message-file {
    display: block;
    margin-top: 5px;
    color: #007bff;
    text-decoration: none;
  }

  .message-file:hover {
    text-decoration: underline;
  }

  .chat-input {
    display: flex;
    padding: 10px;
    background-color: #fff;
    border-top: 1px solid #ddd;
  }

  .chat-input textarea {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    resize: none;
  }

  .chat-input button {
    margin-left: 10px;
    padding: 10px 15px;
    background-color:#3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .chat-input button:hover {
    background-color:#3498db;
  }

  /* Dark Theme */
  body.dark-theme {
    background-color: #121212;
    color: #ffffff;
  }

  .dark-theme .container1 {
    background-color: #1f1f1f;
    color: #ffffff;
  }

  .dark-theme h1 {
    color:#3498db;
  }

  .dark-theme .user-selection select {
    background-color: #333;
    color: #ffffff;
    border-color: #555;
  }

  .dark-theme .chat-container {
    border-color: #555;
  }

  .dark-theme .chat-header {
    background-color:#3498db;
  }

  .dark-theme .chat-messages {
    background-color: #333;
  }

  .dark-theme .message.user .message-content {
    background-color: #555;
    color: #ffffff;
  }

  .dark-theme .chat-input {
    background-color: #1f1f1f;
    border-color: #555;
  }

  .dark-theme .chat-input textarea {
    background-color: #333;
    color: #ffffff;
    border-color: #555;
  }

  .dark-theme .chat-input button {
    background-color:#3498db;
  }

  .dark-theme .chat-input button:hover {
    background-color:#3498db;
  }

  /* Mobile Responsiveness */
  @media (max-width: 768px) {
    .container1 {
      width: 95%;
      padding: 10px;
    }

    .chat-container {
      height: 80vh;
    }

    .chat-input {
      flex-direction: column;
    }

    .chat-input textarea {
      margin-bottom: 10px;
    }

    .chat-input button {
      margin-left: 0;
    }
  }
</style>

<script>
  // Sample Data (Replace with actual data from backend)
  const messages = {
    1: [
      {
        message_id: 1,
        sender_id: 1, // User
        receiver_id: 2, // Doctor
        message_text: "Hello Doctor, I have a question about my appointment.",
        sent_at: "2023-10-15T10:00:00",
        is_read: true,
      },
      {
        message_id: 2,
        sender_id: 2, // Doctor
        receiver_id: 1, // User
        message_text: "Hi! Sure, what would you like to know?",
        sent_at: "2023-10-15T10:05:00",
        is_read: true,
      },
      {
        message_id: 3,
        sender_id: 1, // User
        receiver_id: 2, // Doctor
        message_text: "Can I reschedule my appointment?",
        sent_at: "2023-10-15T10:10:00",
        is_read: false,
      },
    ],
    2: [
      {
        message_id: 4,
        sender_id: 2, // User
        receiver_id: 2, // Doctor
        message_text: "Hello Doctor, I need some advice.",
        sent_at: "2023-10-15T11:00:00",
        is_read: true,
      },
    ],
  };

  // DOM Elements
  const userSelect = document.getElementById("userSelect");
  const chatContainer = document.getElementById("chatContainer");
  const chatUserName = document.getElementById("chatUserName");
  const chatMessages = document.getElementById("chatMessages");
  const messageInput = document.getElementById("messageInput");
  const fileInput = document.getElementById("fileInput");

  // Render Messages
  function renderMessages(userId) {
    chatMessages.innerHTML = "";
    const userMessages = messages[userId] || [];

    userMessages.forEach((message) => {
      const messageDiv = document.createElement("div");
      messageDiv.classList.add("message", message.sender_id === 2 ? "doctor" : "user");

      const messageContent = document.createElement("div");
      messageContent.classList.add("message-content");

      // Message Text
      const messageText = document.createElement("p");
      messageText.textContent = message.message_text;
      messageContent.appendChild(messageText);

      // Timestamp
      const timestamp = document.createElement("span");
      timestamp.classList.add("timestamp");
      timestamp.textContent = new Date(message.sent_at).toLocaleTimeString();
      messageContent.appendChild(timestamp);

      // File Download Link (if applicable)
      if (message.message_text.startsWith("File:")) {
        const fileLink = document.createElement("a");
        fileLink.classList.add("message-file");
        fileLink.href = "#"; // Replace with actual file URL
        fileLink.textContent = "Download File";
        fileLink.download = message.message_text.split(": ")[1];
        messageContent.appendChild(fileLink);
      }

      messageDiv.appendChild(messageContent);
      chatMessages.appendChild(messageDiv);
    });

    // Scroll to the bottom
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  // Send Message
  function sendMessage() {
    const userId = userSelect.value;
    const messageText = messageInput.value.trim();
    const file = fileInput.files[0];

    if (!messageText && !file) {
      alert("Please enter a message or attach a file!");
      return;
    }

    // Simulate sending a message (Replace with actual API call)
    const newMessage = {
      message_id: messages[userId].length + 1,
      sender_id: 2, // Doctor
      receiver_id: userId, // User
      message_text: messageText || `File: ${file.name}`,
      sent_at: new Date().toISOString(),
      is_read: false,
    };
    messages[userId].push(newMessage);

    // Clear Input
    messageInput.value = "";
    fileInput.value = "";

    // Render Messages
    renderMessages(userId);
  }

  // Handle User Selection
  userSelect.addEventListener("change", () => {
    const userId = userSelect.value;
    if (userId) {
      chatContainer.style.display = "block";
      chatUserName.textContent = userSelect.options[userSelect.selectedIndex].text;
      renderMessages(userId);
    } else {
      chatContainer.style.display = "none";
    }
  });

  // Handle File Input
  fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    if (file) {
      sendMessage();
    }
  });
</script>