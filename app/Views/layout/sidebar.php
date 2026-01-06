<?php
$segment = service('uri')->getSegment(1);
?>

<!-- Desktop Sidebar -->
<div class="sidebar d-flex flex-column d-none d-lg-flex" id="sidebar">
    <div class="sidebar-header">
        <div class="brand">Technomart</div>
        <div class="brand-sub">MI-04421</div>
    </div>

    <nav class="mt-2 flex-grow-1">
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a href="<?= base_url('/'); ?>" class="nav-link <?= $segment== '' ? 'active' : '' ?>">
                    <i class="fas fa-tachometer-alt me-2"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('products'); ?>" class="nav-link <?= $segment== 'products' ? 'active' : '' ?>">
                    <i class="fas fa-box me-2"></i><span>Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('categories'); ?>" class="nav-link <?= $segment== 'categories' ? 'active' : '' ?>">
                    <i class="fas fa-tags me-2"></i><span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('customers'); ?>" class="nav-link <?= $segment== 'customers' ? 'active' : '' ?>">
                    <i class="fas fa-users me-2"></i><span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('sales'); ?>" class="nav-link <?= $segment== 'sales' ? 'active' : '' ?>">
                    <i class="fas fa-shopping-cart me-2"></i><span>Sales</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('employees'); ?>" class="nav-link <?= $segment== 'employees' ? 'active' : '' ?>">
                    <i class="fas fa-user-tie me-2"></i><span>Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('reports'); ?>" class="nav-link <?= $segment== 'reports' ? 'active' : '' ?>">
                    <i class="fas fa-chart-bar me-2"></i><span>Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('settings'); ?>" class="nav-link <?= $segment== 'settings' ? 'active' : '' ?>">
                    <i class="fas fa-cog me-2"></i><span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title" id="mobileSidebarLabel">Technomart</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-dark">
        <nav>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="<?= base_url('/'); ?>" class="nav-link text-light <?= $segment == '' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('products'); ?>" class="nav-link text-light <?= $segment == 'products' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-box me-2"></i>Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('categories'); ?>" class="nav-link text-light <?= $segment == 'categories' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-tags me-2"></i>Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('employees'); ?>" class="nav-link text-light <?= $segment == 'employees' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-user-tie me-2"></i>Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('customers'); ?>" class="nav-link text-light <?= $segment == 'customers' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-users me-2"></i>Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('sales'); ?>" class="nav-link text-light <?= $segment == 'sales' ? 'active bg-primary' : '' ?>">
                        <i class="fas fa-shopping-cart me-2"></i>Sales
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
