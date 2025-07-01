<?php 

class keranjang_model{

    private $table = "keranjang";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }


    public function ambilSemuaKeranjang($id){
        $query = "SELECT * FROM " . $this->table . " WHERE id_user = :id_user";
        $this->db->Query($query);
        $this->db->Bind(":id_user", htmlspecialchars(intval($id)));
        $this->db->execute();
        return $this->db->resultSet();

    }

    public function getKeranjangById($id){
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind(":id", htmlspecialchars(intval($id)));
        $this->db->execute();
        return $this->db->single();
    }

    public function getKeranjangByBukuAndUser($id_buku, $id_user){
        $query = "SELECT * FROM " . $this->table . " WHERE id_buku = :id_buku AND id_user = :id_user";
        $this->db->Query($query);
        $this->db->Bind(":id_buku", htmlspecialchars(intval($id_buku)));
        $this->db->Bind(":id_user", htmlspecialchars(intval($id_user)));
        $this->db->execute();
        return $this->db->single();
    }

    
    public function tambahKeranjang($data){
        //var_dump($data); die;

        $query = "INSERT INTO " . $this->table.  " VALUES (NULL, :id_user, :id_buku, :jumlah, :harga, :nama_buku, :foto_buku)";
        $this->db->Query($query);
        $this->db->Bind(":id_user", htmlspecialchars(intval($data['id_user'])));
        $this->db->Bind(":id_buku", htmlspecialchars(intval($data['id_buku'])));
        $this->db->Bind(":jumlah", htmlspecialchars(intval($data['jumlah'])));
        $this->db->Bind(":harga", htmlspecialchars(intval($data['harga'])));
        $this->db->Bind(":nama_buku", htmlspecialchars($data['nama_buku']));
        $this->db->Bind(":foto_buku", htmlspecialchars($data['foto_buku']));

        $this->db->execute();

        return $this->db->rowCount();
    }

    


    public function hapusKeranjang($id){
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind(":id", htmlspecialchars(intval($id)));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKeranjang($data){
        $query = "UPDATE " . $this->table . " SET jumlah = :jumlah, harga = :harga WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind(":jumlah", htmlspecialchars(intval($data['jumlah'])));
        $this->db->Bind(":harga", htmlspecialchars(intval($data['harga'])));
        $this->db->Bind(":id", htmlspecialchars(intval($data['id'])));
        $this->db->execute();
        return $this->db->rowCount();
    }

}
?>