<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<?php
$currentPage = $pager->getCurrentPage('employees');
$perPage =  $perPage ?? 5;
$noAwal = 1 + ($perPage * ($currentPage - 1))

?>
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Data Employee</h1>
                <p class="text-muted">Manage your Employee inventory</p>
            </div>
            <a href="<?= base_url('employees/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Employee
            </a>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="<?= base_url('employees') ?>" method="get" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="keyword" class="form-control table-search"
                               placeholder="Search employees" value="<?= $keyword ?? '' ?>">
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <small class="text-muted">
                    Showing <?= count($employees) ?> of <?= $pager->getTotal('employees') ?> employee
                </small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Employee</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Posisi</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employees as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= esc($row['employee_name']); ?></td>
                            <td><?= esc($row['email']); ?></td>
                            <td><?= esc($row['phone']); ?></td>
                            <td><?= esc($row['position']); ?></td>
                            <td><?= esc($row['hire_date']); ?></td>
                            <td><?= esc($row['status']); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?= base_url('employees/edit/' . $row['employee_id']) ?>"
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip"
                                       title="Edit Customer">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($employees)) : ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data Employee</td>
                            </tr>
                        <?php endif; ?>
                </tbody>
            </table>
             <div class="mt-3">
                <?= $pager->links('employees', 'bootstrap'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>