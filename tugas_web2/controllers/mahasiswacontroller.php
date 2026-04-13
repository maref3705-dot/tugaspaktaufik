<?php
session_start();

require_once '../config/database.php';
require_once '../models/Mahasiswa.php';

$database = new Database();
$db = $database->connect();

$mahasiswa = new Mahasiswa($db);

if ($_GET['action'] == 'store') {

    $mahasiswa->nim = $_POST['nim'];
    $mahasiswa->nama = $_POST['nama'];
    $mahasiswa->email = $_POST['email'];

    if ($mahasiswa->create()) {
        header("Location: ../index.php?page=mahasiswa");
    } else {
        echo "Gagal tambah data";
    }
// UPDATE
if ($_GET['action'] == 'update') {

    $mahasiswa->id = $_POST['id'];
    $mahasiswa->nim = $_POST['nim'];
    $mahasiswa->nama = $_POST['nama'];
    $mahasiswa->email = $_POST['email'];

    $mahasiswa->update();
    header("Location: ../index.php?page=mahasiswa");
}

// DELETE
if ($_GET['action'] == 'delete') {

    $id = $_GET['id'];
    $mahasiswa->delete($id);

    header("Location: ../index.php?page=mahasiswa");
}
}