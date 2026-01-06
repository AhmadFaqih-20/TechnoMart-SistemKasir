<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<?php
$currentPage = $pager->getCurrentPage('products');
$perPage = $perPage ?? 5;
$noAwal = 1 + ($perPage * ($currentPage - 1))
?>

<!-- Modern Header Section -->
<div class="modern-header mb-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="header-content">
                    <div class="header-icon mb-3">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h1 class="header-title mb-2">
                        Product Management
                        <span class="title-accent">System</span>
                    </h1>
                    <p class="header-subtitle">
                        Comprehensive inventory control and product lifecycle management.
                        Track stock levels, manage categories, and optimize your product catalog.
                    </p>
                    <div class="header-stats mt-4">
                        <div class="stat-card">
                            <div class="stat-value" id="totalProducts">--</div>
                            <div class="stat-label">Total Products</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" id="activeProducts">--</div>
                            <div class="stat-label">Active Products</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value" id="lowStock">--</div>
                            <div class="stat-label">Low Stock Items</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="header-actions">
                    <div class="action-buttons">
                        <a href="<?= base_url('products/create') ?>" class="btn btn-primary btn-lg action-btn">
                            <i class="fas fa-plus-circle me-2"></i>
                            <span>Add Product</span>
                        </a>
                        <a href="<?= base_url('categories') ?>" class="btn btn-outline-primary btn-lg action-btn">
                            <i class="fas fa-tags me-2"></i>
                            <span>Categories</span>
                        </a>
                        <button class="btn btn-outline-secondary btn-lg action-btn" onclick="exportProducts()">
                            <i class="fas fa-download me-2"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>
            </div>
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
                               placeholder="Search products..." value="<?= $keyword ?? '' ?>">
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
                                       data-confirm-delete="Are you sure you want to delete this product?">
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
