<?php
require_once "Mahasiswa.php";
require_once "Dosen.php";
require_once "Admin.php";

$mhs = new Mahasiswa("Budi Santoso","budi@kampus.ac.id","2211001");
$dosen = new Dosen("Dr. Andi","andi@kampus.ac.id","04123456");
$admin = new Admin("Siti Rahma","admin@kampus.ac.id","ADM01");

?>

<!DOCTYPE html>
<html>
<head>

<title>Sistem Kampus OOP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background: linear-gradient(135deg,#4e73df,#1cc88a);
min-height:100vh;
}

.card{
border-radius:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">
<span class="navbar-brand">Sistem Kampus OOP</span>
</div>
</nav>

<div class="container mt-5">

<h2 class="text-center text-white mb-5">
Data Pengguna Sistem Kampus
</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow">
<div class="card-header bg-primary text-white">
Mahasiswa
</div>

<div class="card-body">

<p><b>Nama :</b> <?= $mhs->getNama(); ?></p>
<p><b>Email :</b> <?= $mhs->getEmail(); ?></p>
<p><b>NIM :</b> <?= $mhs->getNim(); ?></p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-header bg-success text-white">
Dosen
</div>

<div class="card-body">

<p><b>Nama :</b> <?= $dosen->getNama(); ?></p>
<p><b>Email :</b> <?= $dosen->getEmail(); ?></p>
<p><b>NIDN :</b> <?= $dosen->getNidn(); ?></p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-header bg-dark text-white">
Admin
</div>

<div class="card-body">

<p><b>Nama :</b> <?= $admin->getNama(); ?></p>
<p><b>Email :</b> <?= $admin->getEmail(); ?></p>
<p><b>ID Admin :</b> <?= $admin->getIdAdmin(); ?></p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>