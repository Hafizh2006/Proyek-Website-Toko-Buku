<?php 

class user_model 
{
    private $table = "user";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }
    public function getAllM() {
        $this->db->Query("SELECT * FROM ". $this->table);
        return $this->db->resultSet();
    }

    public function getAllMhsbyId($id) {
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE id = :id");
        $this->db->Bind('id', $id);
        return $this->db->single();
    }

    public function tambahMhs($data) {


        $query = "INSERT INTO user
                    VALUES
                    (NULL, :nama_user, :password_user, :email_user, :alamat_user, :foto, :role)";
        $this->db->Query($query);
        $this->db->Bind("nama_user", $data['nama_user']);
        $this->db->Bind("password_user", $data['password_user']);
        $this->db->Bind("email_user", $data['email_user']);
        $this->db->Bind("alamat_user", $data['alamat_user']);
        $this->db->Bind("foto", $data['foto']);
        $this->db->Bind("role", $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }



    public function hapusMhs($id){

        $query = "DELETE FROM user WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    public function ubahMhs($data){
        $query = "UPDATE mahasiswa SET
                    nama_user = :nama_user,
                    password_user = :password_user,
                    email_user = :email_user,
                    alamat_user = :alamat_user
                    WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("nama_user", $data['nama_user']);
        $this->db->Bind("password_user", $data['password_user']);
        $this->db->Bind("email_user", $data['email_user']);
        $this->db->Bind("alamat_user", $data['alamat_user']);
        $this->db->Bind("id", $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }
}