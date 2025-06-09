<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once "../actions/tambahBuku_process.php";
// if (isset($_POST['submit'])){
//     if (tambahBuku($_POST) > 0){
//         header("Location:../admins/index.php");
//         exit;
//     }
// }

require_once "../includes/header.php";
?>
<title>Tambah Buku</title>
</head>
<body>
  <div class="sign-up-page">
        <div class="form-card">
        <h1 class="title">Tambah Buku</h1>

        <form class="signup-form" action="" method="post">

          <input type="text" id="nama" name="nama" placeholder="Nama Buku" required>
          
          <input type="number" id="harga" name="harga" placeholder="Harga" required>
          
          <input type="number" id="stok" name="stok" placeholder="stok" required>
          
          <input type="text" id="penulis" name="penulis" placeholder="penulis" required>
          
          <input type="number" id="kategori" name="kategori" placeholder="1-5" required>
          <button name="submit" type="submit">Submit</button>

        </form>
          <button><a href="../admins/index.php">Kembali</a></button>
        </div>
    </div>
<?php 

require_once "../includes/footer.php";

?>