<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_SESSION['submit'])){
  header("Location:../pages/index.php");
  exit;
}
require_once "../actions/login_process.php";
require_once "../config/const.php";
// Membuat variabel checking

$hasil1 = "";
$hasil2 = "";

if (isset($_POST['submit']))
{ 
  $data = $_POST;
  $email = verifikasiEmail($data);
  $password = verifikasiPassword($data);   
  if ($email == True &&  $password == True){
      $_SESSION['submit'] = true;
      $_SESSION['dataLogin'] = $data;
      header("Location:/proyek-webs/Proyek-Website-Toko-Buku/pages/index.php");
      exit;
  }elseif ($email == False && $password == True){
      $hasil1 = "Email tidak ada";
  } else if ($email == True && $password == False) {
      $hasil2 = "Password Salah";
  } else if ($email == False && $password == False) {
      $hasil1 = "Email tidak ada";  
      $hasil2 = "Password Salah";
  }      
}



require_once "../includes/header.php";
?>

<title>Login Page</title>
</head>
<body>
  <div class="LoginPage">
  <body>
  <div class="LoginPage">
    <form action="" id="loginForm" method="post">
      <div class="masuk">Masuk</div> <div class="input-email">

        <div class="input">
          <label for="email"></label>
          <input type="email" id="email" name="email" placeholder="Email" class="input-field">
        </div>

        <?php if ($hasil1 === "Email tidak ada"):?>
          <div class="error">Email tidak ditemukan</div>
        <?php endif;?>

      </div>

      <div class="input-password">
        <div class="input">
          <label for="passowrd"></label>
          <input type="password" id="password" name="password" placeholder="Password" class="input-field">
        </div>

        <?php if ($hasil2 === "Password Salah"):?>
          <div class="error">Passoword salah</div>
        <?php endif;?>

      </div>

      <div class="ingat-saya-check-box">
        <div class="checkbox-and-label">
          <input type="checkbox" id="ingat-saya" name="ingat-saya" class="checkbox"/>
          <label for="ingat-saya" class="label">Ingat saya</label>
        </div>
      </div>

      <div class="login-button">
        <button type="submit" id="loginBtn" name="submit" class="login-form-button">Log In</button>
      </div>

    </form>
    <p class="belum-punya-akun-daftar">
      Belum punya akun? <a href="#" class="daftar-link">Daftar</a>
    </p>
    
  </div>
<?php 
  require_once "../includes/footer.php";
?>