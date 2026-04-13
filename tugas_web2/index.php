<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// ambil parameter page
$page = isset($_GET['page']) ? $_GET['page'] : 'login';


$protected_pages = [
    'dashboard', 'mahasiswa', 'tugas',
    'tambah_mahasiswa', 'tambah_tugas',
    'edit_mahasiswa', 'edit_tugas',
    'mhsdashboard', 'mhstugas'
];

// proteksi login
if (in_array($page, $protected_pages) && !isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}

// routing
switch($page) {

    case 'dashboard':
        if ($_SESSION['role'] != 'admin') {
            header("Location: index.php?page=mhsdashboard");
            exit();
        }
        require_once 'views/admin/dashboard.php';
        break;

    case 'mahasiswa':
        require_once 'views/admin/mahasiswa.php';
        break;

    case 'tambah_mahasiswa':
        require_once 'views/admin/tambah_mahasiswa.php';
        break;

    case 'edit_mahasiswa':
        require_once 'views/admin/edit_mahasiswa.php';
        break;

    case 'tugas':
        require_once 'views/admin/tugas.php';
        break;

    case 'tambah_tugas':
        require_once 'views/admin/tambah_tugas.php';
        break;

    case 'edit_tugas':
        require_once 'views/admin/edit_tugas.php';
        break;


    case 'mhsdashboard':
        if ($_SESSION['role'] != 'mahasiswa') {
            header("Location: index.php?page=dashboard");
            exit();
        }
        require_once 'views/mahasiswa/mhsdashboard.php';
        break;

    case 'mhstugas':
        if ($_SESSION['role'] != 'mahasiswa') {
            header("Location: index.php?page=dashboard");
            exit();
        }
        require_once 'views/mahasiswa/mhstugas.php';
        break;


    
    case 'login':
        require_once 'views/auth/login.php';
        break;

    case 'logout':
        session_unset();
        session_destroy();
        header("Location: index.php?page=login");
        exit();
        break;


    default:
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
        break;
}