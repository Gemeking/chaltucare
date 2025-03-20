@extends('layouts.app')

@section('content')
<br></br>
  <div class="main-container">
    
    <!-- Chat Container -->
    <div class="container">
    <div class="site-intro">
      <h2>Welcome to 🩺 Chaltu Care</h2>
      <p>
        <strong>Tip:</strong> Use the chat feature to communicate with your doctor in real-time. 
        You can also share files like medical reports or images for better consultation.
      </p>
    </div>

      <div class="chat-container">
        <!-- Chat Header -->
        <div class="chat-header">
          <h2>Dr. Jane Smith</h2>
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
      <div class="site-intro">
      <h2>Welcome to 🩺 Chaltu Care</h2>
      <p>
        Chaltu Care is your trusted platform for online counseling and healthcare services. 
        Connect with certified professionals, schedule appointments, and get the support you need 
        from the comfort of your home.
      </p>
      <p>
        <strong>Tip:</strong> Use the chat feature to communicate with your doctor in real-time. 
        You can also share files like medical reports or images for better consultation.
      </p>
    </div>
    </div>

    <!-- Side Content -->
    @include('components.sidecontent')
  </div>

  <style>
    /* Main Container */
    .main-container {
      display: flex;
      gap: 20px;
      padding: 20px;
    }

     /* Site Intro */
     .site-intro {
      padding: 20px;
    }

    .site-intro h2 {
      color: #28a745;
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .site-intro p {
        position: relative;
            z-index: 1;
            font-family: 'Poppins', sans-serif; /* Elegant and readable */
            font-size: 16px;
            line-height: 1.6;
            letter-spacing: 0.5px;
            color: #fff; /* Soft white for readability */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            background: rgba(0, 0, 0, 0.3); /* Soft transparent overlay */
            padding: 8px;
            border-radius: 8px;
    }
    .site-intro p:first-child {
            font-family: 'Dancing Script', cursive;
            font-size: 18px;
            font-weight: 700;
            color: #ffebcd; /* Cute pastel color */
            text-shadow: 3px 3px 6px rgba(255, 182, 193, 0.5);
        }


    /* Chat Container */
    .container {
      flex: 1;
      max-width: 2000px;
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      color: #28a745;
      text-align: center;
    }

    .chat-container {
      display: flex;
      flex-direction: column;
      height: 76vh;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
    }

    .chat-header {
      background-color: #28a745;
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
      background-image: url('https://png.pngtree.com/thumb_back/fh260/background/20230307/pngtree-world-health-day-global-doctor-business-photo-image_50458416.jpg'); /* Replace with your image */
            background-size: cover; /* Ensures the image covers the div fully */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents repeating */
    }

    .message {
      display: flex;
      margin-bottom: 15px;
    }

    .message.user {
      justify-content: flex-end;
    }

    .message.doctor {
      justify-content: flex-start;
    }

    .message-content {
      max-width: 70%;
      padding: 10px;
      border-radius: 10px;
      position: relative;
    }

    .message.user .message-content {
      background-color: #28a745;
      color: white;
    }

    .message.doctor .message-content {
      background-color: #e1e1e1;
      color: #333;
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
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .chat-input button:hover {
      background-color: #218838;
    }

    /* Side Content */
    .side-content {
      width: 300px;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Dark Theme */
    body.dark-theme {
      background-color: #121212;
      color: #ffffff;
    }

    .dark-theme .container {
      background-color: #1f1f1f;
      color: #ffffff;
    }

    .dark-theme h1 {
      color: #4caf50;
    }

    .dark-theme .chat-container {
      border-color: #555;
    }

    .dark-theme .chat-header {
      background-color: #4caf50;
    }

    .dark-theme .chat-messages {
      background-color: #333;
    }

    .dark-theme .message.doctor .message-content {
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
      background-color: #4caf50;
    }

    .dark-theme .chat-input button:hover {
      background-color: #45a049;
    }

    .dark-theme .side-content {
      background-color: #1f1f1f;
      color: #ffffff;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
      .main-container {
        flex-direction: column;
      }

      .container {
        width: 100%;
        max-width: none;
      }

      .side-content {
        width: 100%;
        margin-top: 20px;
      }

      .chat-container {
        height: 90vh;
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
    const messages = [
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
    ];

    // DOM Elements
    const chatMessages = document.getElementById("chatMessages");
    const messageInput = document.getElementById("messageInput");
    const fileInput = document.getElementById("fileInput");

    // Render Messages
    function renderMessages() {
      chatMessages.innerHTML = "";
      messages.forEach((message) => {
        const messageDiv = document.createElement("div");
        messageDiv.classList.add("message", message.sender_id === 1 ? "user" : "doctor");

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

        messageDiv.appendChild(messageContent);
        chatMessages.appendChild(messageDiv);
      });

      // Scroll to the bottom
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Send Message
    function sendMessage() {
      const messageText = messageInput.value.trim();
      const file = fileInput.files[0];

      if (!messageText && !file) {
        alert("Please enter a message or attach a file!");
        return;
      }

      // Simulate sending a message (Replace with actual API call)
      const newMessage = {
        message_id: messages.length + 1,
        sender_id: 1, // User
        receiver_id: 2, // Doctor
        message_text: messageText,
        sent_at: new Date().toISOString(),
        is_read: false,
      };
      messages.push(newMessage);

      // Clear Input
      messageInput.value = "";
      fileInput.value = "";

      // Render Messages
      renderMessages();
    }

    // Handle File Input
    fileInput.addEventListener("change", () => {
      const file = fileInput.files[0];
      if (file) {
        // Simulate sending a file (Replace with actual API call)
        const newMessage = {
          message_id: messages.length + 1,
          sender_id: 1, // User
          receiver_id: 2, // Doctor
          message_text: `File: ${file.name}`,
          sent_at: new Date().toISOString(),
          is_read: false,
        };
        messages.push(newMessage);

        // Render Messages
        renderMessages();
      }
    });

    // Initial Render
    renderMessages();
  </script>
@endsection