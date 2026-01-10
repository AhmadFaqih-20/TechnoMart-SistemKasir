<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<?php
$currentPage = $pager->getCurrentPage('customers');
$perPage =  $perPage ?? 5;
$noAwal = 1 + ($perPage * ($currentPage - 1))

?>
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Data Customer</h1>
                <p class="text-muted">Manage your Customer inventory</p>
            </div>
            <a href="<?= base_url('customers/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Customer
            </a>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="<?= base_url('customers') ?>" method="get" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="keyword" class="form-control table-search"
                               placeholder="Search customers" value="<?= $keyword ?? '' ?>">
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <small class="text-muted">
                    Showing <?= count($customers) ?> of <?= $pager->getTotal('customers') ?> customer
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
                        <th>Nama Customer</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= esc($row['customer_name']); ?></td>
                            <td><?= esc($row['phone']); ?></td>
                            <td><?= esc($row['email']); ?></td>
                            <td><?= esc($row['address']); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?= base_url('customers/edit/' . $row['customer_id']) ?>"
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip"
                                       title="Edit Customer">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('customers/delete/' . $row['customer_id']) ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip"
                                       title="Delete Customer"
                                       data-confirm-delete="Apa kamu serius ingin menghapus data ini?">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($customers)) : ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data Customer</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="mt-3">
                <?= $pager->links('customers', 'bootstrap'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>