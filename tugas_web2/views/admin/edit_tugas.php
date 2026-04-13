<?php

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit();
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tugas.php';

$database = new Database();
$db = $database->connect();

$tugas = new Tugas($db);


$id = $_GET['id'];
$data = $tugas->getById($id);


if (!$data) {
    echo "Data tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: rgb(27, 112, 239);
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
            box-shadow: 0 8px 20px rgba(215, 213, 213, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #eae320;
            border-radius: 5px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: rgb(18, 228, 67);
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #178bd8;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #ec0e0e;
        }
    </style>
</head>
<body>

<div class="form-box">

    <h2>Edit Tugas</h2>

    <form method="POST" action="controllers/TugasController.php?action=update">

   
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <label>Judul</label>
        <input type="text" name="judul" value="<?php echo $data['judul']; ?>" required>


        <label>Deskripsi</label>
        <textarea name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>

        <label>Deadline</label>
        <input type="date" name="deadline" value="<?php echo $data['deadline']; ?>" required>

        <button type="submit">Update</button>

    </form>

    <a href="index.php?page=tugas" class="back">← Kembali</a>

</div>

</body>
</html>