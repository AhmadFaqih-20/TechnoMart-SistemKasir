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
                <!-- Profile Section -->
                <div class="d-flex align-items-center">
                    <!-- Notifications -->
                    <div class="dropdown me-3">
                        <button class="btn btn-link text-white position-relative" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-bell fa-lg"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                                3
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="min-width: 300px;">
                            <li class="dropdown-header">Notifications</li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <i class="fas fa-shopping-cart text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">New Order</div>
                                        <small class="text-muted">Order #1234 received</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <i class="fas fa-user-plus text-info"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">New Customer</div>
                                        <small class="text-muted">John Doe registered</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <i class="fas fa-exclamation-triangle text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Low Stock Alert</div>
                                        <small class="text-muted">iPhone 15 Pro Max</small>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center" href="#">View All Notifications</a></li>
                        </ul>
                    </div>

                    <!-- User Profile -->
                    <div class="dropdown">
                        <button class="btn btn-link text-white d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <div class="me-2">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=7c3aed&color=fff&size=32"
                                     class="rounded-circle" alt="Admin Avatar">
                            </div>
                            <div class="text-start d-none d-md-block">
                                <div class="small fw-bold">Administrator</div>
                                <div class="smaller opacity-75">admin@technomart.com</div>
                            </div>
                            <i class="fas fa-chevron-down ms-2 small"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Admin&background=7c3aed&color=fff&size=40"
                                         class="rounded-circle me-2" alt="Admin Avatar">
                                    <div>
                                        <div class="fw-bold">Administrator</div>
                                        <small class="text-muted">admin@technomart.com</small>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-key me-2"></i>Change Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
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
