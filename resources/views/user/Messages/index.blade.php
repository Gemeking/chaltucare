@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Chat | Chaltu Care</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<div class="healthcare-chat-container">
    <!-- Main Chat Area -->
    <div class="chat-main-container">
        <!-- Information Panel -->
        <div class="info-panel">
            <div class="platform-info">
                <h2><i class="fas fa-heartbeat"></i> Chaltu Care Connect</h2>
                <p class="platform-description">
                    Secure messaging platform connecting patients with healthcare providers. 
                    All communications are encrypted and HIPAA compliant.
                </p>
            </div>
            <div class="quick-actions">
                <button class="action-btn" onclick="showAppointmentModal()">
                    <i class="fas fa-calendar-plus"></i> New Appointment
                </button>
                <button class="action-btn" onclick="showPrescriptionModal()">
                    <i class="fas fa-prescription-bottle-alt"></i> Request Prescription
                </button>
            </div>
        </div>

        <!-- Chat Interface -->
        <div class="chat-interface">
            <!-- Chat Header -->
            <div class="chat-header">
                <div class="recipient-info">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Doctor" class="avatar">
                    <div>
                        <h3>Dr. Jane Smith <span class="badge online">Online</span></h3>
                        <p class="specialty">Psychiatrist | 8 years experience</p>
                    </div>
                </div>
                <div class="chat-actions">
                    <button class="icon-btn" title="Video Call"><i class="fas fa-video"></i></button>
                    <button class="icon-btn" title="Voice Call"><i class="fas fa-phone"></i></button>
                    <button class="icon-btn" title="More options"><i class="fas fa-ellipsis-v"></i></button>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="chat-messages" id="chatMessages">
                <!-- Messages will be loaded here -->
            </div>

            <!-- Chat Input -->
            <div class="chat-input-container">
                <div class="attachment-options">
                    <button class="icon-btn" onclick="document.getElementById('fileInput').click()" title="Attach file">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <button class="icon-btn" onclick="showImageUpload()" title="Upload image">
                        <i class="fas fa-image"></i>
                    </button>
                    <input type="file" id="fileInput" style="display:none" accept=".pdf,.doc,.docx,.txt,image/*">
                    <input type="file" id="imageInput" style="display:none" accept="image/*">
                </div>
                <textarea id="messageInput" placeholder="Type your message here..." rows="1"></textarea>
                <button class="send-btn" onclick="sendMessage()">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Side Panel -->
    <div class="side-panel">
        <!-- User Profile -->
        <div class="user-profile">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="avatar large">
            <h3>John Doe</h3>
            <p class="user-role">Patient</p>
            <div class="profile-actions">
                <button class="profile-btn"><i class="fas fa-user-edit"></i> Edit Profile</button>
                <button class="profile-btn"><i class="fas fa-cog"></i> Settings</button>
            </div>
        </div>

        <!-- Active Conversations -->
        <div class="conversations-list">
            <h4><i class="fas fa-comments"></i> Active Conversations</h4>
            <div class="conversation active">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Doctor" class="avatar">
                <div class="conversation-info">
                    <h5>Dr. Jane Smith</h5>
                    <p class="last-message">Let's discuss your test results...</p>
                </div>
                <span class="time">2:30 PM</span>
            </div>
            <div class="conversation">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Doctor" class="avatar">
                <div class="conversation-info">
                    <h5>Dr. Michael Johnson</h5>
                    <p class="last-message">Your prescription is ready</p>
                </div>
                <span class="time">Yesterday</span>
            </div>
        </div>

        <!-- Upcoming Appointments -->
        <div class="appointments-list">
            <h4><i class="fas fa-calendar-check"></i> Upcoming Appointments</h4>
            <div class="appointment">
                <div class="appointment-info">
                    <h5>Follow-up Consultation</h5>
                    <p><i class="far fa-clock"></i> Tomorrow, 10:00 AM</p>
                </div>
                <button class="icon-btn small"><i class="fas fa-ellipsis-v"></i></button>
            </div>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div id="imagePreviewModal" class="modal">
        <span class="close-modal" onclick="closeModal('imagePreviewModal')">&times;</span>
        <img class="modal-content" id="previewImage">
        <div id="imageCaption"></div>
    </div>

    <!-- File Preview Modal -->
    <div id="filePreviewModal" class="modal">
        <span class="close-modal" onclick="closeModal('filePreviewModal')">&times;</span>
        <div class="file-preview-content" id="filePreviewContent"></div>
        <a id="fileDownloadLink" class="download-btn" download>
            <i class="fas fa-download"></i> Download File
        </a>
    </div>
</div>

<style>
    /* CSS Variables for Theme */
    :root {
        /* Light Mode Defaults */
        --primary-color: #3182CE;
        --secondary-color: #2C5282;
        --accent-color: #38B2AC;
        --background-color: #FFFFFF;
        --card-bg: #FFFFFF;
        --text-color: #2D3748;
        --text-secondary: #4A5568;
        --light-text: #FFFFFF;
        --border-color: #E2E8F0;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --success-color: #48BB78;
        --warning-color: #ED8936;
        --error-color: #F56565;
        --online-color: #48BB78;
        --offline-color: #A0AEC0;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Dark Mode Overrides */
    body.dark-mode {
        --primary-color: #63B3ED;
        --secondary-color: #4299E1;
        --accent-color: #4FD1C5;
        --background-color: #1A202C;
        --card-bg: #2D3748;
        --text-color: #E2E8F0;
        --text-secondary: #CBD5E0;
        --light-text: #FFFFFF;
        --border-color: #4A5568;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.25), 0 2px 4px -1px rgba(0, 0, 0, 0.15);
        --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.25), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
        --success-color: #68D391;
        --warning-color: #F6AD55;
        --error-color: #FC8181;
        --online-color: #68D391;
        --offline-color: #718096;
    }

    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        transition: var(--transition);
        margin: 0;
        padding: 0;
    }

    .healthcare-chat-container {
        display: flex;
        height: calc(100vh - 80px);
        padding: 20px;
        gap: 20px;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* Chat Main Container */
    .chat-main-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* Info Panel */
    .info-panel {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .platform-info h2 {
        color: var(--primary-color);
        margin: 0;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .platform-info h2 i {
        color: var(--accent-color);
    }

    .platform-description {
        color: var(--text-secondary);
        margin: 8px 0 0;
        font-size: 0.9rem;
    }

    .quick-actions {
        display: flex;
        gap: 10px;
    }

    .action-btn {
        background-color: var(--primary-color);
        color: var(--light-text);
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-btn:hover {
        background-color: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: var(--hover-shadow);
    }

    /* Chat Interface */
    .chat-interface {
        flex: 1;
        display: flex;
        flex-direction: column;
        background-color: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    /* Chat Header */
    .chat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: var(--primary-color);
        color: var(--light-text);
    }

    .recipient-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--light-text);
    }

    .avatar.large {
        width: 80px;
        height: 80px;
    }

    .recipient-info h3 {
        margin: 0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .badge {
        font-size: 0.7rem;
        padding: 3px 8px;
        border-radius: 12px;
        font-weight: 500;
    }

    .badge.online {
        background-color: var(--online-color);
    }

    .badge.offline {
        background-color: var(--offline-color);
    }

    .specialty {
        margin: 4px 0 0;
        font-size: 0.8rem;
        opacity: 0.9;
    }

    .chat-actions {
        display: flex;
        gap: 10px;
    }

    .icon-btn {
        background: none;
        border: none;
        color: var(--light-text);
        font-size: 1rem;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .icon-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .icon-btn.small {
        width: 30px;
        height: 30px;
        font-size: 0.9rem;
    }

    /* Chat Messages */
    .chat-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background-image: linear-gradient(rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.05)), 
                          url('https://www.transparenttextures.com/patterns/medical.png');
        background-color: var(--card-bg);
    }

    body.dark-mode .chat-messages {
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                          url('https://www.transparenttextures.com/patterns/medical.png');
    }

    .message {
        display: flex;
        margin-bottom: 15px;
    }

    .message.user {
        justify-content: flex-end;
    }

    .message.other {
        justify-content: flex-start;
    }

    .message-content {
        max-width: 70%;
        padding: 12px 16px;
        border-radius: 18px;
        position: relative;
        word-wrap: break-word;
        box-shadow: var(--shadow);
    }

    .message.user .message-content {
        background-color: var(--primary-color);
        color: var(--light-text);
        border-bottom-right-radius: 4px;
    }

    .message.other .message-content {
        background-color: var(--border-color);
        color: var(--text-color);
        border-bottom-left-radius: 4px;
    }

    .message-text {
        margin: 0;
        line-height: 1.5;
    }

    .message-meta {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-top: 5px;
        font-size: 0.75rem;
        opacity: 0.8;
    }

    .message-time {
        margin-right: 5px;
    }

    .message-status {
        font-size: 0.7rem;
    }

    /* File and Image Messages */
    .message-file {
        display: inline-block;
        margin-top: 8px;
        padding: 8px 12px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: var(--light-text);
        text-decoration: none;
        transition: var(--transition);
    }

    .message.other .message-file {
        background-color: rgba(0, 0, 0, 0.1);
        color: var(--text-color);
    }

    .message-file:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .message.other .message-file:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .message-file i {
        margin-right: 5px;
    }

    .message-image {
        max-width: 100%;
        max-height: 300px;
        border-radius: 8px;
        margin-top: 8px;
        cursor: pointer;
        transition: var(--transition);
    }

    .message-image:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    /* Chat Input */
    .chat-input-container {
        display: flex;
        padding: 15px;
        background-color: var(--card-bg);
        border-top: 1px solid var(--border-color);
        align-items: center;
    }

    .attachment-options {
        display: flex;
        gap: 5px;
        margin-right: 10px;
    }

    .chat-input-container textarea {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 24px;
        resize: none;
        font-family: 'Poppins', sans-serif;
        background-color: var(--background-color);
        color: var(--text-color);
        transition: var(--transition);
        max-height: 120px;
    }

    .chat-input-container textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(72, 47, 247, 0.1);
    }

    .send-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background-color: var(--primary-color);
        color: var(--light-text);
        border: none;
        margin-left: 10px;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .send-btn:hover {
        background-color: var(--secondary-color);
        transform: scale(1.05);
    }

    /* Side Panel */
    .side-panel {
        width: 320px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .user-profile {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        text-align: center;
    }

    .user-profile h3 {
        margin: 15px 0 5px;
        font-size: 1.2rem;
    }

    .user-role {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin: 0 0 15px;
    }

    .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .profile-btn {
        background-color: var(--border-color);
        color: var(--text-color);
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .profile-btn:hover {
        background-color: var(--primary-color);
        color: var(--light-text);
    }

    /* Conversations List */
    .conversations-list, .appointments-list {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 15px;
        box-shadow: var(--shadow);
    }

    .conversations-list h4, .appointments-list h4 {
        margin: 0 0 15px;
        font-size: 1rem;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .conversation {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 8px;
    }

    .conversation:hover {
        background-color: var(--border-color);
    }

    .conversation.active {
        background-color: var(--primary-color);
        color: var(--light-text);
    }

    .conversation.active .last-message {
        color: rgba(255, 255, 255, 0.8);
    }

    .conversation-info {
        flex: 1;
        margin-left: 10px;
    }

    .conversation-info h5 {
        margin: 0;
        font-size: 0.95rem;
    }

    .last-message {
        margin: 3px 0 0;
        font-size: 0.8rem;
        color: var(--text-secondary);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .time {
        font-size: 0.7rem;
        opacity: 0.7;
    }

    /* Appointments List */
    .appointment {
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 8px;
        transition: var(--transition);
        margin-bottom: 8px;
    }

    .appointment:hover {
        background-color: var(--border-color);
    }

    .appointment-info {
        flex: 1;
    }

    .appointment-info h5 {
        margin: 0;
        font-size: 0.95rem;
    }

    .appointment-info p {
        margin: 3px 0 0;
        font-size: 0.8rem;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Modals */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        overflow: auto;
        animation: fadeIn 0.3s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal-content {
        display: block;
        margin: 5% auto;
        max-width: 80%;
        max-height: 80%;
        border-radius: 8px;
    }

    .close-modal {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        transition: var(--transition);
    }

    .close-modal:hover {
        color: var(--accent-color);
    }

    .file-preview-content {
        background-color: var(--card-bg);
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        max-width: 80%;
        max-height: 70vh;
        overflow: auto;
    }

    .download-btn {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 10px;
        background-color: var(--primary-color);
        color: var(--light-text);
        text-align: center;
        border-radius: 8px;
        text-decoration: none;
        transition: var(--transition);
    }

    .download-btn:hover {
        background-color: var(--secondary-color);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .healthcare-chat-container {
            flex-direction: column;
            height: auto;
        }
        
        .side-panel {
            width: 100%;
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .user-profile, .conversations-list, .appointments-list {
            flex: 1;
            min-width: 300px;
        }
    }

    @media (max-width: 768px) {
        .healthcare-chat-container {
            padding: 10px;
        }
        
        .info-panel {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .quick-actions {
            width: 100%;
            flex-direction: column;
        }
        
        .action-btn {
            width: 100%;
            justify-content: center;
        }
        
        .chat-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .chat-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .message-content {
            max-width: 85%;
        }
    }

    @media (max-width: 480px) {
        .message-content {
            max-width: 90%;
        }
        
        .chat-input-container {
            padding: 10px;
        }
        
        .attachment-options {
            margin-right: 5px;
        }
        
        .send-btn {
            width: 40px;
            height: 40px;
            margin-left: 5px;
        }
    }
</style>

<script>
    // Sample Data (Replace with actual data from backend)
    const conversations = {
        currentConversation: 1,
        messages: [
            {
                id: 1,
                conversationId: 1,
                senderId: 1, // User
                senderName: "John Doe",
                senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                receiverId: 2, // Doctor
                receiverName: "Dr. Jane Smith",
                receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                content: "Hello Doctor, I have a question about my recent test results.",
                timestamp: "2023-10-15T10:00:00",
                isRead: true,
                type: "text"
            },
            {
                id: 2,
                conversationId: 1,
                senderId: 2,
                senderName: "Dr. Jane Smith",
                senderAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                receiverId: 1,
                receiverName: "John Doe",
                receiverAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                content: "Hello John, I've reviewed your test results. Everything looks normal except for slightly elevated cholesterol levels.",
                timestamp: "2023-10-15T10:05:00",
                isRead: true,
                type: "text"
            },
            {
                id: 3,
                conversationId: 1,
                senderId: 1,
                senderName: "John Doe",
                senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                receiverId: 2,
                receiverName: "Dr. Jane Smith",
                receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                content: "Should I be concerned about the cholesterol levels?",
                timestamp: "2023-10-15T10:10:00",
                isRead: true,
                type: "text"
            },
            {
                id: 4,
                conversationId: 1,
                senderId: 2,
                senderName: "Dr. Jane Smith",
                senderAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                receiverId: 1,
                receiverName: "John Doe",
                receiverAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                content: "Not significantly. I'm attaching a dietary plan that should help. Let's schedule a follow-up in 3 months.",
                timestamp: "2023-10-15T10:15:00",
                isRead: true,
                type: "text"
            },
            {
                id: 5,
                conversationId: 1,
                senderId: 2,
                senderName: "Dr. Jane Smith",
                senderAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                receiverId: 1,
                receiverName: "John Doe",
                receiverAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                content: "diet_plan.pdf",
                timestamp: "2023-10-15T10:16:00",
                isRead: true,
                type: "file",
                fileType: "pdf",
                fileSize: "2.4 MB"
            },
            {
                id: 6,
                conversationId: 1,
                senderId: 1,
                senderName: "John Doe",
                senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                receiverId: 2,
                receiverName: "Dr. Jane Smith",
                receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                content: "https://images.unsplash.com/photo-1505751172876-fa1923c5c528",
                timestamp: "2023-10-15T10:20:00",
                isRead: false,
                type: "image",
                altText: "Photo of my recent rash"
            }
        ]
    };

    // DOM Elements
    const chatMessages = document.getElementById("chatMessages");
    const messageInput = document.getElementById("messageInput");
    const fileInput = document.getElementById("fileInput");
    const imageInput = document.getElementById("imageInput");

    // Initialize the chat
    document.addEventListener("DOMContentLoaded", function() {
        renderMessages();
        setupEventListeners();
    });

    // Render Messages
    function renderMessages() {
        chatMessages.innerHTML = "";
        
        const currentMessages = conversations.messages.filter(
            msg => msg.conversationId === conversations.currentConversation
        );
        
        currentMessages.forEach(message => {
            const messageDiv = document.createElement("div");
            messageDiv.classList.add("message", message.senderId === 1 ? "user" : "other");
            
            const messageContent = document.createElement("div");
            messageContent.classList.add("message-content");
            
            // Sender info (for group chats)
            if (message.senderId !== 1) {
                const senderInfo = document.createElement("div");
                senderInfo.classList.add("sender-info");
                senderInfo.textContent = message.senderName;
                messageContent.appendChild(senderInfo);
            }
            
            // Message content based on type
            if (message.type === "text") {
                const messageText = document.createElement("p");
                messageText.classList.add("message-text");
                messageText.textContent = message.content;
                messageContent.appendChild(messageText);
            } 
            else if (message.type === "file") {
                const fileLink = document.createElement("a");
                fileLink.classList.add("message-file");
                fileLink.href = "#";
                fileLink.onclick = (e) => {
                    e.preventDefault();
                    previewFile(message.content, message.fileType);
                };
                
                const fileIcon = document.createElement("i");
                fileIcon.classList.add("fas", getFileIcon(message.fileType));
                fileLink.appendChild(fileIcon);
                
                const fileName = document.createTextNode(` ${message.content} (${message.fileSize})`);
                fileLink.appendChild(fileName);
                
                messageContent.appendChild(fileLink);
            } 
            else if (message.type === "image") {
                const imageContainer = document.createElement("div");
                const messageImage = document.createElement("img");
                messageImage.classList.add("message-image");
                messageImage.src = message.content;
                messageImage.alt = message.altText || "Image attachment";
                messageImage.onclick = () => previewImage(message.content);
                imageContainer.appendChild(messageImage);
                messageContent.appendChild(imageContainer);
            }
            
            // Message metadata
            const messageMeta = document.createElement("div");
            messageMeta.classList.add("message-meta");
            
            const messageTime = document.createElement("span");
            messageTime.classList.add("message-time");
            messageTime.textContent = formatTime(message.timestamp);
            messageMeta.appendChild(messageTime);
            
            if (message.senderId === 1) {
                const messageStatus = document.createElement("span");
                messageStatus.classList.add("message-status");
                messageStatus.innerHTML = message.isRead ? 
                    '<i class="fas fa-check-double" style="color: var(--accent-color)"></i>' : 
                    '<i class="fas fa-check"></i>';
                messageMeta.appendChild(messageStatus);
            }
            
            messageContent.appendChild(messageMeta);
            messageDiv.appendChild(messageContent);
            chatMessages.appendChild(messageDiv);
        });
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Format timestamp
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    // Get appropriate file icon
    function getFileIcon(fileType) {
        const fileTypes = {
            pdf: "fa-file-pdf",
            doc: "fa-file-word",
            docx: "fa-file-word",
            xls: "fa-file-excel",
            xlsx: "fa-file-excel",
            ppt: "fa-file-powerpoint",
            pptx: "fa-file-powerpoint",
            txt: "fa-file-alt",
            zip: "fa-file-archive",
            jpg: "fa-file-image",
            jpeg: "fa-file-image",
            png: "fa-file-image",
            gif: "fa-file-image"
        };
        
        const extension = fileType ? fileType.split('.').pop().toLowerCase() : '';
        return fileTypes[extension] || "fa-file";
    }

    // Setup event listeners
    function setupEventListeners() {
        // Auto-resize textarea
        messageInput.addEventListener("input", function() {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });
        
        // Send message on Enter (but allow Shift+Enter for new line)
        messageInput.addEventListener("keydown", function(e) {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
        
        // Handle file upload
        fileInput.addEventListener("change", function() {
            if (this.files.length > 0) {
                const file = this.files[0];
                sendFile(file);
            }
        });
        
        // Handle image upload
        imageInput.addEventListener("change", function() {
            if (this.files.length > 0) {
                const file = this.files[0];
                if (file.type.startsWith("image/")) {
                    sendImage(file);
                } else {
                    alert("Please select an image file");
                }
            }
        });
    }

    // Send text message
    function sendMessage() {
        const messageText = messageInput.value.trim();
        if (!messageText) return;
        
        // Create new message object
        const newMessage = {
            id: conversations.messages.length + 1,
            conversationId: conversations.currentConversation,
            senderId: 1,
            senderName: "John Doe",
            senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
            receiverId: 2,
            receiverName: "Dr. Jane Smith",
            receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
            content: messageText,
            timestamp: new Date().toISOString(),
            isRead: false,
            type: "text"
        };
        
        // Add to messages array
        conversations.messages.push(newMessage);
        
        // Clear input and re-render
        messageInput.value = "";
        messageInput.style.height = "auto";
        renderMessages();
        
        // Simulate response after 1-3 seconds
        setTimeout(simulateResponse, 1000 + Math.random() * 2000);
    }

    // Send file
    function sendFile(file) {
        const fileSize = (file.size / (1024 * 1024)).toFixed(1) + " MB";
        const fileType = file.name.split('.').pop().toLowerCase();
        
        const newMessage = {
            id: conversations.messages.length + 1,
            conversationId: conversations.currentConversation,
            senderId: 1,
            senderName: "John Doe",
            senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
            receiverId: 2,
            receiverName: "Dr. Jane Smith",
            receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
            content: file.name,
            timestamp: new Date().toISOString(),
            isRead: false,
            type: "file",
            fileType: fileType,
            fileSize: fileSize
        };
        
        conversations.messages.push(newMessage);
        renderMessages();
        fileInput.value = "";
        
        setTimeout(simulateResponse, 1000 + Math.random() * 2000);
    }

    // Send image
    function sendImage(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const newMessage = {
                id: conversations.messages.length + 1,
                conversationId: conversations.currentConversation,
                senderId: 1,
                senderName: "John Doe",
                senderAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                receiverId: 2,
                receiverName: "Dr. Jane Smith",
                receiverAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                content: e.target.result,
                timestamp: new Date().toISOString(),
                isRead: false,
                type: "image",
                altText: "Uploaded image"
            };
            
            conversations.messages.push(newMessage);
            renderMessages();
            imageInput.value = "";
            
            setTimeout(simulateResponse, 1000 + Math.random() * 2000);
        };
        reader.readAsDataURL(file);
    }

    // Simulate doctor's response
    function simulateResponse() {
        const responses = [
            "I'll review this and get back to you shortly.",
            "Thanks for sharing this information.",
            "This is helpful for our consultation.",
            "I've made a note of this for our next appointment.",
            "Let me check this and I'll respond in detail."
        ];
        
        const randomResponse = responses[Math.floor(Math.random() * responses.length)];
        
        const newMessage = {
            id: conversations.messages.length + 1,
            conversationId: conversations.currentConversation,
            senderId: 2,
            senderName: "Dr. Jane Smith",
            senderAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
            receiverId: 1,
            receiverName: "John Doe",
            receiverAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
            content: randomResponse,
            timestamp: new Date().toISOString(),
            isRead: false,
            type: "text"
        };
        
        conversations.messages.push(newMessage);
        renderMessages();
    }

    // Show image upload dialog
    function showImageUpload() {
        imageInput.click();
    }

    // Preview image in modal
    function previewImage(imageSrc) {
        const modal = document.getElementById("imagePreviewModal");
        const modalImg = document.getElementById("previewImage");
        modalImg.src = imageSrc;
        modal.style.display = "block";
    }

    // Preview file in modal
    function previewFile(filename, fileType) {
        const modal = document.getElementById("filePreviewModal");
        const previewContent = document.getElementById("filePreviewContent");
        const downloadLink = document.getElementById("fileDownloadLink");
        
        // For demo purposes, we'll just show the filename
        previewContent.innerHTML = `
            <h3>${filename}</h3>
            <p><i class="fas ${getFileIcon(fileType)}"></i> ${fileType ? fileType.toUpperCase() + ' File' : 'File'}</p>
            <p>This is a preview of the file. In a real application, you would see the actual file content here.</p>
        `;
        
        // Set download link (in a real app, this would point to the actual file)
        downloadLink.href = "#";
        downloadLink.setAttribute("download", filename);
        downloadLink.onclick = (e) => {
            e.preventDefault();
            alert("In a real application, this would download the file.");
        };
        
        modal.style.display = "block";
    }

    // Close modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    // Show appointment modal
    function showAppointmentModal() {
        alert("Appointment scheduling modal would appear here.");
    }

    // Show prescription modal
    function showPrescriptionModal() {
        alert("Prescription request modal would appear here.");
    }
</script>
@endsection