<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Tambah Employees</h4>
        <a href="<?= base_url('employees') ?>" class="btn btn-success btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
</div>

<div class="card">
    <div class="card-body p-3">
        <form action="<?= base_url('employees/insert') ?>" method="post">
            <?= csrf_field() ?>
            <!-- Judul -->
             <div class="mb-3">
                <label class="form-label">Nama Employees</label>
                    <input type="text" name="employee_name" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Tanggal Masuk</label>
                    <input type="text" name="hire_date" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" required>
             </div>

             <!-- Tombol Simpan dan Reset -->
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              <button type="reset" class="btn btn-outline-secondary">Reset</button>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>