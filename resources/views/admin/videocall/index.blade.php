<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Call UI</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      background: linear-gradient(135deg, #000, #764ba2);
      color: #fff;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .container-fluid {
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    h1 {
      color: #fff;
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    /* User List */
    .user-list {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .user-list h3 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .user-list ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .user-list li {
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .user-list li:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .user-list .online-status {
      width: 10px;
      height: 10px;
      background-color: #28a745;
      border-radius: 50%;
      display: inline-block;
      margin-left: 10px;
    }

    /* Video Call Container */
    .video-call-container {
      display: none; /* Hidden by default */
      flex-direction: column;
      gap: 20px;
    }

    /* Video Grid */
    .video-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .video-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 15px;
      transition: transform 0.3s ease;
    }

    .video-card:hover {
      transform: translateY(-5px);
    }

    .video-card video {
      width: 100%;
      border-radius: 10px;
    }

    .video-card .user-info {
      margin-top: 10px;
      font-size: 16px;
      font-weight: 600;
    }

    /* Call Controls */
    .call-controls {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .call-controls button {
      padding: 10px 20px;
      border: none;
      border-radius: 50px;
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      cursor: pointer;
      transition: background 0.3s ease;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .call-controls button:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    .call-controls .end-call-btn {
      background-color: #dc3545;
    }

    .call-controls .end-call-btn:hover {
      background-color: #c82333;
    }

    /* Incoming Call Notification */
    .incoming-call {
      display: none; /* Hidden by default */
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      z-index: 1000;
    }

    .incoming-call h3 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .incoming-call .call-actions {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .incoming-call .call-actions button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .incoming-call .call-actions .accept-btn {
      background-color: #28a745;
      color: #fff;
    }

    .incoming-call .call-actions .accept-btn:hover {
      background-color: #218838;
    }

    .incoming-call .call-actions .reject-btn {
      background-color: #dc3545;
      color: #fff;
    }

    .incoming-call .call-actions .reject-btn:hover {
      background-color: #c82333;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .video-grid {
        grid-template-columns: 1fr;
      }

      .call-controls {
        flex-direction: column;
        align-items: center;
      }

      .call-controls button {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <h1><i class="fas fa-video me-2"></i>Video Call</h1>

    <!-- User List -->
    <div class="user-list">
      <h3>Users</h3>
      <ul id="user-list">
        <!-- Users will be dynamically added here -->
      </ul>
    </div>

    <!-- Video Call Container -->
    <div class="video-call-container" id="video-call-container">
      <!-- Video Grid -->
      <div class="video-grid">
        <!-- Local Video -->
        <div class="video-card">
          <video id="local-video" autoplay muted></video>
          <div class="user-info">You</div>
        </div>

        <!-- Remote Video -->
        <div class="video-card">
          <video id="remote-video" autoplay></video>
          <div class="user-info">User 1</div>
        </div>
      </div>

      <!-- Call Controls -->
      <div class="call-controls">
        <button id="mute-audio-btn">
          <i class="fas fa-microphone"></i> Mute
        </button>
        <button id="mute-video-btn">
          <i class="fas fa-video"></i> Stop Video
        </button>
        <button id="end-call-btn" class="end-call-btn">
          <i class="fas fa-phone-slash"></i> End Call
        </button>
      </div>
    </div>

    <!-- Incoming Call Notification -->
    <div class="incoming-call" id="incoming-call">
      <h3>Incoming Call from <span id="caller-name">User 1</span></h3>
      <div class="call-actions">
        <button class="accept-btn" id="accept-call-btn">
          <i class="fas fa-phone"></i> Accept
        </button>
        <button class="reject-btn" id="reject-call-btn">
          <i class="fas fa-phone-slash"></i> Reject
        </button>
      </div>
    </div>
  </div>

  <script>
    // Sample Data (Replace with API calls in a real application)
    const users = [
      { id: 1, name: "User 1", online: true },
      { id: 2, name: "User 2", online: false },
      { id: 3, name: "User 3", online: true },
    ];

    // DOM Elements
    const userList = document.getElementById("user-list");
    const videoCallContainer = document.getElementById("video-call-container");
    const incomingCall = document.getElementById("incoming-call");
    const callerName = document.getElementById("caller-name");
    const acceptCallBtn = document.getElementById("accept-call-btn");
    const rejectCallBtn = document.getElementById("reject-call-btn");

    // Video Elements
    const localVideo = document.getElementById("local-video");
    const remoteVideo = document.getElementById("remote-video");

    // Call Controls
    const muteAudioBtn = document.getElementById("mute-audio-btn");
    const muteVideoBtn = document.getElementById("mute-video-btn");
    const endCallBtn = document.getElementById("end-call-btn");

    let isAudioMuted = false;
    let isVideoMuted = false;
    let currentCall = null;

    // Function to render the user list
    function renderUserList() {
      userList.innerHTML = ""; // Clear existing users

      users.forEach((user) => {
        const li = document.createElement("li");
        li.textContent = user.name;

        // Add online status
        const onlineStatus = document.createElement("span");
        onlineStatus.classList.add("online-status");
        onlineStatus.style.backgroundColor = user.online ? "#28a745" : "#dc3545";
        li.appendChild(onlineStatus);

        // Add click event to initiate a call
        if (user.online) {
          li.addEventListener("click", () => initiateCall(user));
        }

        userList.appendChild(li);
      });
    }

    // Function to initiate a call
    function initiateCall(user) {
      alert(`Calling ${user.name}...`);
      videoCallContainer.style.display = "flex";
      incomingCall.style.display = "none";
      startVideoStream();
    }

    // Function to handle incoming calls
    function handleIncomingCall(caller) {
      callerName.textContent = caller.name;
      incomingCall.style.display = "block";
    }

    // Function to start video streams
    function startVideoStream() {
      navigator.mediaDevices
        .getUserMedia({ video: true, audio: true })
        .then((stream) => {
          localVideo.srcObject = stream;
          remoteVideo.srcObject = stream; // Simulate remote stream for demo
        })
        .catch((error) => {
          console.error("Error accessing media devices:", error);
        });
    }

    // Event Listeners for Call Controls
    muteAudioBtn.addEventListener("click", () => {
      isAudioMuted = !isAudioMuted;
      localVideo.srcObject.getAudioTracks().forEach((track) => {
        track.enabled = !isAudioMuted;
      });
      muteAudioBtn.innerHTML = `<i class="fas fa-microphone${isAudioMuted ? "-slash" : ""}"></i> ${isAudioMuted ? "Unmute" : "Mute"}`;
    });

    muteVideoBtn.addEventListener("click", () => {
      isVideoMuted = !isVideoMuted;
      localVideo.srcObject.getVideoTracks().forEach((track) => {
        track.enabled = !isVideoMuted;
      });
      muteVideoBtn.innerHTML = `<i class="fas fa-video${isVideoMuted ? "-slash" : ""}"></i> ${isVideoMuted ? "Start Video" : "Stop Video"}`;
    });

    endCallBtn.addEventListener("click", () => {
      if (confirm("Are you sure you want to end the call?")) {
        localVideo.srcObject.getTracks().forEach((track) => track.stop());
        remoteVideo.srcObject.getTracks().forEach((track) => track.stop());
        videoCallContainer.style.display = "none";
        alert("Call ended.");
      }
    });

    // Event Listeners for Incoming Call
    acceptCallBtn.addEventListener("click", () => {
      incomingCall.style.display = "none";
      videoCallContainer.style.display = "flex";
      startVideoStream();
    });

    rejectCallBtn.addEventListener("click", () => {
      incomingCall.style.display = "none";
      alert("Call rejected.");
    });

    // Simulate an incoming call for demo purposes
    setTimeout(() => {
      handleIncomingCall(users[0]);
    }, 5000);

    // Initial render
    renderUserList();
  </script>
</body>
</html>