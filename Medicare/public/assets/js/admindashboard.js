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

    // Sort forum activity table on header click
    const activityTable = document.getElementById('forumActivityTable');
    const activityBody = document.getElementById('forumActivityBody');
    const sortButtons = activityTable
        ? activityTable.querySelectorAll('.admin-sort-btn')
        : [];
    let currentSort = { key: 'day', order: 'desc' };

    if (activityTable && activityBody && sortButtons.length > 0) {
        const toValue = function(row, key) {
            if (key === 'day') {
                const parsedDate = Date.parse(row.dataset.day || '');
                return Number.isNaN(parsedDate) ? 0 : parsedDate;
            }
            const parsed = Number.parseInt(row.dataset[key] || '0', 10);
            return Number.isNaN(parsed) ? 0 : parsed;
        };

        const updateIcons = function() {
            sortButtons.forEach(function(button) {
                const icon = button.querySelector('i');
                if (!icon) {
                    return;
                }
                if (button.dataset.sortKey !== currentSort.key) {
                    icon.className = 'bi bi-arrow-down-up ms-1';
                    return;
                }
                icon.className = currentSort.order === 'asc'
                    ? 'bi bi-sort-up ms-1'
                    : 'bi bi-sort-down ms-1';
            });
        };

        const sortRows = function() {
            const rows = Array.from(activityBody.querySelectorAll('tr'));
            rows.sort(function(a, b) {
                const aVal = toValue(a, currentSort.key);
                const bVal = toValue(b, currentSort.key);

                if (aVal === bVal) return 0;
                return currentSort.order === 'asc' ? aVal - bVal : bVal - aVal;
            });
            rows.forEach(function(row) {
                activityBody.appendChild(row);
            });
            updateIcons();
        };

        sortButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const key = button.dataset.sortKey;
                if (!key) {
                    return;
                }
                if (currentSort.key === key) {
                    currentSort.order = currentSort.order === 'asc' ? 'desc' : 'asc';
                } else {
                    currentSort.key = key;
                    currentSort.order = key === 'day' ? 'desc' : 'asc';
                }
                sortRows();
            });
        });

        updateIcons();
    }

    // Live moderation search (no submit while typing)
    const moderationForm = document.getElementById('moderationFiltersForm');
    const moderationSearchInput = document.getElementById('moderationSearchInput');
    const moderationOrderSelect = document.getElementById('moderationOrderSelect');
    const moderationItems = document.querySelectorAll('.js-moderation-item');
    const moderationNoMatchAlert = document.getElementById('moderationNoMatchAlert');

    if (moderationSearchInput && moderationItems.length > 0) {
        const applyLiveModerationSearch = function() {
            const query = moderationSearchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            moderationItems.forEach(function(item) {
                const author = (item.dataset.author || '').toLowerCase();
                const visible = query === '' || author.includes(query);
                item.classList.toggle('d-none', !visible);
                if (visible) {
                    visibleCount += 1;
                }
            });

            if (moderationNoMatchAlert) {
                moderationNoMatchAlert.classList.toggle('d-none', visibleCount > 0);
            }
        };

        moderationSearchInput.addEventListener('input', applyLiveModerationSearch);
        moderationSearchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });

        applyLiveModerationSearch();
    }

    if (moderationForm && moderationOrderSelect) {
        moderationOrderSelect.addEventListener('change', function() {
            moderationForm.submit();
        });
    }
});
