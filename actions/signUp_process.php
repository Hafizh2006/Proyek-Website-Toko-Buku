<?php 

function checkEmail($data) {
        $email = htmlspecialchars($data['email']);
        
        $checkEmail = ambilEmailDataUser($email);
            
        if ($checkEmail == False){
            return False;
        } else if ($checkEmail == True){
            return True;
        }   
}

function writeData($data){
        $db = new PDO("sqlite:../database/database.db");
        $nama =   htmlspecialchars($data['fullname']);
        $email = htmlspecialchars($data['email']);
        $password = htmlspecialchars($data['password']);
        $alamat = "default";
        $no_user = 1;
        $role = "user";

        $query =    "INSERT INTO user (nama_user, email_user, password_user, alamat_user, no_user, role) 
                    VALUES (:nama_user, :email_user, :password_user, :alamat_user, :no_user, :role)";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email_user', $email);
        $stmt->bindParam(':password_user', $password);
        $stmt->bindParam(':nama_user', $nama);
        $stmt->bindParam(':alamat_user', $alamat);
        $stmt->bindParam(':no_user', $no_user);
        $stmt->bindParam(':role', $role);

        $stmt->execute();
}

function ambilEmailDataUser($email){
    $db = new PDO("sqlite:../database/database.db");
    $query = "SELECT email_user FROM user";

    $stmt = $db->query($query);
    $dataUserEmail = $stmt->fetchAll(PDO::FETCH_COLUMN);
    foreach($dataUserEmail as $row){
        if ($email === $row){
            return False;
        }
    }
    return True;

}

?>