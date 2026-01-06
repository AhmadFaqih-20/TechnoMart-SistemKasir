<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<?php
$currentPage = $pager->getCurrentPage('employees');
$perPage =  $perPage ?? 5;
$noAwal = 1 + ($perPage * ($currentPage - 1))

?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Employee</h4>
     <div class="d-flex gap-2">
        <form action="<?= base_url('employees') ?>" class="d-flex" method="get">
            <div class="input-group input-group-sm">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="keyword" class="form-control" value="<?= $keyword ?? '' ?>">
            </div>
        </form>
         <a href="<?= base_url('employees/create') ?>" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah Employee
        </a>
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
                                <a href="<?= base_url('employees/edit/' . $row['employee_id']) ?>" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <a href="<?= base_url('employees/delete/' . $row['employee_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data?')">
                                    Hapus
                                </a>
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