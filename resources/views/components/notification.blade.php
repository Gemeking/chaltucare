<div class="notification-container1">
    <button class="notification-bell1" id="notificationBell">
        <i class="fas fa-bell"></i>
        <span class="notification-count1" id="notificationCount">{{ $unreadCount }}</span>
    </button>
    
    <div class="notification-popup1" id="notificationPopup">
        <div class="notification-header1">
            <h3>Notifications</h3>
            <button class="mark-all-read1" id="markAllRead">Mark all as read</button>
        </div>
        <div class="notification-list1" id="notificationList">
            @forelse($notifications as $notification)
            <div class="notification-item1 {{ $notification->is_read ? '' : 'unread' }}" data-id="{{ $notification->id }}">
                <div class="notification-content1">
                    <p class="notification-message1">{{ $notification->message }}</p>
                    <p class="notification-time1">{{ $notification->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            <div class="notification-item1">
                <div class="notification-content1">
                    <p class="notification-message1">No notifications yet</p>
                </div>
            </div>
            @endforelse
        </div>
        <div class="notification-footer1">
            <a href="/notifications" class="view-all1">View all notifications</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const notificationBell = document.getElementById('notificationBell');
    const notificationPopup = document.getElementById('notificationPopup');
    const markAllRead = document.getElementById('markAllRead');
    const notificationItems = document.querySelectorAll('.notification-item1');
    const notificationCount = document.getElementById('notificationCount');

    // Toggle popup visibility
    notificationBell.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationPopup.classList.toggle('show');
    });

    // Close popup when clicking outside
    document.addEventListener('click', function() {
        notificationPopup.classList.remove('show');
    });

    // Prevent popup from closing when clicking inside it
    notificationPopup.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // Mark all as read functionality
    markAllRead.addEventListener('click', function() {
        fetch('/notifications/mark-all-read', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                document.querySelectorAll('.notification-item1.unread').forEach(item => {
                    item.classList.remove('unread');
                });
                notificationCount.textContent = '0';
            }
        });
    });

    // Mark individual notifications as read
    notificationItems.forEach(item => {
        item.addEventListener('click', function() {
            if (this.classList.contains('unread')) {
                const notificationId = this.dataset.id;
                
                fetch(`/notifications/${notificationId}/mark-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        this.classList.remove('unread');
                        const currentCount = parseInt(notificationCount.textContent);
                        if (currentCount > 0) {
                            notificationCount.textContent = (currentCount - 1).toString();
                        }
                    }
                });
            }
        });
    });
});
</script>