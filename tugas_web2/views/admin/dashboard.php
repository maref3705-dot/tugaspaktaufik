<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=login");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0d4be8;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: linear-gradient(180deg, #0a0c07, #111811);
            color: white;
            padding-top: 20px;
            position: relative;
        }

        .sidebar h2 {
            text-align: center;
            color: #a67dcb;
        }

        .sidebar a {
            display: block;
            color: rgb(143, 142, 121);
            padding: 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(248, 36, 78, 0.2);
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #781576;
            color: #2c3e50;
        }

        h1 {
            color: #c4c7af;
        }

        p {
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">

    <?php require_once __DIR__ . '/../layout/sidebar.php'; ?>
    
    <div class="content">
        <h1>Dashboard</h1>
        <p>Selamat datang, <b><?php echo $_SESSION['username']; ?></b> 👋</p>
    </div>

</div>

</body>
</html>