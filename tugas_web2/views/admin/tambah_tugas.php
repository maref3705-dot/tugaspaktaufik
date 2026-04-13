<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}
?>

<div style="display:flex; justify-content:center; align-items:center; height:100vh;">

    <div style="width:400px; background:#ffffff; padding:25px; border-radius:10px; box-shadow:0 8px 20px rgba(227, 18, 18, 0.15);">

        <h2 style="text-align:center; margin-bottom:20px;">Tambah Tugas</h2>

        <form method="POST" action="/projek_web2/controllers/TugasController.php?action=store">

            <label>Judul Tugas</label>
            <input type="text" name="judul" placeholder="Masukkan Judul" required
                style="width:100%; padding:10px; margin:8px 0 15px; border:1px solid #ccc; border-radius:5px;">

            <label>Deskripsi</label>
            <textarea name="deskripsi" placeholder="Masukkan Deskripsi"
                style="width:100%; padding:10px; margin:8px 0 20px; border:1px solid #ccc; border-radius:5px;"></textarea>
            <label>Deadline</label>
                <input type="date" name="deadline" required style="width:100%; padding:10px; margin:8px 0 20px; border:1px solid hsl(0, 89%, 50%); border-radius:5px;">
            <button type="submit"
                style="width:100%; padding:10px; background:#3498db; color:white; border:none; border-radius:5px; font-weight:bold;">
                Simpan
            </button>

            <a href="index.php?page=tugas"
               style="display:block; text-align:center; margin-top:10px; text-decoration:none; color:#555;">
                ← Kembali
            </a>

        </form>

    </div>

</div>