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



<section class="container my-5">
  <h2 class="text-center mb-4">Our Catalog</h2>
  <div class="row g-4">
    <!-- Item 1 -->
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 1">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Product 1</h5>
          <p class="card-text text-muted">Rp 100.000</p>
          <button class="btn btn-primary mt-auto w-100 btn-sm">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- Item 2 -->
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 2">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Product 2</h5>
          <p class="card-text text-muted">Rp 120.000</p>
          <button class="btn btn-primary mt-auto w-100 btn-sm">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- Item 3 -->
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 3">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Product 3</h5>
          <p class="card-text text-muted">Rp 90.000</p>
          <button class="btn btn-primary mt-auto w-100 btn-sm">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- Item 4 -->
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100 shadow-sm">
        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product 4">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Product 4</h5>
          <p class="card-text text-muted">Rp 110.000</p>
          <button class="btn btn-primary mt-auto w-100 btn-sm">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- ... tambah lebih banyak produk sesuai kebutuhan -->
  </div>
</section>


<?php 
require_once ROOT_PATH . "/includes/footer.php";
?>