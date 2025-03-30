document.addEventListener("DOMContentLoaded", function () {
    const profileDropdown1 = document.querySelector(".profile-dropdown1");
    const dropdownMenu1 = document.querySelector(".dropdown-menu1");
    const hamburger1 = document.querySelector(".hamburger1");
    const navMenu1 = document.querySelector(".nav-menu1");
    const header = document.querySelector(".header1");
    
    // Notification functionality
    const notificationBell = document.getElementById('notificationBell');
    const notificationPopup = document.getElementById('notificationPopup');
    const markAllRead = document.getElementById('markAllRead');
    const notificationItems = document.querySelectorAll('.notification-item1');
    const notificationCount = document.getElementById('notificationCount');

    // Toggle Profile Dropdown
    profileDropdown1.addEventListener("click", function (event) {
        profileDropdown1.classList.toggle("active");
        event.stopPropagation();
        
        // Close notification popup if open
        notificationPopup.classList.remove('show');
    });

    // Toggle Mobile Menu
    hamburger1.addEventListener("click", function () {
        navMenu1.classList.toggle("active");
        hamburger1.classList.toggle("active");
        
        // Close notification popup if open
        notificationPopup.classList.remove('show');
    });

    // Close Dropdown and Mobile Menu when clicking outside
    document.addEventListener("click", function (event) {
        if (!profileDropdown1.contains(event.target)) {
            profileDropdown1.classList.remove("active");
        }
        if (!navMenu1.contains(event.target) && !hamburger1.contains(event.target)) {
            navMenu1.classList.remove("active");
            hamburger1.classList.remove("active");
        }
    });

    // Header scroll effect
    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    // Toggle notification popup visibility
    notificationBell.addEventListener('click', function(e) {
        e.stopPropagation();
        notificationPopup.classList.toggle('show');
        
        // Close profile dropdown if open
        profileDropdown1.classList.remove('active');
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
        document.querySelectorAll('.notification-item1.unread').forEach(item => {
            item.classList.remove('unread');
        });
        
        // Update notification count
        notificationCount.textContent = '0';
    });

    // Mark individual notifications as read
    notificationItems.forEach(item => {
        item.addEventListener('click', function() {
            if (this.classList.contains('unread')) {
                this.classList.remove('unread');
                // Update notification count
                const currentCount = parseInt(notificationCount.textContent);
                if (currentCount > 0) {
                    notificationCount.textContent = (currentCount - 1).toString();
                }
            }
        });
    });
});