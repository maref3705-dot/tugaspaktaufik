<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }

       
        .sidebar {
            width: 220px;
            background: #ebe40e;
            height: 100vh;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #1c4e30;
        }

        
        .content {
            flex: 1;
            padding: 30px;
            background: #339738;
        }

        .header {
            margin-bottom: 20px;
        }

        .card {
            width: 250px;
            background: #35380a;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(90, 117, 26, 0.2);
        }

        .card h3 {
            margin: 0;
        }

        .card p {
            font-size: 30px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>Mahasiswa</h2>
    <a href="index.php?page=mhsdashboard">Home</a>
    <a href="index.php?page=mhstugas">Tugas</a>
    <a href="index.php?page=logout">Logout</a>
</div>


<div class="content">

    <div class="header">
        <h2>Home Mahasiswa</h2>
        <p>Selamat datang, <b><?php echo $_SESSION['username']; ?></b> 👋</p>
    </div>

    
</div>

</body>
</html>
