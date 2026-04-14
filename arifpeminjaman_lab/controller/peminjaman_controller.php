<?php
require_once __DIR__ . "/../model/Peminjaman.php";

class peminjaman_controller {
    private $model;

    public function __construct() {
        $this->model = new Peminjaman();
    }

    public function index() {
        $status = $_GET['status'] ?? null;
        $data = $this->model->getAll($status);
        include __DIR__ . "/../view/index.php";
    }

    public function tambah() {
        include __DIR__ . "/../view/tambah.php";
    }

    public function simpan() {
        $this->model->insert($_POST);
        header("Location: index.php");
    }

    public function edit($id) {
        $data = $this->model->getById($id);
        include __DIR__ . "/../view/edit.php";
    }

    public function update() {
        $this->model->update($_POST['id'], $_POST);
        header("Location: index.php");
    }

    public function hapus($id) {
        $this->model->delete($id);
        header("Location: index.php");
    }
}