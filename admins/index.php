<?php 
// session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


// if(!isset($_SESSION['loginAdmin'])){
//         header("Location:../admins/loginAdmin.php");
//         exit;
// }
// $dataAdmin = $_SESSION['dataAdmin'];



require_once "../includes/header.php";
?>
<title>Admin Home</title>
</head>
<body>
    <h1>Selamat 
        <?php if(isset($_SESSION['loginAdmin'])): ?>
            <?php echo $dataAdmin['nama']; ?>
        <?php endif; ?>
    </h1>
    
    <div>
        <button><a href="../admins/tambahBuku.php">Tambah Buku</a></button>
    </div>
<?php 
require_once "../includes/footer.php"
?>