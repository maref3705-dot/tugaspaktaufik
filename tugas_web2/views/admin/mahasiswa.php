<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/mahasiswa.php';

$database = new Database();
$db = $database->connect();

$mahasiswa = new Mahasiswa($db);
$result = $mahasiswa->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
     <style>
        body {
            margin: 0;
            font-family: Arial;
            background-color: #124bdc;
        }

    .container {
        display: flex;
    }

    .sidebar {
        width: 220px;
        height: 100vh;
        background: linear-gradient(180deg, #cacbd7, #13ea0f);
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
        background: linear-gradient(90deg, #4e54c8, #17fc85); 
    }

    .btn-edit {
        background: #0ece38;
    }

    .btn-hapus {
        background: #d63031;
    }

    .btn:hover {
        opacity: 0.85;
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
        border-bottom: 1px solid rgba(231, 22, 22, 0.2);
    }

    th {
        color: #c7d1c5;
        font-weight: bold;
        background: transparent;
    }

    tr {
        background: transparent;
    }

    tr:hover {
        background: rgba(37, 226, 59, 0.1); 
    }
    </style>
</head>
<body>

<div class="container">

   
        <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>

  
    <div class="content">
        <h2>Data Mahasiswa</h2>

        <a href="index.php?page=tambah_mahasiswa" class="btn btn-tambah">+ Tambah Mahasiswa</a>

        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1; ?>
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="index.php?page=edit_mahasiswa&id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="ndex.php?page=hapus_mahasiswa" class="btn btn-hapus" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>

    </div>

</div>

</body>
</html>