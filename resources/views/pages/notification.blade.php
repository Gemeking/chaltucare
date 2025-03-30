@extends('layouts.app')

@section('content')
<div class="notifications-container">
    <div class="notifications-header">
        <h1><i class="fas fa-bell"></i> Notifications</h1>
        <div class="notification-actions">
            <button class="btn-mark-all" id="markAllAsRead">
                <i class="fas fa-check-double"></i> Mark all as read
            </button>
            <button class="btn-clear-all" id="clearAllNotifications">
                <i class="fas fa-trash-alt"></i> Clear all
            </button>
        </div>
    </div>

    <div class="notification-filters">
        <button class="filter-btn active" data-filter="all">All</button>
        <button class="filter-btn" data-filter="unread">Unread</button>
        <button class="filter-btn" data-filter="appointments">Appointments</button>
        <button class="filter-btn" data-filter="messages">Messages</button>
        <button class="filter-btn" data-filter="system">System</button>
    </div>

    <div class="notifications-list">
        <!-- Today's Notifications -->
        <div class="notification-day-group">
            <div class="day-header">Today</div>
            
            <div class="notification-item unread" data-category="appointments">
                <div class="notification-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>Appointment Confirmed</strong> with Dr. Smith at 2:00 PM
                    </div>
                    <div class="notification-meta">
                        <span class="time">30 minutes ago</span>
                        <span class="status-dot"></span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>

            <div class="notification-item unread" data-category="messages">
                <div class="notification-icon">
                    <i class="fas fa-comment-alt"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>New message</strong> from your counselor: "How are you feeling today?"
                    </div>
                    <div class="notification-meta">
                        <span class="time">1 hour ago</span>
                        <span class="status-dot"></span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>

        <!-- Yesterday's Notifications -->
        <div class="notification-day-group">
            <div class="day-header">Yesterday</div>
            
            <div class="notification-item" data-category="system">
                <div class="notification-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>Weekly wellness tip:</strong> Remember to practice mindfulness for 10 minutes today
                    </div>
                    <div class="notification-meta">
                        <span class="time">22 hours ago</span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>

            <div class="notification-item" data-category="appointments">
                <div class="notification-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>Appointment Reminder:</strong> Your session starts in 1 hour
                    </div>
                    <div class="notification-meta">
                        <span class="time">Yesterday at 3:15 PM</span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>

        <!-- Older Notifications -->
        <div class="notification-day-group">
            <div class="day-header">This Week</div>
            
            <div class="notification-item" data-category="system">
                <div class="notification-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>New feature:</strong> Video call quality has been improved
                    </div>
                    <div class="notification-meta">
                        <span class="time">Monday</span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>

            <div class="notification-item" data-category="messages">
                <div class="notification-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-message">
                        <strong>Message received:</strong> "Here are the resources we discussed"
                    </div>
                    <div class="notification-meta">
                        <span class="time">Last Friday</span>
                    </div>
                </div>
                <button class="notification-action">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        /* Light Theme */
        --primary: #4f46e5;
        --primary-light: #6366f1;
        --primary-dark: #4338ca;
        --secondary: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
        --teal: #14b8a6;
        --purple: #8b5cf6;
        
        /* Text Colors */
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --text-muted: #94a3b8;
        
        /* Backgrounds */
        --bg-primary: #ffffff;
        --bg-secondary: #f8fafc;
        --bg-tertiary: #e2e8f0;
        
        /* Borders */
        --border-color: #e2e8f0;
        
        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        
        /* Notification Colors */
        --unread-bg: #f0f7ff;
        --unread-dot: #3b82f6;
        --appointment-bg: #f0fdf4;
        --message-bg: #f0f9ff;
        --system-bg: #f5f3ff;
    }

    .dark-mode {
        /* Dark Theme */
        --primary: #6366f1;
        --primary-light: #818cf8;
        --primary-dark: #4f46e5;
        --secondary: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
        
        /* Text Colors */
        --text-primary: #f8fafc;
        --text-secondary: #e2e8f0;
        --text-muted: #94a3b8;
        
        /* Backgrounds */
        --bg-primary: #0f172a;
        --bg-secondary: #1e293b;
        --bg-tertiary: #334155;
        
        /* Borders */
        --border-color: #334155;
        
        /* Notification Colors */
        --unread-bg: rgba(59, 130, 246, 0.1);
        --unread-dot: #3b82f6;
        --appointment-bg: rgba(16, 185, 129, 0.1);
        --message-bg: rgba(56, 178, 172, 0.1);
        --system-bg: rgba(139, 92, 246, 0.1);
    }

    .notifications-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1.5rem;
        background-color: var(--bg-primary);
        border-radius: 12px;
        box-shadow: var(--shadow-md);
    }

    .notifications-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
    }

    .notifications-header h1 {
        font-size: 1.75rem;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .notifications-header h1 i {
        color: var(--primary);
    }

    .notification-actions {
        display: flex;
        gap: 0.75rem;
    }

    .btn-mark-all, .btn-clear-all {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-mark-all {
        background-color: var(--bg-secondary);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
    }

    .btn-mark-all:hover {
        background-color: var(--bg-tertiary);
    }

    .btn-clear-all {
        background-color: var(--bg-secondary);
        color: var(--danger);
        border: 1px solid var(--border-color);
    }

    .btn-clear-all:hover {
        background-color: rgba(239, 68, 68, 0.1);
    }

    .notification-filters {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
    }

    .filter-btn {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        background-color: var(--bg-secondary);
        color: var(--text-secondary);
        border: none;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s ease;
    }

    .filter-btn.active {
        background-color: var(--primary);
        color: white;
    }

    .filter-btn:hover:not(.active) {
        background-color: var(--bg-tertiary);
        color: var(--text-primary);
    }

    .notification-day-group {
        margin-bottom: 1.5rem;
    }

    .day-header {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-secondary);
        margin-bottom: 0.75rem;
        padding-left: 0.5rem;
    }

    .notification-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 0.5rem;
        transition: all 0.2s ease;
        position: relative;
    }

    .notification-item.unread {
        background-color: var(--unread-bg);
    }

    .notification-item[data-category="appointments"] {
        background-color: var(--appointment-bg);
    }

    .notification-item[data-category="messages"] {
        background-color: var(--message-bg);
    }

    .notification-item[data-category="system"] {
        background-color: var(--system-bg);
    }

    .notification-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--bg-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
        color: var(--primary);
    }

    .notification-content {
        flex: 1;
    }

    .notification-message {
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        line-height: 1.4;
    }

    .notification-message strong {
        font-weight: 600;
    }

    .notification-meta {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.8rem;
        color: var(--text-muted);
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: var(--unread-dot);
    }

    .notification-action {
        background: none;
        border: none;
        color: var(--text-muted);
        cursor: pointer;
        padding: 0.5rem;
        margin-left: 0.5rem;
        align-self: center;
    }

    .notification-action:hover {
        color: var(--text-primary);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .notifications-container {
            margin: 1rem;
            padding: 1rem;
        }
        
        .notifications-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .notification-actions {
            width: 100%;
            justify-content: space-between;
        }
        
        .btn-mark-all, .btn-clear-all {
            flex: 1;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .notification-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }
        
        .notification-icon {
            margin-right: 0;
            margin-bottom: 0.75rem;
        }
        
        .notification-content {
            width: 100%;
        }
        
        .notification-action {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mark all as read functionality
        document.getElementById('markAllAsRead').addEventListener('click', function() {
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                item.classList.remove('unread');
                item.querySelector('.status-dot')?.remove();
            });
            
            // In a real app, you would make an API call here
            alert('All notifications marked as read');
        });
        
        // Clear all notifications
        document.getElementById('clearAllNotifications').addEventListener('click', function() {
            if (confirm('Are you sure you want to clear all notifications?')) {
                document.querySelectorAll('.notification-item').forEach(item => {
                    item.remove();
                });
                
                // In a real app, you would make an API call here
                alert('All notifications cleared');
            }
        });
        
        // Filter notifications
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.dataset.filter;
                const notifications = document.querySelectorAll('.notification-item');
                
                notifications.forEach(notification => {
                    if (filter === 'all') {
                        notification.style.display = 'flex';
                    } else if (filter === 'unread') {
                        notification.style.display = notification.classList.contains('unread') ? 'flex' : 'none';
                    } else {
                        notification.style.display = notification.dataset.category === filter ? 'flex' : 'none';
                    }
                });
            });
        });
        
        // Notification item click handler
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', function(e) {
                // Don't trigger if clicking on action button
                if (e.target.closest('.notification-action')) return;
                
                // Mark as read
                this.classList.remove('unread');
                this.querySelector('.status-dot')?.remove();
                
                // In a real app, you would navigate to the relevant page
                alert('Notification clicked - would navigate to relevant content');
            });
        });
    });
</script>
@endsection