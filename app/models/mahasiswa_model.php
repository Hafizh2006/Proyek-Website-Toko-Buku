<?php 

class mahasiswa_model 
{
    private $table = "mahasiswa";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }
    public function getAllMhs() {
        $this->db->Query("SELECT * FROM ". $this->table);
        return $this->db->resultSet();
    }

    public function getAllMhsbyId($id) {
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE id = :id");
        $this->db->Bind('id', $id);
        return $this->db->single();
    }

    public function tambahMhs($data) {


        $query = "INSERT INTO mahasiswa
                    VALUES
                    (NULL, :nama, :kelas, :prodi)";
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("kelas", $data['kelas']);
        $this->db->Bind("prodi", $data['prodi']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }



    public function hapusMhs($id){

        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    public function ubahMhs($data){
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    kelas =  :kelas,
                    prodi =  :prodi
                    WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("kelas", $data['kelas']);
        $this->db->Bind("prodi", $data['prodi']);
        $this->db->Bind("id", $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }
}