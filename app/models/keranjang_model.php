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

    public function getKeranjangByMultipleIds($ids, $id_user) {
        if (empty($ids)) {
            return [];
        }
    
        // Buat placeholder bernama untuk klausa IN, misal: :id0, :id1, :id2
        $placeholders = [];
        foreach ($ids as $key => $value) {
            $placeholders[] = ":id" . $key;
        }
        $placeholders_string = implode(',', $placeholders);
    
        $query = "SELECT * FROM " . $this->table . " WHERE id_user = :id_user AND id IN (" . $placeholders_string . ")";
        
        $this->db->Query($query);
    
        $this->db->Bind(":id_user", $id_user);
        foreach ($ids as $key => $id) {
            $this->db->Bind(":id" . $key, $id);
        }
    
        $this->db->execute();
        return $this->db->resultSet();
    }
    
    public function tambahKeranjang($data){
        //var_dump($data); die;
        // Query untuk menambahkan data keranjang
        $query = "INSERT INTO " . $this->table.  " VALUES (NULL, :id_user, :id_buku, :jumlah, :harga, :nama_buku, :foto_buku)";
        $this->db->Query($query);

        // Bind kan valuenya ke query
        $this->db->Bind(":id_user", htmlspecialchars(intval($data['id_user'])));
        $this->db->Bind(":id_buku", htmlspecialchars(intval($data['id_buku'])));
        $this->db->Bind(":jumlah", htmlspecialchars(intval($data['jumlah'])));
        $this->db->Bind(":harga", htmlspecialchars(intval($data['harga'])));
        $this->db->Bind(":nama_buku", htmlspecialchars($data['nama_buku']));
        $this->db->Bind(":foto_buku", htmlspecialchars($data['foto_buku']));

        // Excecute query
        $this->db->execute();

        // Ada tidak rows yang diubah kalo ada berikan angka > 0
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