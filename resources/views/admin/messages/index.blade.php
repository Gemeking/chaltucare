  <link rel="stylesheet" href="{{ asset('css/admin/messages.css') }}">
</head>
<body>
  <div class="container-fluid">
    <h1><i class="fas fa-comments me-2"></i>Admin Message UI</h1>

    <!-- Chat Layout -->
    <div class="chat-layout">
      <!-- User List -->
      <div class="user-list">
        <h3>Users</h3>
        <ul id="user-list">
          <!-- Users will be dynamically added here -->
        </ul>
      </div>

      <!-- Chat Window -->
      <div class="chat-window">
        <!-- Chat Header -->
        <div class="chat-header" id="chat-header">
          Select a user to start chatting
        </div>

        <!-- Chat History -->
        <div class="chat-history" id="chat-history">
          <!-- Messages will be dynamically added here -->
        </div>

        <!-- Chat Input -->
        <div class="chat-input">
          <textarea id="message-input" placeholder="Type your message here..." rows="2"></textarea>
          <button id="send-btn"><i class="fas fa-paper-plane"></i> Send</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Sample Data (Replace with API calls in a real application)
    const users = [
      { id: 1, name: "User 1" },
      { id: 2, name: "User 2" },
      { id: 3, name: "User 3" },
    ];

    const messages = {
      1: [
        {
          id: 1,
          sender: "Admin",
          receiver: "User 1",
          message: "Hello, how can I assist you today?",
          timestamp: "2023-10-25T10:00:00",
        },
        {
          id: 2,
          sender: "User 1",
          receiver: "Admin",
          message: "I need help with my appointment.",
          timestamp: "2023-10-25T10:05:00",
        },
      ],
      2: [
        {
          id: 3,
          sender: "Admin",
          receiver: "User 2",
          message: "Hi, how are you?",
          timestamp: "2023-10-25T11:00:00",
        },
      ],
      3: [],
    };

    let selectedUserId = null;

    // Function to render the user list
    function renderUserList() {
      const userList = document.getElementById("user-list");
      userList.innerHTML = ""; // Clear existing users

      users.forEach((user) => {
        const li = document.createElement("li");
        li.textContent = user.name;
        li.addEventListener("click", () => selectUser(user.id));
        userList.appendChild(li);
      });
    }

    // Function to select a user
    function selectUser(userId) {
      selectedUserId = userId;
      const user = users.find((u) => u.id === userId);
      document.getElementById("chat-header").textContent = `Chat with ${user.name}`;
      renderMessages();
      document.getElementById("message-input").disabled = false;
      document.getElementById("send-btn").disabled = false;

      // Highlight the selected user
      const userListItems = document.querySelectorAll("#user-list li");
      userListItems.forEach((li) => li.classList.remove("active"));
      userListItems[userId - 1].classList.add("active");
    }

    // Function to render messages in the chat history
    function renderMessages() {
      const chatHistory = document.getElementById("chat-history");
      chatHistory.innerHTML = ""; // Clear existing messages

      if (selectedUserId) {
        const userMessages = messages[selectedUserId] || [];
        userMessages.forEach((message) => {
          const messageDiv = document.createElement("div");
          messageDiv.classList.add("message");
          messageDiv.classList.add(message.sender === "Admin" ? "sent" : "received");

          messageDiv.innerHTML = `
            <div class="sender">${message.sender}</div>
            <div class="text">${message.message}</div>
            <div class="timestamp">${new Date(message.timestamp).toLocaleString()}</div>
            ${message.sender === "Admin" ? `
              <div class="actions">
                <button class="delete-btn" onclick="deleteMessage(${message.id})">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </div>
            ` : ""}
          `;
          chatHistory.appendChild(messageDiv);
        });

        // Scroll to the bottom of the chat history
        chatHistory.scrollTop = chatHistory.scrollHeight;
      }
    }

    // Function to send a new message
    document.getElementById("send-btn").addEventListener("click", () => {
      const messageInput = document.getElementById("message-input");
      const messageText = messageInput.value.trim();

      if (messageText && selectedUserId) {
        const newMessage = {
          id: messages[selectedUserId].length + 1,
          sender: "Admin",
          receiver: `User ${selectedUserId}`,
          message: messageText,
          timestamp: new Date().toISOString(),
        };

        messages[selectedUserId].push(newMessage);
        renderMessages();
        messageInput.value = ""; // Clear the input
      }
    });

    // Function to delete a message
    function deleteMessage(messageId) {
      if (confirm("Are you sure you want to delete this message?")) {
        messages[selectedUserId] = messages[selectedUserId].filter(
          (m) => m.id !== messageId
        );
        renderMessages();
      }
    }

    // Initial render
    renderUserList();
    renderMessages();
  </script>
</body>
</html>