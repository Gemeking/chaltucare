@extends('layouts.app')

@section('content')
<div class="video-consultation-container">
    <!-- Call Header with Doctor Info -->
    <div class="call-header">
        <div class="doctor-info">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Dr. Jane Smith" class="doctor-avatar">
            <div class="doctor-details">
                <h2>Dr. Jane Smith</h2>
                <p class="specialization">Psychiatrist | 15 years experience</p>
                <div class="call-status" id="callStatus">
                    <i class="fas fa-circle connecting"></i> Connecting...
                </div>
                <div class="connection-quality">
                    <span class="quality-indicator good"></span>
                    <span>Connection Quality: <strong>Good</strong></span>
                </div>
            </div>
        </div>
        <div class="call-meta">
            <div class="call-duration" id="callDuration">00:00:00</div>
            <div class="encryption-notice">
                <i class="fas fa-lock"></i> End-to-end encrypted
            </div>
        </div>
    </div>

    <!-- Video Grid -->
    <div class="video-grid">
        <!-- Doctor's Video Feed -->
        <div class="video-container doctor-video" id="doctorVideoContainer">
            <div class="video-placeholder">
                <i class="fas fa-user-md"></i>
                <p>Waiting for doctor to join...</p>
            </div>
            <div class="video-overlay">Dr. Jane Smith</div>
        </div>
        
        <!-- Patient's Video Feed (PiP) -->
        <div class="video-container patient-video" id="patientVideoContainer">
            <div class="video-placeholder">
                <i class="fas fa-user"></i>
                <p>Your camera</p>
            </div>
            <div class="video-overlay">You</div>
        </div>

        <!-- Camera Error Modal -->
        <div class="error-modal" id="cameraErrorModal">
            <div class="modal-content">
                <h3><i class="fas fa-exclamation-triangle"></i> Camera Access Required</h3>
                <p>We couldn't access your camera. Please ensure:</p>
                <ul>
                    <li>Your camera is properly connected</li>
                    <li>You've granted camera permissions to this site</li>
                    <li>No other application is using the camera</li>
                </ul>
                <div class="troubleshooting-tips">
                    <p><strong>Troubleshooting:</strong></p>
                    <ol>
                        <li>Refresh this page and allow camera access when prompted</li>
                        <li>Check your browser settings for blocked permissions</li>
                        <li>Try using a different browser (Chrome/Firefox recommended)</li>
                    </ol>
                </div>
                <div class="modal-actions">
                    <button id="retryCamera">Retry Camera</button>
                    <button id="continueWithoutVideo">Continue Without Video</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Call Controls -->
    <div class="call-controls">
        <div class="control-group">
            <button class="control-btn" id="toggleAudio" title="Mute/Unmute">
                <i class="fas fa-microphone"></i>
            </button>
            <span class="control-label">Audio</span>
        </div>
        <div class="control-group">
            <button class="control-btn" id="toggleVideo" title="Video On/Off">
                <i class="fas fa-video"></i>
            </button>
            <span class="control-label">Video</span>
        </div>
        <div class="control-group">
            <button class="control-btn" id="screenShare" title="Share Screen">
                <i class="fas fa-desktop"></i>
            </button>
            <span class="control-label">Share</span>
        </div>
        <div class="control-group">
            <button class="control-btn btn-end-call" id="endCall" title="End Call">
                <i class="fas fa-phone-slash"></i>
            </button>
            <span class="control-label">End</span>
        </div>
    </div>

    <!-- Consultation Sidebar -->
    <div class="consultation-sidebar" id="consultationSidebar">
        <div class="sidebar-header">
            <h3>Consultation Tools</h3>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
        
        <div class="sidebar-content">
            <!-- Patient Notes Section -->
            <div class="sidebar-section">
                <h4><i class="fas fa-file-medical"></i> Session Notes</h4>
                <textarea placeholder="Take notes during your consultation..." class="notes-textarea"></textarea>
                <button class="sidebar-btn" id="saveNotes">
                    <i class="fas fa-save"></i> Save Notes
                </button>
            </div>
            
            <!-- Prescription Section -->
            <div class="sidebar-section">
                <h4><i class="fas fa-prescription-bottle-alt"></i> Prescriptions</h4>
                <div class="prescription-list">
                    <p class="empty-state">No prescriptions yet</p>
                </div>
            </div>
            
            <!-- Resources Section -->
            <div class="sidebar-section">
                <h4><i class="fas fa-book-medical"></i> Resources</h4>
                <ul class="resource-list">
                    <li>
                        <a href="#"><i class="fas fa-file-pdf"></i> Depression Management Guide</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-video"></i> Anxiety Relief Exercises</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Local Testing Notice -->
    <div class="testing-notice">
        <p><strong>Note:</strong> Running in local test mode. No actual video connection is established.</p>
        <button id="simulateDoctorJoin">Simulate Doctor Joining</button>
        <button id="simulateCallEnd">Simulate Call End</button>
        <button id="simulateCameraError">Simulate Camera Error</button>
    </div>
</div>

<style>
    /* Base Styles */
    :root {
        --primary-color: #3182CE;
        --primary-dark: #2C5282;
        --success-color: #38A169;
        --warning-color: #DD6B20;
        --danger-color: #E53E3E;
        --text-color: #2D3748;
        --text-light: #718096;
        --bg-light: #F7FAFC;
        --border-color: #E2E8F0;
    }
    
    .video-consultation-container {
        display: flex;
        flex-direction: column;
        height: 100vh;
        font-family: 'Poppins', sans-serif;
        position: relative;
        color: var(--text-color);
    }

    /* Call Header */
    .call-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 25px;
        background-color: var(--bg-light);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        z-index: 10;
    }

    .doctor-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .doctor-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
    }

    .doctor-details h2 {
        margin: 0;
        font-size: 1.4rem;
        color: var(--primary-dark);
    }

    .specialization {
        margin: 5px 0 0;
        font-size: 0.95rem;
        color: var(--text-light);
    }

    .call-status {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .connection-quality {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.8rem;
        margin-top: 3px;
    }
    
    .quality-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    
    .quality-indicator.good {
        background-color: var(--success-color);
    }
    
    .quality-indicator.fair {
        background-color: var(--warning-color);
    }
    
    .quality-indicator.poor {
        background-color: var(--danger-color);
    }

    .call-status i {
        font-size: 0.7rem;
    }

    .connecting { color: var(--warning-color); }
    .connected { color: var(--success-color); }
    .error { color: var(--danger-color); }

    .call-meta {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    
    .call-duration {
        font-family: monospace;
        font-size: 1.2rem;
        font-weight: 500;
    }
    
    .encryption-notice {
        font-size: 0.8rem;
        color: var(--text-light);
        margin-top: 5px;
    }

    /* Video Grid */
    .video-grid {
        flex: 1;
        position: relative;
        background-color: #000;
    }

    .video-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: #000;
    }

    .patient-video {
        width: 25%;
        height: 25%;
        bottom: 20px;
        right: 20px;
        left: auto;
        top: auto;
        border-radius: 8px;
        border: 2px solid var(--primary-color);
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        z-index: 2;
    }

    .video-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .video-placeholder i {
        font-size: 3rem;
        margin-bottom: 10px;
        color: var(--primary-color);
    }
    
    .video-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: rgba(0,0,0,0.6);
        color: white;
        padding: 5px 10px;
        font-size: 0.8rem;
        z-index: 3;
    }

    /* Camera Error Modal */
    .error-modal {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.8);
        z-index: 10;
        display: none;
        justify-content: center;
        align-items: center;
    }
    
    .error-modal.active {
        display: flex;
    }
    
    .modal-content {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        max-width: 500px;
        width: 90%;
    }
    
    .modal-content h3 {
        margin-top: 0;
        color: var(--danger-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .modal-content ul, .modal-content ol {
        padding-left: 20px;
    }
    
    .troubleshooting-tips {
        background-color: var(--bg-light);
        padding: 10px;
        border-radius: 5px;
        margin: 15px 0;
    }
    
    .modal-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .modal-actions button {
        flex: 1;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-weight: 500;
    }
    
    #retryCamera {
        background-color: var(--primary-color);
        color: white;
    }
    
    #continueWithoutVideo {
        background-color: var(--border-color);
    }

    /* Call Controls */
    .call-controls {
        display: flex;
        justify-content: center;
        gap: 30px;
        padding: 15px;
        background-color: var(--bg-light);
        box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
        z-index: 5;
    }
    
    .control-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .control-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: white;
        color: var(--primary-color);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .control-btn:hover {
        background-color: var(--primary-color);
        color: white;
        transform: scale(1.05);
    }
    
    .control-btn.active {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-end-call {
        background-color: var(--danger-color);
        color: white;
    }

    .btn-end-call:hover {
        background-color: #c53030;
    }
    
    .control-label {
        font-size: 0.8rem;
        color: var(--text-light);
    }

    /* Consultation Sidebar */
    .consultation-sidebar {
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 100%;
        background-color: white;
        box-shadow: -2px 0 5px rgba(0,0,0,0.1);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        z-index: 8;
        display: flex;
        flex-direction: column;
    }
    
    .consultation-sidebar.open {
        transform: translateX(0);
    }
    
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid var(--border-color);
    }
    
    .sidebar-header h3 {
        margin: 0;
        font-size: 1.1rem;
    }
    
    .sidebar-toggle {
        background: none;
        border: none;
        cursor: pointer;
        color: var(--text-light);
    }
    
    .sidebar-content {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
    }
    
    .sidebar-section {
        margin-bottom: 25px;
    }
    
    .sidebar-section h4 {
        margin: 0 0 15px 0;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-dark);
    }
    
    .notes-textarea {
        width: 100%;
        height: 120px;
        padding: 10px;
        border: 1px solid var(--border-color);
        border-radius: 5px;
        resize: none;
        margin-bottom: 10px;
        font-family: inherit;
    }
    
    .sidebar-btn {
        width: 100%;
        padding: 8px;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .prescription-list, .resource-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .empty-state {
        color: var(--text-light);
        font-style: italic;
        font-size: 0.9rem;
        text-align: center;
        padding: 10px;
    }
    
    .resource-list a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 0;
        color: var(--primary-color);
        text-decoration: none;
    }
    
    .resource-list a:hover {
        text-decoration: underline;
    }

    /* Testing Notice */
    .testing-notice {
        position: absolute;
        bottom: 90px;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 10px;
        background-color: rgba(255, 193, 7, 0.2);
        border-top: 1px solid var(--warning-color);
        z-index: 6;
    }

    .testing-notice p {
        margin: 0 0 10px;
        color: #856404;
    }

    .testing-notice button {
        padding: 5px 15px;
        margin: 0 5px;
        border-radius: 4px;
        border: 1px solid var(--warning-color);
        background-color: #fff3cd;
        cursor: pointer;
    }

    .testing-notice button:hover {
        background-color: #ffe8a1;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .call-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .call-meta {
            align-items: flex-start;
            width: 100%;
        }
        
        .patient-video {
            width: 30%;
            height: 20%;
        }
        
        .consultation-sidebar {
            width: 250px;
        }
    }
</style>

<script>
    // DOM Elements
    const callStatus = document.getElementById('callStatus');
    const callDuration = document.getElementById('callDuration');
    const doctorVideoContainer = document.getElementById('doctorVideoContainer');
    const patientVideoContainer = document.getElementById('patientVideoContainer');
    const toggleAudioBtn = document.getElementById('toggleAudio');
    const toggleVideoBtn = document.getElementById('toggleVideo');
    const screenShareBtn = document.getElementById('screenShare');
    const endCallBtn = document.getElementById('endCall');
    const simulateDoctorBtn = document.getElementById('simulateDoctorJoin');
    const simulateEndBtn = document.getElementById('simulateCallEnd');
    const simulateCameraErrorBtn = document.getElementById('simulateCameraError');
    const cameraErrorModal = document.getElementById('cameraErrorModal');
    const retryCameraBtn = document.getElementById('retryCamera');
    const continueWithoutVideoBtn = document.getElementById('continueWithoutVideo');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const consultationSidebar = document.getElementById('consultationSidebar');
    const saveNotesBtn = document.getElementById('saveNotes');

    // Simulated call state
    let callActive = false;
    let callStartTime;
    let callTimer;
    let videoEnabled = true;
    let audioEnabled = true;
    let sidebarOpen = false;

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Setup event listeners
        setupEventListeners();
        
        // For testing, we'll automatically "connect" after 2 seconds
        setTimeout(() => {
            callStatus.innerHTML = '<i class="fas fa-circle connected"></i> Connected (Test Mode)';
            callActive = true;
            startCallTimer();
            
            // Try to initialize camera (simulated)
            initializeCamera();
        }, 2000);
    });

    // Setup event listeners
    function setupEventListeners() {
        // Toggle audio (simulated)
        toggleAudioBtn.addEventListener('click', function() {
            audioEnabled = !audioEnabled;
            this.classList.toggle('active', !audioEnabled);
            updateAudioState();
        });

        // Toggle video (simulated)
        toggleVideoBtn.addEventListener('click', function() {
            videoEnabled = !videoEnabled;
            this.classList.toggle('active', !videoEnabled);
            updateVideoState();
        });
        
        // Screen share (simulated)
        screenShareBtn.addEventListener('click', function() {
            alert('Screen sharing would be enabled in a real implementation');
        });

        // End call
        endCallBtn.addEventListener('click', endCall);

        // Simulate doctor joining
        simulateDoctorBtn.addEventListener('click', function() {
            if (!callActive) return;
            
            doctorVideoContainer.innerHTML = `
                <video autoplay playsinline style="width:100%;height:100%;object-fit:cover;"></video>
                <div class="video-overlay">Dr. Jane Smith</div>
            `;
            callStatus.innerHTML = '<i class="fas fa-circle connected"></i> Dr. Jane Smith joined';
        });

        // Simulate call end
        simulateEndBtn.addEventListener('click', endCall);
        
        // Simulate camera error
        simulateCameraErrorBtn.addEventListener('click', showCameraError);
        
        // Camera error modal buttons
        retryCameraBtn.addEventListener('click', function() {
            cameraErrorModal.classList.remove('active');
            initializeCamera();
        });
        
        continueWithoutVideoBtn.addEventListener('click', function() {
            cameraErrorModal.classList.remove('active');
            videoEnabled = false;
            updateVideoState();
        });
        
        // Sidebar toggle
        sidebarToggle.addEventListener('click', toggleSidebar);
        
        // Save notes
        saveNotesBtn.addEventListener('click', function() {
            alert('Notes saved successfully');
        });
    }
    
    // Initialize camera (simulated)
    function initializeCamera() {
        // In a real implementation, this would use the WebRTC API
        console.log('Attempting to access camera...');
        
        // Simulate 80% chance of success
        if (Math.random() > 0.2) {
            patientVideoContainer.innerHTML = `
                <video autoplay muted playsinline style="width:100%;height:100%;object-fit:cover;"></video>
                <div class="video-overlay">You</div>
            `;
            videoEnabled = true;
            toggleVideoBtn.classList.remove('active');
        } else {
            showCameraError();
        }
    }
    
    // Show camera error modal
    function showCameraError() {
        cameraErrorModal.classList.add('active');
    }
    
    // Update audio state
    function updateAudioState() {
        console.log(`Audio ${audioEnabled ? 'unmuted' : 'muted'}`);
        // In a real implementation, this would mute/unmute the audio track
    }
    
    // Update video state
    function updateVideoState() {
        console.log(`Video ${videoEnabled ? 'on' : 'off'}`);
        
        if (videoEnabled) {
            patientVideoContainer.innerHTML = `
                <video autoplay muted playsinline style="width:100%;height:100%;object-fit:cover;"></video>
                <div class="video-overlay">You</div>
            `;
        } else {
            patientVideoContainer.innerHTML = `
                <div class="video-placeholder">
                    <i class="fas fa-user"></i>
                    <p>Camera off</p>
                </div>
                <div class="video-overlay">You</div>
            `;
        }
    }
    
    // Toggle sidebar
    function toggleSidebar() {
        sidebarOpen = !sidebarOpen;
        consultationSidebar.classList.toggle('open', sidebarOpen);
        sidebarToggle.innerHTML = sidebarOpen ? 
            '<i class="fas fa-chevron-right"></i>' : 
            '<i class="fas fa-chevron-left"></i>';
    }

    // Start call timer
    function startCallTimer() {
        callStartTime = new Date();
        callTimer = setInterval(updateCallDuration, 1000);
    }

    // Update call duration display
    function updateCallDuration() {
        const now = new Date();
        const elapsed = new Date(now - callStartTime);
        const hours = String(elapsed.getUTCHours()).padStart(2, '0');
        const minutes = String(elapsed.getUTCMinutes()).padStart(2, '0');
        const seconds = String(elapsed.getUTCSeconds()).padStart(2, '0');
        callDuration.textContent = `${hours}:${minutes}:${seconds}`;
    }

    // End the call
    function endCall() {
        clearInterval(callTimer);
        callActive = false;
        callStatus.innerHTML = '<i class="fas fa-circle error"></i> Call ended';
        
        // Simulate doctor leaving
        doctorVideoContainer.innerHTML = `
            <div class="video-placeholder">
                <i class="fas fa-user-md"></i>
                <p>Doctor has left the call</p>
            </div>
        `;
        
        // Show call ended message
        setTimeout(() => {
            alert('Call ended. Thank you for using our service!');
            // In a real implementation, redirect to feedback page
        }, 500);
    }
</script>
@endsection