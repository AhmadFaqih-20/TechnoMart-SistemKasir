<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Tambah Kategori</h4>
        <a href="<?= base_url('categories') ?>" class="btn btn-success btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
</div>

<div class="card">
    <div class="card-body p-3">
        <form action="<?= base_url('categories/insert') ?>" method="post">
            <?= csrf_field() ?>
            <!-- Judul -->
             <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                    <input type="text" name="description" class="form-control" required>
             </div>

             <!-- Tombol Simpan dan Reset -->
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              <button type="reset" class="btn btn-outline-secondary">Reset</button>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>