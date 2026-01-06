<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">System Settings</h1>
                <p class="text-muted">Configure system preferences and manage application settings</p>
            </div>
            <button class="btn btn-success">
                <i class="fas fa-save me-2"></i>Save Changes
            </button>
        </div>
    </div>
</div>

<div class="row">
    <!-- General Settings -->
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Company Name</label>
                        <input type="text" class="form-control" value="Technomart">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Email</label>
                        <input type="email" class="form-control" value="admin@technomart.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" value="+62 123 456 789">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Currency</label>
                        <select class="form-select">
                            <option selected>IDR (Indonesian Rupiah)</option>
                            <option>USD (US Dollar)</option>
                            <option>EUR (Euro)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Company Address</label>
                        <textarea class="form-control" rows="3">Jl. Teknologi No. 123, Jakarta, Indonesia</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Status -->
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">System Status</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Database</span>
                        <span class="badge bg-success">Connected</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: 100%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>File System</span>
                        <span class="badge bg-success">OK</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: 100%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Memory Usage</span>
                        <span class="badge bg-warning">67%</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-warning" style="width: 67%"></div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <small class="text-muted">Last updated: Just now</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Security Settings -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Security Settings</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Password Expiry (days)</label>
                        <input type="number" class="form-control" value="90">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Session Timeout (minutes)</label>
                        <input type="number" class="form-control" value="60">
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Enable Two-Factor Authentication</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Require Strong Passwords</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Management -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
            </div>
            <div class="card-body">
                <div class="text-center py-4">
                    <i class="fas fa-users-cog fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Advanced User Management</h5>
                    <p class="text-muted">User role management and permissions are under development.</p>
                    <div class="mt-4">
                        <span class="badge bg-primary">Admin Feature</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
