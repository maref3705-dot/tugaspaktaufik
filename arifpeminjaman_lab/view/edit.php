<style>
body{
    background:#0f172a;
    font-family:'Segoe UI';
    color:white;
}

.box{
    width:400px;
    margin:40px auto;
    background:#111827;
    padding:20px;
    border-radius:15px;
}

input,select{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:none;
    background:#1e293b;
    color:white;
}

button{
    width:100%;
    padding:12px;
    background:#facc15;
    border:none;
    color:black;
    border-radius:8px;
}
</style>

<div class="box">
<h2>✏️ Edit Data</h2>

<form method="POST" action="index.php?action=update">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    Nama <input type="text" name="nama" value="<?= $data['nama'] ?>">
    NIM <input type="text" name="nim" value="<?= $data['nim'] ?>">
    Alat <input type="text" name="alat" value="<?= $data['alat'] ?>">
    Tanggal Pinjam <input type="date" name="tanggal_pinjam" value="<?= $data['tanggal_pinjam'] ?>">
    Tanggal Kembali <input type="date" name="tanggal_kembali" value="<?= $data['tanggal_kembali'] ?>">

    Status
    <select name="status">
        <option <?= $data['status']=='Dipinjam'?'selected':'' ?>>Dipinjam</option>
        <option <?= $data['status']=='Kembali'?'selected':'' ?>>Kembali</option>
    </select>

    <button>Update</button>
</form>
</div>