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
    background:#22c55e;
    border:none;
    color:white;
    border-radius:8px;
}
</style>

<div class="box">
<h2>➕ Tambah Data</h2>

<form method="POST" action="index.php?action=simpan">
    Nama <input type="text" name="nama">
    NIM <input type="text" name="nim">
    Alat <input type="text" name="alat">
    Tanggal Pinjam <input type="date" name="tanggal_pinjam">
    Tanggal Kembali <input type="date" name="tanggal_kembali">

    Status
    <select name="status">
        <option>Dipinjam</option>
        <option>Kembali</option>
    </select>

    <button>Simpan</button>
</form>
</div>