<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// // Validasi Session
// if(isset($_SESSION['submit'])) {
// 	$user = $_SESSION['dataLogin'];
// 	if (!$_SESSION['submit']){
// 		header("Location:../pages/loginPage.php");
//     	exit;
// 	}

// } else {
// 	header("Location:/proyek-webs/Proyek-Website-Toko-Buku/pages/loginPage.php");
//     exit;
// }


// Require
require_once dirname(__DIR__) . '/' ."/config/const.php";
require_once ROOT_PATH . "actions/login_process.php";
require_once ROOT_PATH .  "actions/signUp_process.php";

// Ambil data User suatu function menggunakan $_SESSION['dataLogin] yang menyimpan data $_POST dari form login
// $dataUser = ambilDataUser($user);

// header tampilan website 
require_once ROOT_PATH . "/includes/header.php";
?>


afadasa

<?php 
require_once ROOT_PATH . "/includes/footer.php";
?>