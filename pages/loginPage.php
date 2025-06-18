<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// if (isset($_SESSION['submit'])){
//   header("Location:../pages/index.php");
//   exit;
// }
require_once "../actions/login_process.php";
require_once "../config/const.php";
// Membuat variabel checking

$hasil1 = "";
$hasil2 = "";

// if (isset($_POST['submit']))
// { 
//   $data = $_POST;
//   $email = verifikasiEmail($data);
//   $password = verifikasiPassword($data);   
//   if ($email == True &&  $password == True){
//       $_SESSION['submit'] = true;
//       $_SESSION['dataLogin'] = $data;
//       header("Location:/proyek-webs/Proyek-Website-Toko-Buku/pages/index.php");
//       exit;
//   }elseif ($email == False && $password == True){
//       $hasil1 = "Email tidak ada";
//   } else if ($email == True && $password == False) {
//       $hasil2 = "Password Salah";
//   } else if ($email == False && $password == False) {
//       $hasil1 = "Email tidak ada";  
//       $hasil2 = "Password Salah";
//   }      
// }



require_once "../includes/header.php";
?>

<title>Login Page</title>
</head>
<body>
  <div class="LoginPage">
    <div class="login-card">
      <h2 class="login-title">Masuk</h2>
      <form>
        <div class="form-group">
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          <div class="error-message">Email tidak ditemukan</div>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          <div class="error-message">Password salah</div>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Ingat saya</label>
        </div>
        <button type="submit" class="btn-login">LOGIN</button>
        <div class="register-link">
          Belum punya akun? <a href="#">Daftar</a>
        </div>
      </form>
    </div>
  </div>
</body>

<?php 
  require_once "../includes/footer.php";
?>