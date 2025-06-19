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
<title>Login admin</title>
</head>
<body>
  <div class="LoginPage">
    <div class="login-card">
      <h2 class="login-title">Masuk Admin</h2>
      <form>
        <div class="form-group">    
          <input type="username" class="form-control" id="inputusername" placeholder="username">
          <div class="error-message">username tidak ditemukan</div>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="inputpassword" placeholder="password">
          <div class="error-message">Password salah</div>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="check">
          <label class="form-check-label" for="check">Ingat saya</label>
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