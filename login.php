<?php
session_start();

$pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindValue('email', $email);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);

    if ($res) {

       if($res['role'] == 'admin'){
   
          $_SESSION['admin_id'] = $res['id'];
          header('location:/admin.php');
 
       }elseif($res['role'] == 'user'){
 
          $_SESSION['user_id'] = $res['id'];
          header('location:index.php');

       }
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            text-align: center;
        }

        .login-container img {
            width: 150px;
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #ff8f00;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-container button:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="image/logo_charles-home.png" alt="Logo">
        <form method="POST" enctype="multipart/form-data">
            <input name="email" type="email" placeholder="Email" required><br>
            <input name="password" type="password" placeholder="Password" required><br>
            <button name="submit" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
