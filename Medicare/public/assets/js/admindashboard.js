// Admin Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Toggle Sidebar
    const hamburger = document.getElementById('adminHamburger');
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('adminSidebarOverlay');

    if (hamburger && sidebar && overlay) {
        hamburger.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    }

    // Active link highlight
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.admin-nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            // Add active class to current link
            link.classList.add('active');
        }
    });

    // Toggle profile dropdown on click
    const profileBtn = document.querySelector('.admin-profile-btn');
    const profileDropdown = document.querySelector('.admin-profile-dropdown');
    const dropdownMenu = document.querySelector('.admin-dropdown-menu');

    if (profileBtn && dropdownMenu) {
        profileBtn.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (profileDropdown && !profileDropdown.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }

    const notifBtn = document.getElementById('adminNotificationBtn');
    const notifPanel = document.getElementById('adminNotificationsPanel');
    const notifWrap = document.querySelector('.admin-notification-wrap');

    if (notifBtn && notifPanel) {
        notifBtn.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
            const isOpen = notifPanel.classList.toggle('show');
            notifPanel.hidden = !isOpen;
            notifBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        document.addEventListener('click', function(event) {
            if (notifWrap && !notifWrap.contains(event.target)) {
                notifPanel.classList.remove('show');
                notifPanel.hidden = true;
                notifBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
