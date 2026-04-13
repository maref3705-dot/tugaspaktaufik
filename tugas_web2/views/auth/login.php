<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login User</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4b23b0, #e7b510);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(216, 47, 47, 0.2);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: rgb(231, 12, 92);
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-box input:focus {
            outline: none;
            border-color: #0ee2e6;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(90deg, rgb(12, 178, 228), rgb(234, 144, 9));
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-box button:hover {
            opacity: 0.9;
        }

        .error {
            color: #160fe2;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login User</h2>

    <form method="POST" action="../../controllers/AuthController.php">        
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>