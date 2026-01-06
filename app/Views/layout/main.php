<?= $this->include('layout/header'); ?>

<div class="layout-wrapper">
    <!-- Sidebar -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- Main Area -->
    <div class="main-area">
        <!-- Topbar -->
        <nav class="topbar py-2">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button class="toggle-sidebar me-3 d-lg-block d-none" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button class="toggle-sidebar me-3 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <div class="page-title">
                            <?= $subtitle ?? ($title ?? 'Dashboard'); ?>
                        </div>
                        <div class="small text-muted">
                            Sistem Penjualan Technomart
                        </div>
                    </div>
                </div>
                <div class="small text-muted">
                    Halo, <strong>Admin</strong>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="content-wrapper">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= (session()->getFlashdata('success')) ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content'); ?>
        </div>

        <!-- Footer -->
        <?= $this->include('layout/footer'); ?>

    </div>
</div>
