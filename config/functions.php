<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// pada new PDO SQLITE itu jangan memakai spasi

function cekUsername($data) {
    $data_modified = htmlspecialchars($data); 
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT name FROM admins WHERE name = :name";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $data_modified);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user['name'];
    } else {
        return False;
    }

}

function  cekPassword($data) {
    $data_modified = htmlspecialchars($data);
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT password FROM admins WHERE password = :password";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':password', $data_modified);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user['password'];
    } else {
        return False;
    }

}



?>