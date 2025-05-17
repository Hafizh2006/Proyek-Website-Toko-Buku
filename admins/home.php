<?php 
session_start();


if(isset($_SESSION['login'])){
    if (!$_SESSION['login']) {
        header("Location: ../admins/login.php");
        exit;
    }
} else {
    header("Location: ../admins/login.php");
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <h1>Selamat Datang Admin</h1>
</body>
</html>