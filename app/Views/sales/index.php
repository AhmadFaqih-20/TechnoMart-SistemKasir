<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Sales Management</h1>
                <p class="text-muted">Manage sales transactions and orders</p>
            </div>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>New Sale
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Sales Transactions</h6>
            </div>
            <div class="card-body">
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Sales Management System</h5>
                    <p class="text-muted">This feature is under development. Sales transaction management will be available soon.</p>
                    <div class="mt-4">
                        <span class="badge bg-info">Coming Soon</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
