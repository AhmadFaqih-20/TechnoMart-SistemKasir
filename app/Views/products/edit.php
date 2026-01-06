<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Ubah Product</h4>
        <a href="<?= base_url('products') ?>" class="btn btn-success btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
</div>

<div class="card">
    <div class="card-body p-3">
        <form action="<?= base_url('products/update/' . $products['product_id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="cover_lama" value="<?= $products['cover'] ?>">

            <!-- Nama Kategori -->
             <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value=""> - Pilih Nama Kategori - </option>
                    <?php foreach ($categories as $data) : ?>
                        <option value="<?= $data['category_id'] ?>"<?= $products['category_id'] == $data['category_id'] ? 'selected' : '' ?>>
                            <?= $data['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
             </div>

             <!-- Pengarang -->
              <div class="mb-3">
                <label class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control" value="<?= $products['sku'] ?>" required>
             </div>

             <!-- Tahun Terbit -->
              <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                    <input type="text" name="product_name" class="form-control" value="<?= $products['product_name'] ?>" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Harga Satuan</label>
                    <input type="number" name="unit_price" class="form-control" value="<?= $products['unit_price'] ?>" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="<?= $products['stock'] ?>" required>
             </div>
              <div class="mb-3">
                <label class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" value="<?= $products['status'] ?>" required>
             </div>
             <!-- Cover -->
              <div class="mb-3">
                 <label class="form-label">Cover Product</label>
                 <?php if(!empty($products['cover'])) : ?>
                    <div class="mb-2">
                        <img src="<?= base_url('image/cover/' . $products['cover']) ?>" alt="" style="max-height: 100px;" class="img-thumbnail">
                    </div>
                    <?php endif ?>
                 <input type="file" name="cover" class="form-control">
                 <small class="text-muted">Kosongkan jika tidak ingin mengganti cover.</small>
              </div>

             <!-- Tombol Simpan dan Reset -->
              <button type="submit" class="btn btn-primary">Simpan Data</button>
              <button type="reset" class="btn btn-outline-secondary">Reset</button>

        </form>
    </div>
</div>

<?= $this->endSection(); ?>
