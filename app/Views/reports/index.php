<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Reports & Analytics</h1>
                <p class="text-muted">Generate reports and analyze business performance</p>
            </div>
            <div class="btn-group">
                <button class="btn btn-outline-primary">
                    <i class="fas fa-download me-2"></i>Export
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-print me-2"></i>Print
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Report Filters -->
<div class="card mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Report Filters</h6>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Report Type</label>
                <select class="form-select">
                    <option>Sales Report</option>
                    <option>Inventory Report</option>
                    <option>Customer Report</option>
                    <option>Financial Report</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Date From</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Date To</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <button class="btn btn-primary w-100">
                    <i class="fas fa-search me-2"></i>Generate Report
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Report Results</h6>
            </div>
            <div class="card-body">
                <div class="text-center py-5">
                    <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Reports & Analytics System</h5>
                    <p class="text-muted">Advanced reporting and analytics features are under development.</p>
                    <div class="mt-4">
                        <span class="badge bg-success">Under Development</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
