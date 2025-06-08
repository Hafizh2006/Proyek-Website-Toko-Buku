<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); 

// Require apa saja yang dibutuhkan
require_once "../includes/header.php";
require_once "../actions/signUp_process.php";

// inisiasi vaariabel
$checkEmail = "";
$checkPassword = "";


// checking input
if (isset($_POST['submit'])){
    $data = $_POST;

    // pisah format email agar tahu ini email apa

    $explodeEmail = explode('@', $data['email']);

    if ($explodeEmail[1] == "gmail.com") {
      $check = checkEmail($data);
      if ($check == false){
          $checkEmail = "Email sudah ada";
      } else if ($check == true){
          $checkEmail = "Email baru";  
      }
    } else {
      $checkEmail = "Format email salah";
    }





    if (strlen($data['password']) >= 8 && strlen($data['confirm_password']) >= 8) {
      if ($data['password'] == $data['confirm_password']){
        $checkPassword = "Password sudah benar";
      } else {
        $checkPassword = "Password tidak cocok";
      }
    } else{
      $checkPassword = "Password terlalu pendek";
    }
}



?>
    <title>Sign Up</title>
</head>
<body>
    <!-- seleksi untuk mengeluarkan alert/peringatan -->

    <!-- Seleksi untuk format email yang salah dan pembenaranya -->
      <?php  if ($checkEmail === "Format email salah" && $checkPassword === "Password sudah benar"):?>
        <script>alert( "Hanya menerima format '@gmail.com'!");</script>
      
      <?php elseif ($checkEmail === "Format email salah" && $checkPassword === "Password tidak cocok"):?>
        <script>alert( "Format Email salah dan password tidak sama!");</script>

      <?php elseif ($checkEmail === "Format email salah" && $checkPassword === "Password terlalu pendek"): ?>
        <script>alert( "Format Email salah dan password terlalu pendek !");</script>

    <!-- Seleksi email yang sudah ada dan pembenaranya -->
      <?php elseif($checkEmail === "Email sudah ada" && $checkPassword === "Password terlalu pendek"):?>
          <script>alert( "Email sudah ada dan  Password terlalu pendek !");</script> 
      
      <?php elseif($checkEmail === "Email sudah ada" && $checkPassword === "Password tidak cocok"):?>
          <script>alert( "Email sudah ada dan  Password tidak cocok !");</script>
      
      <?php elseif($checkEmail === "Email sudah ada" && $checkPassword === "Password sudah benar"):?>
          <script>alert( "Email sudah ada");</script>
      
    <!-- Seleksi email baru dan pembenaranya bila mengeluarkan kesalahan  -->
      <?php elseif($checkEmail === "Email baru" && $checkPassword === "Password terlalu pendek"):?>
          <script>alert( "Password terlalu pendek");</script>

      <?php elseif($checkEmail === "Email baru" && $checkPassword === "Password tidak cocok"):?>
          <script>alert( "Password tidak sama !");</script>

      <?php elseif ($checkEmail === "Email baru" && $checkPassword === "Password sudah benar"): ?>
          
          <script>alert( "Pembuatan akun sukses !");</script> 
          <?php
              writeData($_POST); 
              header("Location:/proyek-webs/Proyek-Website-Toko-Buku/pages/loginPage.php");
              exit;
          ?>
      <?php endif;?>

  <div class="sign-up-page">
        <div class="form-card">
        <h1 class="title">Daftar Akun</h1>

        <form class="signup-form" action="" method="post">

          <input type="text" id="fullname" name="fullname" placeholder="Nama lengkap" required>
          
          <input type="email" id="email" name="email" placeholder="Email" required>
          
          <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
          
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Kata Sandi" required>
          
          <button name="submit" type="submit">Daftar</button>

        </form>
        
        </div>
    </div>
<?php 

require_once "../includes/footer.php";

?>