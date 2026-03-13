<?php

class User {

    // Encapsulation
    private $nama;
    private $email;

    // Constructor
    public function __construct($nama,$email){
        $this->nama = $nama;
        $this->email = $email;
    }

    // Setter & Getter Nama
    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    // Setter & Getter Email
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

}
?>