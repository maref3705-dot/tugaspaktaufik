<?php
class Koneksi {
    public static function connect() {
        return new mysqli("localhost", "root", "", "arifpeminjaman_lab");
    }
}