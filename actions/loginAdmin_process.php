<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// pada new PDO SQLITE itu jangan memakai spasi

function cekUsername($data) { 
    $db = new PDO('sqlite:../database/database.db');
    
    $data_modified = htmlspecialchars($data);
    $query = "SELECT nama_user FROM user WHERE nama_user = :nama_user";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nama_user', $data_modified);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user['nama_user'];
    } else {
        return False;
    }

}

function  cekPassword($data) {
    $db = new PDO('sqlite:../database/database.db');

    $data_modified = htmlspecialchars($data);
    $query = "SELECT password_user FROM user WHERE password_user = :password_user";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':password_user', $data_modified);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user['password_user'];
    } else {
        return False;
    }

}


function  cekEmailAdmin($data) {
    $db = new PDO('sqlite:../database/database.db');

    $data_modified = htmlspecialchars($data);
    $query = "SELECT email_user FROM user WHERE email_user = :email_user";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email_user', $data_modified);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user['email_user'];
    } else {
        return False;
    }

}


function checkDataAdmin($data){
    $db = new PDO('sqlite:../database/database.db');
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $query = "SELECT * FROM user";
    $stmt = $db->query($query);
    $stmt->execute();

    foreach ($stmt as $row){
        if ($row['role'] === 'admin'){

            if ($row['nama_user'] === $nama &&
                $row['email_user'] === $email &&
                $row['password_user'] === $password
                ){
                return True;
            }
        }
    }
    return False;
}


?>