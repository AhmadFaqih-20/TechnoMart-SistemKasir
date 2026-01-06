<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Tambah Product</h4>
        <a href="<?= base_url('products') ?>" class="btn btn-success btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
</div>

<div class="card">
    <div class="card-body p-3">
        <form action="<?= base_url('products/insert') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Nama Kategori -->
             <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value=""> - Pilih Nama Kategori - </option>
                    <?php foreach ($categories as $data) : ?>
                        <option value="<?= $data['category_id'] ?>">
                            <?= $data['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
             </div>

             <!-- Pengarang -->
              <div class="mb-3">
                <label class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control" required>
             </div>

             <!-- Tahun Terbit -->
              <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                    <input type="text" name="product_name" class="form-control" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Harga Satuan</label>
                    <input type="number" name="unit_price" class="form-control" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" required>
             </div>
             <!-- Cover -->
              <div class="mb-3">
                 <label class="form-label">Cover Product</label>
                 <input type="file" name="cover" class="form-control">
                 <small class="text-muted">Boleh dikosongkan jika tidak ada gambar cover.</small>
              </div>

             <!-- Tombol Simpan dan Reset -->
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              <button type="reset" class="btn btn-outline-secondary">Reset</button>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>
