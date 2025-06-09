<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function tambahBuku($data){
    var_dump($data);die;
    $db = new PDO('sqlite:../database/database.db');
    $namaBuku =  htmlspecialchars($data['nama']);
    $harga =  htmlspecialchars($data['harga']);
    $stok = htmlspecialchars($data['stok']) ;
    $penulis =  htmlspecialchars($data['penulis']);
    $kategori = htmlspecialchars($data['kategori']);

    if (1 > intval($kategori) || intval($kategori) < 5){
        return 0;
    }

    $query = "INSERT INTO buku (nama, harga, stok, penulis, id_kategori)
            VALUES (nama = :nama,
                    harga = :harga,
                    stok = :stok,
                    penulis = :penulis,
                    id_kategori = :id_kategori)";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nama',  $namaBuku);
    $stmt->bindParam(':harga',  intval($harga));
    $stmt->bindParam(':stok',  intval($stok));
    $stmt->bindParam(':penulis',  $penulis);
    $stmt->bindParam(':id_kategori',  $kategori);
    $stmt->execute();

    $stmt->rowCount();
} 




?>