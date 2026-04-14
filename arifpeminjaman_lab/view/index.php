<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background:#0f172a;
    color:white;
}

.container{
    padding:25px;
}

.card{
    background:#111827;
    padding:20px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,255,255,0.1);
}

h2{
    color:#38bdf8;
}

a{
    text-decoration:none;
    padding:8px 12px;
    border-radius:8px;
    margin:2px;
    display:inline-block;
}

.add{
    background:#22c55e;
    color:white;
}

.edit{
    background:#facc15;
    color:black;
}

.delete{
    background:#ef4444;
    color:white;
}

.filter a{
    background:#1e293b;
    color:#38bdf8;
    border:1px solid #38bdf8;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
    overflow:hidden;
    border-radius:10px;
}

th{
    background:#1e293b;
    color:#38bdf8;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    background:#0b1220;
    border-bottom:1px solid #1e293b;
}

tr:hover td{
    background:#111c33;
}
</style>

<div class="container">
<div class="card">

<h2>📘 ARIF - Peminjaman Lab System</h2>

<a class="add" href="index.php?action=tambah">+ Tambah Data</a>

<div class="filter">
    <a href="index.php">Semua</a>
    <a href="index.php?status=Dipinjam">Dipinjam</a>
    <a href="index.php?status=Kembali">Kembali</a>
</div>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Alat</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=$data->fetch_assoc()){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['nim'] ?></td>
    <td><?= $row['alat'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <a class="edit" href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a>
        <a class="delete" href="index.php?action=hapus&id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</div>
</div>