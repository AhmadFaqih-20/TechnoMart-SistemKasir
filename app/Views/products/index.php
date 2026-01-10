<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<?php
$currentPage = $pager->getCurrentPage('products');
$perPage = $perPage ?? 5;
$noAwal = 1 + ($perPage * ($currentPage - 1))
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
                <p class="text-muted">Manage your product inventory</p>
            </div>
            <a href="<?= base_url('products/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Product
            </a>
        </div>
    </div>
</div>

<!-- Search and Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
                <form action="<?= base_url('products') ?>" method="get" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="keyword" class="form-control table-search"
                               placeholder="Search products" value="<?= $keyword ?? '' ?>">
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <small class="text-muted">
                    Showing <?= count($products) ?> of <?= $pager->getTotal('products') ?> products
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
                        <th>Nama Category</th>
                        <th>SKU</th>
                        <th>Nama Product</th>
                        <th>Unit Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Cover</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $noAwal; ?>
                    <?php foreach ($products as $i => $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($row['name']); ?></td>
                            <td><?= esc($row['sku']); ?></td>
                            <td><?= esc($row['product_name']); ?></td>
                            <td><?= esc($row['unit_price']); ?></td>
                            <td><?= esc($row['stock']); ?></td>
                            <td><?= esc($row['status']); ?></td>
                            <td class="text-center">
                                <?php if (!empty($row['cover'])) : ?>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalCover<?= $row['product_id'] ?>">
                                        Lihat
                                    </button>
                                <?php else : ?>
                                    <span class="text-muted"> - </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?= base_url('products/edit/' . $row['product_id']) ?>"
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip"
                                       title="Edit Product">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('products/delete/' . $row['product_id']) ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip"
                                       title="Delete Product"
                                       data-confirm-delete="Apa kamu serius ingin menghapus data ini?">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php if (!empty($row['cover'])) : ?>
                            <!-- Modal untuk Cover -->
                            <div class="modal fade" id="modalCover<?= $row['product_id'] ?>" tabindex="1" aria-labelledby="modalCoverLabel<?= $row['product_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCoverLabel<?= $row['product_id'] ?>">
                                                <?= $row['product_name'] ?>
                                            </h5>
                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="<?= base_url('image/cover/' . $row['cover']) ?>" alt="Cover <?= $row['product_name'] ?>" class="img-fluid rounded">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <?php if (empty($products)) : ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data Product</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="mt-3">
                <?= $pager->links('products', 'bootstrap'); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
