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

<section class="container my-4">
  <div class="row">

    <!-- Kolom kiri: Foto Profil -->
    <div class="col-md-4 text-center">
      <div class="profile-img-wrapper mb-3">
        <img src="https://via.placeholder.com/200" class="img-thumbnail rounded-circle" alt="Profile Picture" style="width:200px;height:200px;object-fit:cover;">
      </div>
      <button class="btn btn-outline-primary w-100">Unggah / Ganti Foto</button>
    </div>

    <!-- Kolom kanan: Data user -->
    <div class="col-md-8">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" class="form-control" value="atha123" readonly>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" value="atha@example.com" readonly>
      </div>

      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" class="form-control" rows="2" readonly>Jalan Prawirotaman No. 10, Jogja</textarea>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" value="********" readonly>
      </div>

      <!-- Buttons -->
      <div class="d-flex gap-2 mt-3">
        <button class="btn btn-warning btn-sm">Ganti Password</button>
        <button class="btn btn-success btn-sm">Save Profile</button>
      </div>
    </div>

  </div>
</section>




<?php 
require_once ROOT_PATH . "/includes/footer.php";
?>