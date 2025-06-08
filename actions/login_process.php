<?php 

function verifikasiEmail($data){
    $db = new PDO("sqlite:../database/database.db");



    $email = htmlspecialchars($data['email']);

    $query = "SELECT email_user FROM user WHERE email_user = :email_user";
    $stmt = $db->query($query);
    $stmt->bindParam('email_user', $email);
    $stmt->execute();

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        if ($email === $user['email_user']){
            return True;
        }
        else {
            return False;
        }
    }
}


function verifikasiPassword($data){
    $db = new PDO("sqlite:../database/database.db");

    $password = htmlspecialchars($data['password']);

    $query = "SELECT password_user FROM user WHERE password_user = :password_user";
    $stmt = $db->prepare($query);
    $stmt->bindParam('password_user', $password);
    $stmt->execute();


    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        if ($password === $user['password_user']){
            return True;
        }
        else {
            return False;
        }
    }
}


        


function ambilDataUser($data){
    $db = new PDO("sqlite:/home/ardyan/Documents/Devlopment/Kuliah/Project/proyek-webs/Proyek-Website-Toko-Buku/database/database.db");
    $query = "SELECT * FROM user WHERE email_user = :email_user";

    $stmt = $db->prepare($query);
    $stmt->bindParam('email_user',$data['email']);
    $stmt->execute();

    $user = [];
    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        return $user;
    };

}


?>