<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Ubah Kategori</h4>
    <!-- Form Pencarian -->
    <div class="d-flex gap-2">
        <form action="<?= base_url('customers') ?>" class="d-flex" method="get">
            <div class="input-group input-group-sm">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="keyword" class="form-control" value="<?= $keyword ?? '' ?>">
            </div>
        </form>
        <a href="<?= base_url('categories') ?>" class="btn btn-success btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
        
</div>

<div class="card">
    <div class="card-body p-3">
        <form action="<?= base_url('categories/update/' . $categories['category_id']) ?>" method="post">
            <?= csrf_field() ?>
            <!-- Judul -->
             <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" class="form-control" value="<?= $categories['name'] ?>" required>
             </div>
             <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                    <input type="text" name="description" class="form-control" value="<?= $categories['description'] ?>" required>
             </div>

             <!-- Tombol Simpan dan Reset -->
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              <button type="reset" class="btn btn-outline-secondary">Reset</button>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>