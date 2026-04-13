<?php
class Tugas {
    private $conn;
    private $table = "tugas";

    public $judul;
    public $deskripsi;
    public $deadline; 

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
        $query = "INSERT INTO tugas (judul, deskripsi, deadline) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            $this->judul,
            $this->deskripsi,
            $this->deadline 
        ]);
    }
    public function getById($id) {
    $query = "SELECT * FROM tugas WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update() {
    $query = "UPDATE tugas SET judul = ?, deskripsi = ?, deadline = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);

    return $stmt->execute([
        $this->judul,
        $this->deskripsi,
        $this->deadline,
        $this->id
    ]);
}

public function delete($id) {
    $query = "DELETE FROM tugas WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([$id]);
}
}