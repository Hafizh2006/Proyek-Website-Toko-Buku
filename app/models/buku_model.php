<?php 

class buku_model 
{
    private $table = "buku";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }
    
    public function ambilSemuaBukuDarIdkategori($id_kategori) {
        $this->db->Query("SELECT * FROM buku WHERE id_kategori = :id_kategori");
        $this->db->Bind(':id_kategori', $id_kategori);
        return $this->db->resultSet(); 
    }

    public function getAllBukuById($id) {
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE id = :id");
        $this->db->Bind('id', $id);
        return $this->db->single();
    }

    public function tambahBuku($data) {

        // Query untuk menambahkan data buku
        $query = "INSERT INTO buku
                    VALUES
                    (NULL, :nama, :harga, :stok, :penulis, :id_kategori)";

        // Bind kan valuenya ke query
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("harga", $data['harga']);
        $this->db->Bind("stok", $data['stok']);
        $this->db->Bind("penulis", $data['penulis']);
        $this->db->Bind("foto", $data['foto']);
        $this->db->Bind("id_kategori", $data['id_kategori']);

        // Excecute query
        $this->db->execute();

        // Ada tidak rows yang diubah kalo ada nomer
        return $this->db->rowCount();
        return 0;
    }



    public function hapusBuku($id){
        // Query untuk menghapus data buku
        $query = "DELETE FROM buku WHERE id = :id";

        // Bind kan valuenya ke query
        $this->db->Query($query);
        $this->db->Bind("id", $id);

        // Excecute query
        $this->db->execute();

        // Ada tidak rows yang diubah kalo ada nomer
        return $this->db->rowCount();
    }


    public function ubahBuku($data) {

        // Query untuk memperbarui data buku
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    harga = :harga,
                    stok = :stok,
                    penulis = :penulis,
                    id_kategori = :id_kategori
                    WHERE id = :id";

        // Bind kan valuenya ke query
        $this->db->Query($query);
        $this->db->Bind("nama", $data['nama']);
        $this->db->Bind("harga", $data['harga']);
        $this->db->Bind("stok", $data['stok']);
        $this->db->Bind("penulis", $data['penulis']);
        $this->db->Bind("id_kategori", $data['id_kategori']);
        $this->db->Bind("id", $data['id']);

        // Excecute query
        $this->db->execute();

        // Ada tidak rows yang diubah kalo ada nomer
        return $this->db->rowCount();
        return 0;
    }

    public function updateStokBuku($id_buku, $jumlah_dibeli) {
        
        // Pertama, ambil stok saat ini
        $this->db->Query("SELECT stok FROM " . $this->table . " WHERE id = :id");
        $this->db->Bind(':id', $id_buku);
        $buku = $this->db->single();

        // Jika buku ditemukan, update stok
        if ($buku) {
            $stok_sekarang = $buku['stok'];
            $stok_baru = $stok_sekarang - $jumlah_dibeli;

            // Pastikan stok tidak menjadi negatif
            if ($stok_baru < 0) {
                $stok_baru = 0;
            }

            // Update stok di database
            $query = "UPDATE " . $this->table . " SET stok = :stok WHERE id = :id";
            $this->db->Query($query);
            $this->db->Bind(':stok', $stok_baru);
            $this->db->Bind(':id', $id_buku);
            return $this->db->execute();
        }
        return 0;
    }

}