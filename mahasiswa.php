<?php
require_once "User.php";

class Mahasiswa extends User {

    private $nim;

    public function __construct($nama,$email,$nim){
        parent::__construct($nama,$email);
        $this->nim = $nim;
    }

    public function getNim(){
        return $this->nim;
    }

}
?>