<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require "../actions/loginAdmin_process.php";

if (isset($_POST['login'])){
    if ($_POST['name'] !== cekUsername($_POST['name']) && $_POST['password'] === cekPassword($_POST['password'])) {
        header("Location:../admins/login.php");
        exit;
    } else if ($_POST['password'] !== cekPassword($_POST['password']) && $_POST['name'] === cekUsername($_POST['name'])) {
        header("Location:../admins/login.php");
        exit;
    } else if ($_POST['password'] !== cekPassword($_POST['password']) && $_POST['name'] !== cekUsername($_POST['name'])) {
        header("Location:../admins/login.php");
        exit;
    } else {
        // ganti mejadi javascript untuk bagian alertnya
        $_SESSION['login'] = true;
        header("Location:../admins/home.php");
        exit;
    }
}

if (isset($_SESSION['login'])) {
    if($_SESSION['login'] === false){
        header("Location:../admins/login.php");
        exit;
    } else {
        header("Location:../admins/home.php"); 
        exit;
    }
}
 require_once "../includes/header.php";
?>
<title>Login Page</title>
</head>
<body>
    <div>
        <h1>Login</h1>
    </div>
    <div>
        <form action="" method="POST">
            <ul>
                <li>
                    <div>
                        <label for="name">Name :</label>
                        <input type="text" id="name" name="name">
                    </div>
                </li>
                <li>
                    <div>
                        <label for="">Password :</label>
                        <input type="password" id="password" name="password">
                    </div>
                </li>
                <li>
                    <div>
                        <button name="login">Login</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
<?php 

require_once "../includes/footer.php";

?>