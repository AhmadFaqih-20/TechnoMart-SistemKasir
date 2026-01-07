// JavaScript untuk dashboard admin yang keren
// Ini buat nge-handle semua interaksi di halaman admin

document.addEventListener('DOMContentLoaded', function() {
    // Sembunyiin preloader pas halaman udah siap
    const preloader = document.getElementById('preloader');
    if (preloader) {
        setTimeout(() => {
            preloader.classList.add('hidden');
        }, 500);
    }

    // Fitur toggle sidebar biar bisa collapse sama expand
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const mainArea = document.querySelector('.main-area');

    if (sidebarToggle && sidebar && mainArea) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainArea.classList.toggle('expanded');

            // Simpan status sidebar di localStorage biar persistent
            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        });

        // Balikin status sidebar pas halaman di-refresh
        const sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (sidebarCollapsed) {
            sidebar.classList.add('collapsed');
            mainArea.classList.add('expanded');
        }
    }

    // Tambahin animasi fade-in ke konten
    const contentWrapper = document.querySelector('.content-wrapper');
    if (contentWrapper) {
        contentWrapper.classList.add('fade-in');
    }

    // Aktifin tooltip biar user tau fungsi tombol apa
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Auto hide alert message setelah 5 detik
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000); // Sembunyi otomatis setelah 5 detik
    });

    // Konfirmasi sebelum hapus data
    const deleteButtons = document.querySelectorAll('[data-confirm-delete]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm-delete') || 'Yakin mau hapus data ini?';
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });

    // Fitur pencarian di tabel
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

    // Auto resize textarea biar gak perlu scroll
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });

    // Mulai load chart-chart
    initializeCharts();

});



// Fungsi bantu buat bikin chart pake Chart.js
function createChart(canvasId, type, data, options = {}) {
    const ctx = document.getElementById(canvasId);
    if (ctx && typeof Chart !== 'undefined') {
        // Hapus chart yang udah ada kalo ada, biar gak bentrok
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

// Mulai load semua chart pas halaman pertama kali dimuat
function initializeCharts() {
    // Cek apakah Chart.js udah ke-load atau belum
    if (typeof Chart === 'undefined') {
        console.warn('Chart.js belum ke-load, coba lagi...');
        setTimeout(initializeCharts, 100);
        return;
    }

    // Chart Penjualan - bentuk garis
    const salesData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Penjualan (Rp)',
            data: [120000000, 100000000, 50000000, 30000000, 20000000, 10000000],
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

    // Chart Pendapatan - bentuk donat
    const revenueData = {
        labels: ['Elektronik', 'Aksesoris'],
        datasets: [{
            label: 'Pendapatan (Rp)',
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

// Fungsi-fungsi utility yang berguna
function showToast(message, type = 'info') {
    // Cari container toast, kalo gak ada bikin baru
    const toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        const container = document.createElement('div');
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
    }

    // Bikin element toast baru
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white bg-${type} border-0`;
    toast.setAttribute('role', 'alert');
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;

    // Tambahin ke container dan tampilin
    document.querySelector('.toast-container').appendChild(toast);
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();

    // Hapus dari DOM pas toast udah ditutup
    toast.addEventListener('hidden.bs.toast', () => {
        toast.remove();
    });
}
