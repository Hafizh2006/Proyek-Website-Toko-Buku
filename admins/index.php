<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(isset($_SESSION['login'])){
    if (!$_SESSION['login']) {
        header("Location:../admins/login.php");
        exit;
    }
} else {
    header("Location:../admins/login.php");
    exit;
}



require_once "../includes/header.php";
?>
<title>Admin Home</title>
</head>
<body>
    <h1>Selamat Datang Admin</h1>
<?php 
require_once "../includes/footer.php"
?>