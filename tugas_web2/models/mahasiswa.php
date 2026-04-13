<?php
class Mahasiswa {
    private $conn;
    private $table = "mahasiswa";

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function create() {
    $query = "INSERT INTO mahasiswa (nim, nama, email) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $this->nim,
        $this->nama,
        $this->email
    ]);
}
    public function getById($id) {
    $query = "SELECT * FROM mahasiswa WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update() {
    $query = "UPDATE mahasiswa SET nim = ?, nama = ?, email = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $this->nim,
        $this->nama,
        $this->email,
        $this->id
    ]);
}

public function delete($id) {
    $query = "DELETE FROM mahasiswa WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([$id]);
}
}