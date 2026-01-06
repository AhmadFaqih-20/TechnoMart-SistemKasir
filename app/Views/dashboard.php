<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <p class="text-muted">Welcome to Technomart Management System</p>
    </div>
</div>

<!-- Stats Cards Row -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="value">$40,000</div>
                        <div class="label">Monthly Earnings</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="value">150</div>
                        <div class="label">Total Products</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="value">25</div>
                        <div class="label">Total Customers</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="value">320</div>
                        <div class="label">Total Sales</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="salesChart" width="100%" height="100%"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="revenueChart" width="100%" height="100%"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities and Quick Actions -->
<div class="row">
    <div class="col-xl-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Recent Activities</h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">New Product Added</h6>
                            <p class="timeline-text">iPhone 15 Pro Max added to inventory</p>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Sale Completed</h6>
                            <p class="timeline-text">Order #1234 completed successfully</p>
                            <small class="text-muted">4 hours ago</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-warning"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Low Stock Alert</h6>
                            <p class="timeline-text">Samsung Galaxy S24 stock running low</p>
                            <small class="text-muted">6 hours ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?= base_url('products/create'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Product
                    </a>
                    <a href="<?= base_url('categories/create'); ?>" class="btn btn-success">
                        <i class="fas fa-tags me-2"></i>Add New Category
                    </a>
                    <a href="<?= base_url('customers/create'); ?>" class="btn btn-info">
                        <i class="fas fa-user-plus me-2"></i>Add New Customer
                    </a>
                    <a href="<?= base_url('sales'); ?>" class="btn btn-warning">
                        <i class="fas fa-shopping-cart me-2"></i>View Sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Sales Chart
const salesData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
        label: 'Sales',
        data: [12000, 19000, 3000, 5000, 2000, 3000],
        borderColor: 'rgb(75, 192, 192)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        tension: 0.1
    }]
};

createChart('salesChart', 'line', salesData);

// Revenue Chart
const revenueData = {
    labels: ['Electronics', 'Accessories', 'Clothing', 'Books'],
    datasets: [{
        label: 'Revenue',
        data: [30000, 15000, 10000, 5000],
        backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 205, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)'
        ],
        borderWidth: 1
    }]
};

createChart('revenueChart', 'doughnut', revenueData);
</script>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.timeline-item:not(:last-child)::before {
    content: '';
    position: absolute;
    left: -29px;
    top: 17px;
    width: 2px;
    height: calc(100% + 3px);
    background: #e9ecef;
}

.timeline-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 5px;
    color: #495057;
}

.timeline-text {
    font-size: 0.85rem;
    color: #6c757d;
    margin-bottom: 3px;
}
</style>

<?= $this->endSection(); ?>
