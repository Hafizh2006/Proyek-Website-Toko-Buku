<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// session_start(); 

require "../actions/loginAdmin_process.php";

// if (isset($_SESSION['loginAdmin'])) {
//         header("Location:../admins/index.php"); 
//         exit;

// }

if (isset($_POST['loginAdmin'])){
    // var_dump(cekUsername($_POST['nama']));
    // echo "\n";
    // var_dump(cekPassword($_POST['password']));
    // echo "\n";
    // var_dump(cekEmailAdmin($_POST['email']));
    // echo "\n";
    // var_dump(checkDataAdmin($_POST));
    // echo "\n";
    // die;
    if ($_POST['nama'] !== cekUsername($_POST['nama']) && $_POST['password'] === cekPassword($_POST['password'])) {
        header("Location:../admins/loginAdmin.php");
        exit;
    } else if ($_POST['password'] !== cekPassword($_POST['password']) && $_POST['nama'] === cekUsername($_POST['nama'])) {
        header("Location:../admins/loginAdmin.php");
        exit;
    } else if ($_POST['password'] !== cekPassword($_POST['password']) && $_POST['nama'] !== cekUsername($_POST['nama'])) {
        header("Location:../admins/loginAdmin.php");
        exit;
    } else if ($_POST['password'] === cekPassword($_POST['password']) && $_POST['nama'] === cekUsername($_POST['nama']) && checkDataAdmin($_POST) === True){
            $_SESSION['loginAdmin'] = true;
            $_SESSION['dataAdmin'] = $_POST;
            header("Location:../admins/index.php");
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
                        <label for="nama">Name :</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                </li>
                <li>
                    <div>
                        <label for="email">Email :</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </li>
                <li>
                    <div>
                        <label for="">Password :</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </li>
                <li>
                    <div>
                        <button type="submit" id="loginAdmin" name="loginAdmin">Login</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
<?php 

require_once "../includes/footer.php";

?>