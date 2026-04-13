<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}


if ($_SESSION['role'] != 'mahasiswa') {
    header("Location: index.php?page=dashboard");
    exit();
}


require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/tugas.php';

$db = (new Database())->connect();
$tugas = new Tugas($db);
$result = $tugas->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas Mahasiswa</title>
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
    }

    .sidebar {
        width: 220px;
        background: rgb(113, 127, 45);
        height: 100vh;
        color: white;
        padding: 20px;
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
    }

    .sidebar a:hover {
        background: hsl(304, 60%, 5%);
    }

    .content {
        flex: 1;
        padding: 30px;
        background: rgb(9, 6, 51);
    }

    .header {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(54, 12, 12, 0.6); 
        backdrop-filter: blur(5px); 
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        padding: 12px;
        text-align: left;
        font-weight: bold;
        border-bottom: 2px solid #330c0c;
        background: transparent; 
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #073c3c;
    }

    tr:hover {
        background: hsla(0, 28%, 18%, 0.05);
    }
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Mahasiswa</h2>
    <a href="index.php?page=mhsdashboard">Home</a>
    <a href="index.php?page=mhstugas">ugas</a>
    <a href="index.php?page=logout">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

    <div class="header">
        <h2>Daftar Tugas</h2>
        <p>Berikut adalah tugas yang tersedia</p>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= $row['deadline']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>