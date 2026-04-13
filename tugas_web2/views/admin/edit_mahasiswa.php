<?php

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit();
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Mahasiswa.php';

$database = new Database();
$db = $database->connect();

$mahasiswa = new Mahasiswa($db);

$id = $_GET['id'];
$data = $mahasiswa->getById($id);


if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #307ced;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-box {
            width: 400px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(195, 212, 198, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1833bc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: rgb(24, 188, 51);
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #555;
        }
    </style>
</head>
<body>

<div class="form-box">

    <h2>Edit Mahasiswa</h2>

    <form method="POST" action="controllers/MahasiswaController.php?action=update">

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>NIM</label>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required>

        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>

        <button type="submit">Update</button>

    </form>

    <a href="index.php?page=mahasiswa" class="back">← Kembali</a>

</div>

</body>
</html>