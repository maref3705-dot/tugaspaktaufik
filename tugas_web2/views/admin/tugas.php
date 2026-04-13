<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tugas.php';

$database = new Database();
$db = $database->connect();

$tugas = new Tugas($db);
$result = $tugas->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tugas</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6fb;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: linear-gradient(180deg, #e316e6, #e51aa1);
            color: white;
            padding-top: 20px;
            position: relative;
        }

        .sidebar h2 {
            text-align: center;
            color: #ffffff;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
            color: #2c3e50;
        }

        .btn {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-tambah {
            background: linear-gradient(90deg, #4e54c8, #e81999);
        }

        .btn-edit {
            background: #6c5ce7;
        }

        .btn-hapus {
            background: #d63031;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: transparent;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid rgba(10, 6, 104, 0.2);
        }

        th {
            background: transparent;
            color: #1e0f7e;
        }

        tr:hover {
            background: rgba(78, 84, 200, 0.1);
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Sidebar -->
    <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>

    <!-- Content -->
    <div class="content">
        <h2>Data Tugas</h2>

        <a href="index.php?page=tambah_tugas" class="btn btn-tambah">+ Tambah Tugas</a>

        <table>
            <tr>
                <th>No</th>
                <th>Judul Tugas</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                <th>Aksi</th>
            </tr>   

            <?php $no = 1; ?>
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td>
                    <a href="index.php?page=edit_tugas&id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?page=hapus_tugas" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

    </div>

</div>

</body>
</html>