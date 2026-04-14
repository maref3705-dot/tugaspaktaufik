<?php
require_once "Koneksi.php";

class Peminjaman {
    private $conn;

    public function __construct() {
        $this->conn = Koneksi::connect();
    }

    public function getAll($status = null) {
        if ($status) {
            return $this->conn->query("SELECT * FROM peminjaman WHERE status='$status'");
        }
        return $this->conn->query("SELECT * FROM peminjaman");
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM peminjaman WHERE id=$id")->fetch_assoc();
    }

    public function insert($data) {
        return $this->conn->query("
            INSERT INTO peminjaman (nama,nim,alat,tanggal_pinjam,tanggal_kembali,status)
            VALUES ('$data[nama]','$data[nim]','$data[alat]','$data[tanggal_pinjam]','$data[tanggal_kembali]','$data[status]')
        ");
    }

    public function update($id, $data) {
        return $this->conn->query("
            UPDATE peminjaman SET
            nama='$data[nama]',
            nim='$data[nim]',
            alat='$data[alat]',
            tanggal_pinjam='$data[tanggal_pinjam]',
            tanggal_kembali='$data[tanggal_kembali]',
            status='$data[status]'
            WHERE id=$id
        ");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM peminjaman WHERE id=$id");
    }
}