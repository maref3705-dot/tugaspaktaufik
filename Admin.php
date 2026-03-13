<?php
require_once "User.php";

class Admin extends User {

    private $idAdmin;

    public function __construct($nama,$email,$idAdmin){
        parent::__construct($nama,$email);
        $this->idAdmin = $idAdmin;
    }

    public function getIdAdmin(){
        return $this->idAdmin;
    }

}
?>