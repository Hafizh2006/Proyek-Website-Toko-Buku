<?php 

class buku_model 
{
    private $table = "buku";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }
    
    public function getAllBuku() {
        $this->db->Query("SELECT * FROM ". $this->table);
        return $this->db->resultSet();
    }

    public function getAllBukubyId($id) {
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE id = :id");
        $this->db->Bind('id', $id);
        return $this->db->single();
    }

    public function tambahBuku($data) {
        $query = "INSERT INTO buku
                    VALUES
                    (NULL, :nama, :harga, :stok, :penulis, :id_kategori)";
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("harga", $data['harga']);
        $this->db->Bind("stok", $data['stok']);
        $this->db->Bind("penulis", $data['penulis']);
        $this->db->Bind("foto", $data['foto']);
        $this->db->Bind("id_kategori", $data['id_kategori']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }



    public function hapusBuku($id){

        $query = "DELETE FROM buku WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    public function ubahBuku($data){
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    harga = :harga,
                    stok = :stok,
                    penulis = :penulis,
                    id_kategori = :id_kategori
                    WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("harga", $data['harga']);
        $this->db->Bind("stok", $data['stok']);
        $this->db->Bind("penulis", $data['penulis']);
        $this->db->Bind("id_kategori", $data['id_kategori']);
        $this->db->Bind("id", $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }
}