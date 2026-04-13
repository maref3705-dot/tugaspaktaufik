<?php
session_start();

require_once '../config/database.php';
require_once '../models/Tugas.php';

$database = new Database();
$db = $database->connect();

$tugas = new Tugas($db);

if (isset($_GET['action']) && $_GET['action'] == 'store') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tugas->judul = $_POST['judul'];
        $tugas->deskripsi = $_POST['deskripsi'];
        $tugas->deadline = $_POST['deadline'];

        if ($tugas->create()) {
            header("Location: ../index.php?page=tugas");
            exit();
        } else {
            echo "Gagal tambah tugas";
        }

    }
// UPDATE
if ($_GET['action'] == 'update') {

    $tugas->id = $_POST['id'];
    $tugas->judul = $_POST['judul'];
    $tugas->deskripsi = $_POST['deskripsi'];
    $tugas->deadline = $_POST['deadline'];

    $tugas->update();
    header("Location: ../index.php?page=tugas");
}

// DELETE
if ($_GET['action'] == 'delete') {

    $id = $_GET['id'];
    $tugas->delete($id);

    header("Location: ../index.php?page=tugas");
}
}