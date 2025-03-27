@extends('layouts.app')

@section('content')
<div class="appointment-container">
    <!-- Header Section -->
    <div class="appointment-header">
        <h1><i class="fas fa-calendar-alt"></i> Appointment Management</h1>
        <p>Schedule and manage your consultations with healthcare professionals</p>
    </div>

    <!-- Two-column Layout -->
    <div class="appointment-layout">
        <!-- Left Column - Schedule New Appointment -->
        <div class="appointment-scheduler">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-plus-circle"></i> Schedule New Appointment</h2>
                </div>
                <div class="card-body">
                    <form id="appointmentForm">
                        <div class="form-group">
                            <label for="advisorSelect">Select Specialist</label>
                            <select id="advisorSelect" class="form-control">
                                <option value="">-- Select a specialist --</option>
                                <option value="1">Dr. Jane Smith - Psychiatrist</option>
                                <option value="2">Dr. Michael Johnson - Cardiologist</option>
                                <option value="3">Dr. Sarah Williams - Neurologist</option>
                                <option value="4">Dr. Robert Brown - General Physician</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="appointmentDate">Date & Time</label>
                            <input type="datetime-local" id="appointmentDate" class="form-control" min="{{ date('Y-m-d\TH:i') }}">
                        </div>

                        <div class="form-group">
                            <label for="appointmentReason">Reason for Appointment</label>
                            <textarea id="appointmentReason" class="form-control" rows="3" placeholder="Briefly describe the reason for your appointment..."></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-calendar-check"></i> Schedule Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Upcoming Appointment Highlight -->
            <div class="card upcoming-card" id="upcomingAppointmentCard">
                <div class="card-header">
                    <h2><i class="fas fa-bell"></i> Your Next Appointment</h2>
                </div>
                <div class="card-body">
                    <div class="empty-state" id="upcomingEmptyState">
                        <i class="fas fa-calendar-plus"></i>
                        <p>No upcoming appointments scheduled</p>
                    </div>
                    <div class="upcoming-details" id="upcomingDetails" style="display: none;">
                        <div class="advisor-info">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Doctor" class="advisor-avatar">
                            <div class="advisor-meta">
                                <h3 class="advisor-name">Dr. Jane Smith</h3>
                                <p class="advisor-specialty">Psychiatrist</p>
                                <div class="appointment-time">
                                    <i class="fas fa-clock"></i>
                                    <span class="time-text">Tomorrow at 2:00 PM</span>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-actions">
                            <button class="btn-outline" id="rescheduleBtn">
                                <i class="fas fa-calendar-alt"></i> Reschedule
                            </button>
                            <button class="btn-danger" id="cancelBtn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                            <button class="btn-primary" id="joinBtn">
                                <i class="fas fa-video"></i> Join Consultation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Appointment List -->
        <div class="appointment-list">
            <div class="card">
                <div class="card-header">
                    <div class="header-actions">
                        <h2><i class="fas fa-list-ul"></i> Your Appointments</h2>
                        <div class="view-options">
                            <button class="view-option active" data-filter="all">All</button>
                            <button class="view-option" data-filter="upcoming">Upcoming</button>
                            <button class="view-option" data-filter="past">Past</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="appointment-table">
                        <div class="table-header">
                            <div class="header-cell">Specialist</div>
                            <div class="header-cell">Date & Time</div>
                            <div class="header-cell">Status</div>
                            <div class="header-cell">Actions</div>
                        </div>
                        <div class="table-body" id="appointmentTableBody">
                            <!-- Appointment items will be added here dynamically -->
                            
                            <!-- Sample Appointment Items -->
                            <div class="table-row" data-status="confirmed" data-date="2023-06-15T14:00:00">
                                <div class="table-cell">
                                    <div class="advisor-info-sm">
                                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Doctor" class="advisor-avatar-sm">
                                        <div>
                                            <div class="advisor-name">Dr. Jane Smith</div>
                                            <div class="advisor-specialty">Psychiatrist</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="date-text">Jun 15, 2023</div>
                                    <div class="time-text">2:00 PM - 2:30 PM</div>
                                </div>
                                <div class="table-cell">
                                    <span class="status-badge confirmed">Confirmed</span>
                                </div>
                                <div class="table-cell">
                                    <button class="btn-icon" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" title="Reschedule">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <button class="btn-icon" title="Cancel">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="table-row" data-status="completed" data-date="2023-05-20T10:30:00">
                                <div class="table-cell">
                                    <div class="advisor-info-sm">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Doctor" class="advisor-avatar-sm">
                                        <div>
                                            <div class="advisor-name">Dr. Michael Johnson</div>
                                            <div class="advisor-specialty">Cardiologist</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="date-text">May 20, 2023</div>
                                    <div class="time-text">10:30 AM - 11:00 AM</div>
                                </div>
                                <div class="table-cell">
                                    <span class="status-badge completed">Completed</span>
                                </div>
                                <div class="table-cell">
                                    <button class="btn-icon" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" title="View Notes">
                                        <i class="fas fa-file-medical"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="table-row" data-status="cancelled" data-date="2023-04-10T16:15:00">
                                <div class="table-cell">
                                    <div class="advisor-info-sm">
                                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Doctor" class="advisor-avatar-sm">
                                        <div>
                                            <div class="advisor-name">Dr. Sarah Williams</div>
                                            <div class="advisor-specialty">Neurologist</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <div class="date-text">Apr 10, 2023</div>
                                    <div class="time-text">4:15 PM - 4:45 PM</div>
                                </div>
                                <div class="table-cell">
                                    <span class="status-badge cancelled">Cancelled</span>
                                </div>
                                <div class="table-cell">
                                    <button class="btn-icon" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" title="Reschedule">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Modal -->
    <div class="modal" id="appointmentModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Appointment Details</h3>
                <button class="modal-close" id="modalClose">&times;</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Modal content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button class="btn-outline" id="modalCancel">Close</button>
                <button class="btn-primary" id="modalConfirm">Confirm</button>
            </div>
        </div>
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
        --card-bg: #FFFFFF;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .dark-mode {
        --text-color: #E2E8F0;
        --text-light: #A0AEC0;
        --bg-light: #1A202C;
        --border-color: #2D3748;
        --card-bg: #2D3748;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .appointment-container {
        padding: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Header Styles */
    .appointment-header {
        margin-bottom: 30px;
        text-align: center;
    }

    .appointment-header h1 {
        font-size: 2.2rem;
        color: var(--primary-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .appointment-header p {
        color: var(--text-light);
        font-size: 1.1rem;
        margin: 0;
    }

    /* Layout Styles */
    .appointment-layout {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 25px;
    }

    @media (max-width: 1024px) {
        .appointment-layout {
            grid-template-columns: 1fr;
        }
    }

    /* Card Styles */
    .card {
        background-color: var(--card-bg);
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        margin-bottom: 25px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        padding: 15px 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.3rem;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .upcoming-card {
        border-left: 4px solid var(--primary-color);
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--text-color);
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        background-color: var(--card-bg);
        color: var(--text-color);
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .form-actions {
        margin-top: 25px;
        text-align: right;
    }

    /* Button Styles */
    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
    }

    .btn-outline {
        background-color: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-outline:hover {
        background-color: rgba(49, 130, 206, 0.1);
    }

    .btn-danger {
        background-color: var(--danger-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #C53030;
    }

    .btn-icon {
        background: none;
        border: none;
        color: var(--text-light);
        cursor: pointer;
        font-size: 1rem;
        padding: 5px;
        margin: 0 3px;
        transition: color 0.3s ease;
    }

    .btn-icon:hover {
        color: var(--primary-color);
    }

    /* Upcoming Appointment Styles */
    .empty-state {
        text-align: center;
        padding: 30px 0;
        color: var(--text-light);
    }

    .empty-state i {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .empty-state p {
        margin: 0;
        font-size: 1.1rem;
    }

    .advisor-info {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .advisor-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
    }

    .advisor-meta h3 {
        margin: 0 0 5px 0;
        color: var(--text-color);
    }

    .advisor-specialty {
        margin: 0;
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .appointment-time {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
        color: var(--text-color);
        font-weight: 500;
    }

    .appointment-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    /* Appointment Table Styles */
    .header-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .view-options {
        display: flex;
        gap: 10px;
    }

    .view-option {
        background: none;
        border: none;
        padding: 5px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .view-option.active {
        background-color: var(--primary-color);
        color: white;
    }

    .appointment-table {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        overflow: hidden;
    }

    .table-header {
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
    }

    .header-cell {
        padding: 12px 15px;
    }

    .table-body {
        max-height: 500px;
        overflow-y: auto;
    }

    .table-row {
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 1.5fr;
        border-bottom: 1px solid var(--border-color);
        transition: background-color 0.3s ease;
    }

    .table-row:last-child {
        border-bottom: none;
    }

    .table-row:hover {
        background-color: rgba(49, 130, 206, 0.05);
    }

    .table-cell {
        padding: 15px;
        display: flex;
        align-items: center;
    }

    .advisor-info-sm {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .advisor-avatar-sm {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .advisor-name {
        font-weight: 500;
        color: var(--text-color);
    }

    .date-text {
        font-weight: 500;
        color: var(--text-color);
    }

    .time-text {
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-badge.pending {
        background-color: #F6E05E;
        color: #975A16;
    }

    .status-badge.confirmed {
        background-color: #68D391;
        color: #22543D;
    }

    .status-badge.completed {
        background-color: #B794F4;
        color: #44337A;
    }

    .status-badge.cancelled {
        background-color: #FC8181;
        color: #9B2C2C;
    }

    /* Modal Styles */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background-color: var(--card-bg);
        border-radius: 10px;
        width: 90%;
        max-width: 600px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .modal-header h3 {
        margin: 0;
        color: var(--text-color);
    }

    .modal-close {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--text-light);
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        padding: 15px 20px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .table-header, .table-row {
            grid-template-columns: 2fr 1fr 1fr 1fr;
        }
        
        .header-cell:nth-child(1), .table-cell:nth-child(1) {
            grid-column: 1 / span 4;
        }
        
        .header-cell:nth-child(n+2), .table-cell:nth-child(n+2) {
            grid-column: auto;
        }
        
        .appointment-actions {
            flex-direction: column;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const appointmentForm = document.getElementById('appointmentForm');
        const upcomingAppointmentCard = document.getElementById('upcomingAppointmentCard');
        const upcomingEmptyState = document.getElementById('upcomingEmptyState');
        const upcomingDetails = document.getElementById('upcomingDetails');
        const viewOptions = document.querySelectorAll('.view-option');
        const appointmentTableBody = document.getElementById('appointmentTableBody');
        const appointmentModal = document.getElementById('appointmentModal');
        const modalClose = document.getElementById('modalClose');
        const modalCancel = document.getElementById('modalCancel');
        
        // Sample data - in a real app, this would come from your backend
        const appointments = [
            {
                id: 1,
                advisorId: 1,
                advisorName: "Dr. Jane Smith",
                advisorSpecialty: "Psychiatrist",
                advisorAvatar: "https://randomuser.me/api/portraits/women/65.jpg",
                date: "2023-06-15T14:00:00",
                status: "confirmed",
                reason: "Follow-up consultation about medication"
            },
            {
                id: 2,
                advisorId: 2,
                advisorName: "Dr. Michael Johnson",
                advisorSpecialty: "Cardiologist",
                advisorAvatar: "https://randomuser.me/api/portraits/men/32.jpg",
                date: "2023-05-20T10:30:00",
                status: "completed",
                reason: "Annual heart checkup"
            },
            {
                id: 3,
                advisorId: 3,
                advisorName: "Dr. Sarah Williams",
                advisorSpecialty: "Neurologist",
                advisorAvatar: "https://randomuser.me/api/portraits/women/44.jpg",
                date: "2023-04-10T16:15:00",
                status: "cancelled",
                reason: "Migraine consultation"
            }
        ];
        
        // Check if there's an upcoming appointment
        const now = new Date();
        const upcomingAppointments = appointments.filter(app => {
            const appDate = new Date(app.date);
            return appDate > now && app.status !== 'cancelled';
        });
        
        if (upcomingAppointments.length > 0) {
            upcomingEmptyState.style.display = 'none';
            upcomingDetails.style.display = 'block';
            
            // In a real app, you would display the soonest upcoming appointment
            const nextAppointment = upcomingAppointments[0];
            const appDate = new Date(nextAppointment.date);
            
            document.querySelector('.advisor-name').textContent = nextAppointment.advisorName;
            document.querySelector('.advisor-specialty').textContent = nextAppointment.advisorSpecialty;
            
            // Format the date display
            const timeText = document.querySelector('.time-text');
            if (isToday(appDate)) {
                timeText.textContent = `Today at ${formatTime(appDate)}`;
            } else if (isTomorrow(appDate)) {
                timeText.textContent = `Tomorrow at ${formatTime(appDate)}`;
            } else {
                timeText.textContent = `${formatDate(appDate)} at ${formatTime(appDate)}`;
            }
        }
        
        // Form submission
        appointmentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const advisorSelect = document.getElementById('advisorSelect');
            const appointmentDate = document.getElementById('appointmentDate');
            const appointmentReason = document.getElementById('appointmentReason');
            
            // Validate form
            if (!advisorSelect.value || !appointmentDate.value) {
                showModal('Validation Error', 'Please select a specialist and appointment date/time');
                return;
            }
            
            // In a real app, this would send to your backend
            console.log('Scheduling appointment:', {
                advisorId: advisorSelect.value,
                date: appointmentDate.value,
                reason: appointmentReason.value
            });
            
            // Show success message
            showModal('Appointment Scheduled', 'Your appointment has been successfully scheduled!');
            
            // Reset form
            appointmentForm.reset();
            
            // Update UI (in a real app, you would refresh from the backend)
            upcomingEmptyState.style.display = 'none';
            upcomingDetails.style.display = 'block';
            
            // Simulate adding the new appointment to the list
            const newAppointment = {
                id: appointments.length + 1,
                advisorId: parseInt(advisorSelect.value),
                advisorName: advisorSelect.options[advisorSelect.selectedIndex].text.split(' - ')[0],
                advisorSpecialty: advisorSelect.options[advisorSelect.selectedIndex].text.split(' - ')[1],
                advisorAvatar: "https://randomuser.me/api/portraits/women/65.jpg", // Default image
                date: appointmentDate.value,
                status: "pending",
                reason: appointmentReason.value
            };
            
            // Add to our local array (in a real app, this would come from the backend)
            appointments.push(newAppointment);
            
            // Add to the UI
            addAppointmentToTable(newAppointment);
        });
        
        // View option filters
        viewOptions.forEach(option => {
            option.addEventListener('click', function() {
                viewOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.dataset.filter;
                filterAppointments(filter);
            });
        });
        
        // Modal close handlers
        modalClose.addEventListener('click', closeModal);
        modalCancel.addEventListener('click', closeModal);
        
        // Appointment action buttons
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-icon[title="View Details"]')) {
                const row = e.target.closest('.table-row');
                const appointmentId = row.dataset.id;
                const appointment = appointments.find(app => app.id === parseInt(appointmentId));
                
                if (appointment) {
                    showAppointmentDetails(appointment);
                }
            }
            
            if (e.target.closest('.btn-icon[title="Reschedule"]')) {
                const row = e.target.closest('.table-row');
                const appointmentId = row.dataset.id;
                const appointment = appointments.find(app => app.id === parseInt(appointmentId));
                
                if (appointment) {
                    showRescheduleForm(appointment);
                }
            }
            
            if (e.target.closest('.btn-icon[title="Cancel"]')) {
                const row = e.target.closest('.table-row');
                const appointmentId = row.dataset.id;
                const appointment = appointments.find(app => app.id === parseInt(appointmentId));
                
                if (appointment) {
                    showCancelConfirmation(appointment);
                }
            }
        });
        
        // Initialize the appointment table
        renderAppointments();
        
        // Helper functions
        function renderAppointments() {
            appointmentTableBody.innerHTML = '';
            
            appointments.forEach(appointment => {
                addAppointmentToTable(appointment);
            });
        }
        
        function addAppointmentToTable(appointment) {
            const appDate = new Date(appointment.date);
            const row = document.createElement('div');
            row.className = 'table-row';
            row.dataset.status = appointment.status;
            row.dataset.date = appointment.date;
            row.dataset.id = appointment.id;
            
            row.innerHTML = `
                <div class="table-cell">
                    <div class="advisor-info-sm">
                        <img src="${appointment.advisorAvatar}" alt="Doctor" class="advisor-avatar-sm">
                        <div>
                            <div class="advisor-name">${appointment.advisorName}</div>
                            <div class="advisor-specialty">${appointment.advisorSpecialty}</div>
                        </div>
                    </div>
                </div>
                <div class="table-cell">
                    <div class="date-text">${formatDate(appDate)}</div>
                    <div class="time-text">${formatTime(appDate)}</div>
                </div>
                <div class="table-cell">
                    <span class="status-badge ${appointment.status}">${appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1)}</span>
                </div>
                <div class="table-cell">
                    <button class="btn-icon" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                    ${appointment.status === 'completed' ? `
                        <button class="btn-icon" title="View Notes">
                            <i class="fas fa-file-medical"></i>
                        </button>
                    ` : `
                        <button class="btn-icon" title="Reschedule">
                            <i class="fas fa-calendar-alt"></i>
                        </button>
                        ${appointment.status !== 'cancelled' ? `
                            <button class="btn-icon" title="Cancel">
                                <i class="fas fa-times"></i>
                            </button>
                        ` : ''}
                    `}
                </div>
            `;
            
            appointmentTableBody.appendChild(row);
        }
        
        function filterAppointments(filter) {
            const rows = document.querySelectorAll('.table-row');
            const now = new Date();
            
            rows.forEach(row => {
                const rowDate = new Date(row.dataset.date);
                const rowStatus = row.dataset.status;
                
                let shouldShow = true;
                
                if (filter === 'upcoming') {
                    shouldShow = rowDate > now && rowStatus !== 'cancelled';
                } else if (filter === 'past') {
                    shouldShow = rowDate <= now || rowStatus === 'cancelled';
                }
                
                row.style.display = shouldShow ? 'grid' : 'none';
            });
        }
        
        function showModal(title, content, isForm = false) {
            document.getElementById('modalTitle').textContent = title;
            
            if (isForm) {
                document.getElementById('modalBody').innerHTML = content;
                document.getElementById('modalConfirm').style.display = 'inline-block';
            } else {
                document.getElementById('modalBody').textContent = content;
                document.getElementById('modalConfirm').style.display = 'none';
            }
            
            appointmentModal.classList.add('active');
        }
        
        function closeModal() {
            appointmentModal.classList.remove('active');
        }
        
        function showAppointmentDetails(appointment) {
            const appDate = new Date(appointment.date);
            
            const content = `
                <div class="advisor-info">
                    <img src="${appointment.advisorAvatar}" alt="Doctor" class="advisor-avatar">
                    <div class="advisor-meta">
                        <h3>${appointment.advisorName}</h3>
                        <p class="advisor-specialty">${appointment.advisorSpecialty}</p>
                        <div class="appointment-time">
                            <i class="fas fa-calendar-alt"></i>
                            <span>${formatFullDate(appDate)}</span>
                        </div>
                        <div class="appointment-time">
                            <i class="fas fa-clock"></i>
                            <span>${formatTime(appDate)}</span>
                        </div>
                    </div>
                </div>
                
                <div class="appointment-meta">
                    <div class="meta-item">
                        <strong>Status:</strong>
                        <span class="status-badge ${appointment.status}">${appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1)}</span>
                    </div>
                    
                    <div class="meta-item">
                        <strong>Reason:</strong>
                        <p>${appointment.reason || 'No reason provided'}</p>
                    </div>
                </div>
            `;
            
            showModal('Appointment Details', content);
        }
        
        function showRescheduleForm(appointment) {
            const content = `
                <form id="rescheduleForm">
                    <div class="form-group">
                        <label for="newAppointmentDate">New Date & Time</label>
                        <input type="datetime-local" id="newAppointmentDate" class="form-control" min="${new Date().toISOString().slice(0, 16)}" value="${appointment.date.slice(0, 16)}">
                    </div>
                    
                    <div class="form-group">
                        <label for="rescheduleReason">Reason for Rescheduling (Optional)</label>
                        <textarea id="rescheduleReason" class="form-control" rows="3" placeholder="Please provide a reason for rescheduling..."></textarea>
                    </div>
                </form>
            `;
            
            showModal('Reschedule Appointment', content, true);
            
            document.getElementById('modalConfirm').textContent = 'Confirm Reschedule';
            document.getElementById('modalConfirm').onclick = function() {
                // In a real app, this would send to your backend
                console.log('Rescheduling appointment:', {
                    newDate: document.getElementById('newAppointmentDate').value,
                    reason: document.getElementById('rescheduleReason').value
                });
                
                alert('Appointment rescheduled successfully!');
                closeModal();
                
                // In a real app, you would refresh the data from the backend
            };
        }
        
        function showCancelConfirmation(appointment) {
            const content = `
                <p>Are you sure you want to cancel your appointment with ${appointment.advisorName} on ${formatDate(new Date(appointment.date))}?</p>
                
                <div class="form-group">
                    <label for="cancelReason">Reason for Cancellation (Optional)</label>
                    <textarea id="cancelReason" class="form-control" rows="3" placeholder="Please provide a reason for cancellation..."></textarea>
                </div>
            `;
            
            showModal('Cancel Appointment', content, true);
            
            document.getElementById('modalConfirm').textContent = 'Confirm Cancellation';
            document.getElementById('modalConfirm').className = 'btn-danger';
            document.getElementById('modalConfirm').onclick = function() {
                // In a real app, this would send to your backend
                console.log('Cancelling appointment:', {
                    reason: document.getElementById('cancelReason').value
                });
                
                alert('Appointment cancelled successfully!');
                closeModal();
                
                // In a real app, you would refresh the data from the backend
            };
        }
        
        function formatDate(date) {
            return date.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric', 
                year: 'numeric' 
            });
        }
        
        function formatFullDate(date) {
            return date.toLocaleDateString('en-US', { 
                weekday: 'long',
                month: 'long', 
                day: 'numeric', 
                year: 'numeric' 
            });
        }
        
        function formatTime(date) {
            return date.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                hour12: true 
            });
        }
        
        function isToday(date) {
            const today = new Date();
            return date.getDate() === today.getDate() &&
                   date.getMonth() === today.getMonth() &&
                   date.getFullYear() === today.getFullYear();
        }
        
        function isTomorrow(date) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            return date.getDate() === tomorrow.getDate() &&
                   date.getMonth() === tomorrow.getMonth() &&
                   date.getFullYear() === tomorrow.getFullYear();
        }
    });
</script>
@endsection