// Modern Admin Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Hide preloader
    const preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(() => {
            preloader.classList.add('hidden');
        }, 500);
    }

    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const mainArea = document.querySelector('.main-area');

    if (sidebarToggle && sidebar && mainArea) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainArea.classList.toggle('expanded');

            // Store sidebar state in localStorage
            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        });

        // Restore sidebar state on page load
        const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (sidebarCollapsed) {
            sidebar.classList.add('collapsed');
            mainArea.classList.add('expanded');
        }
    }

    // Add fade-in animation to content
    const contentWrapper = document.querySelector('.content-wrapper');
    if (contentWrapper) {
        contentWrapper.classList.add('fade-in');
    }

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Handle flash messages auto-hide
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000); // Auto hide after 5 seconds
    });

    // Confirm delete actions
    const deleteButtons = document.querySelectorAll('[data-confirm-delete]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm-delete') || 'Are you sure you want to delete this item?';
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });

    // Table search functionality
    const searchInputs = document.querySelectorAll('.table-search');
    searchInputs.forEach(input => {
        input.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const table = this.closest('.table-responsive').querySelector('table');
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    });

    // Auto-resize textareas
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });

    // Initialize charts
    initializeCharts();

    // Initialize hero section features
    initializeHeroSection();

    // Initialize product page features if on products page
    if (document.querySelector('.modern-header')) {
        initializeProductPage();
    }
});

// Initialize product page features
function initializeProductPage() {
    // Update product statistics
    updateProductStats();

    // Initialize export functionality
    initializeExport();
}

function updateProductStats() {
    // Simulate API call to get real stats
    // In a real application, this would fetch from your backend
    const stats = {
        total: 150,
        active: 142,
        lowStock: 8
    };

    // Update the UI with stats
    const totalElement = document.getElementById('totalProducts');
    const activeElement = document.getElementById('activeProducts');
    const lowStockElement = document.getElementById('lowStock');

    if (totalElement) totalElement.textContent = stats.total.toLocaleString();
    if (activeElement) activeElement.textContent = stats.active.toLocaleString();
    if (lowStockElement) lowStockElement.textContent = stats.lowStock.toLocaleString();
}

function initializeExport() {
    const exportBtn = document.querySelector('button[onclick="exportProducts()"]');
    if (exportBtn) {
        exportBtn.onclick = function() {
            exportProducts();
        };
    }
}

function exportProducts() {
    // Show loading state
    const btn = event.target.closest('button');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i><span>Exporting...</span>';
    btn.disabled = true;

    // Simulate export process
    setTimeout(() => {
        // In a real application, this would trigger a download
        showToast('Product export completed successfully!', 'success');

        // Reset button
        btn.innerHTML = originalText;
        btn.disabled = false;
    }, 2000);
}

// Initialize hero section features
function initializeHeroSection() {
    // Update current time
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', {
            hour12: false,
            hour: '2-digit',
            minute: '2-digit'
        });
        const timeElement = document.getElementById('currentTime');
        if (timeElement) {
            timeElement.textContent = timeString;
        }
    }

    // Update uptime (simulated)
    function updateUptime() {
        const uptimeElement = document.getElementById('uptime');
        if (uptimeElement) {
            // Simulate uptime starting from page load
            const startTime = Date.now();
            setInterval(() => {
                const elapsed = Date.now() - startTime;
                const hours = Math.floor(elapsed / (1000 * 60 * 60));
                const minutes = Math.floor((elapsed % (1000 * 60 * 60)) / (1000 * 60));

                let uptimeText = '';
                if (hours > 0) {
                    uptimeText = `${hours}h ${minutes}m`;
                } else {
                    uptimeText = `${minutes}m`;
                }

                uptimeElement.textContent = uptimeText;
            }, 60000); // Update every minute

            // Initial update
            uptimeElement.textContent = '0m';
        }
    }

    // Initialize time updates
    updateTime();
    setInterval(updateTime, 1000); // Update every second
    updateUptime();
}

// Chart.js initialization helper
function createChart(canvasId, type, data, options = {}) {
    const ctx = document.getElementById(canvasId);
    if (ctx && typeof Chart !== 'undefined') {
        // Destroy existing chart if it exists
        if (Chart.getChart(canvasId)) {
            Chart.getChart(canvasId).destroy();
        }

        new Chart(ctx, {
            type: type,
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                },
                ...options
            }
        });
    }
}

// Initialize charts on page load
function initializeCharts() {
    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
        console.warn('Chart.js not loaded, retrying...');
        setTimeout(initializeCharts, 100);
        return;
    }

    // Sales Chart
    const salesData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Sales ($)',
            data: [12000, 19000, 3000, 5000, 2000, 3000],
            borderColor: '#7c3aed',
            backgroundColor: 'rgba(124, 58, 237, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    };

    createChart('salesChart', 'line', salesData, {
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.05)'
                }
            },
            x: {
                grid: {
                    color: 'rgba(0,0,0,0.05)'
                }
            }
        }
    });

    // Revenue Chart
    const revenueData = {
        labels: ['Electronics', 'Accessories'],
        datasets: [{
            label: 'Revenue (Rp)',
            data: [30000, 15000],
            backgroundColor: [
                '#7c3aed',
                '#a855f7',
            ],
            borderWidth: 2,
            borderColor: '#ffffff'
        }]
    };

    createChart('revenueChart', 'doughnut', revenueData, {
        plugins: {
            legend: {
                position: 'right'
            }
        }
    });
}

// Utility functions
function showToast(message, type = 'info') {
    const toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        const container = document.createElement('div');
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white bg-${type} border-0`;
    toast.setAttribute('role', 'alert');
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;

    document.querySelector('.toast-container').appendChild(toast);
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();

    toast.addEventListener('hidden.bs.toast', () => {
        toast.remove();
    });
}
