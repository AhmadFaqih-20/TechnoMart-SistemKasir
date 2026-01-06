<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Technomart</title>

    <!-- Bootstrap 5 & icons -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet" >
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
     <!-- Chart.js for dashboard -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <!-- Custom CSS -->
     <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

     <style>
        body {
            min-height: 100vh;
            background-color: #f3f4f5;
        }

        .layout-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 230px;
            background-color: #212529;
            color: #f8f9fa;
        }

        .sidebar .sidebar-header {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
        }

        .sidebar .brand {
            font-size: 1rem;
            font-weight: 600;
        }

        .sidebar .brand-sub {
            font-size: .75rem;
            color: #adb5bd;
        }

        .sidebar .nav-link {
            color: #ced4da;
            font-size: .9rem;
            border-radius: .35rem;
            margin: .1rem .5rem;
        }

        .sidebar .nav-link i {
            width: 1.1rem;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, .1);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }
        
        .main-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .topbar .page-title {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .content-wrapper {
            flex: 1;
            padding: 1.25rem 1.5rem;
        }

        footer {
            margin-top: auto;
            border-top: 1px solid #dee2e6;
            background-color: #ffffff;
            padding: .6rem 1.5rem;
            font-size: .8rem;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .layout-wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
        }

     </style>

</head>
<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="spinner"></div>
    </div>
