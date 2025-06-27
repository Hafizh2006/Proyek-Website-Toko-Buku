<?php 

class admin_model {
    private $table = "user";
    private $db;


    // Setiap class dipanggil ini terpanggil
    public function __construct()
    {
        $this->db = new database;
    }
    
    public function cekUsername($data) {
        $username = htmlspecialchars($data['nama_user']);
        $this->db->Query("SELECT nama_user FROM ". $this->table . " WHERE nama_user = :nama_user");

        $this->db->Bind(':nama_user', $username);
        $this->db->execute();

        $result_user = $this->db->single();
        
        if($result_user['nama_user'] === $username):
            return True;
        else:
            return False;
        endif;
    }

    // Cek password
    public function cekPassword($data) {
        
        if (!isset($data['nama_user']) || !isset($data['password_user'])) {
            return false; 
        }

       
        $username = htmlspecialchars($data['nama_user']);
        $password = htmlspecialchars($data['password_user']);
        $this->db->Query("SELECT password_user, role FROM ". $this->table. " WHERE nama_user = :nama_user");
        $this->db->Bind(':nama_user', $username);
        $this->db->execute();
        $result_user = $this->db->single();
        if (isset($result_user)):
            if ($result_user['role'] === 'admin'):
                if (password_verify($password, $result_user['password_user'])):
                    return True;
                else:
                    return False;
                endif;
            else:
                return False;
            endif;
        else:
            return False;
        endif;
    }

    // Ambil tabel apa saja sesuai inputan
    public function ambilTabel($nama_tabel){
        $allowedTables = ['buku', 'user']; // Daftar tabel yang diizinkan

        if (!in_array($nama_tabel, $allowedTables)) {
            error_log("Percobaan akses tabel tidak valid: " . $nama_tabel);
            return false; // Mengembalikan false jika tabel tidak diizinkan
        }

        try {
            $this->db->Query("SELECT * FROM " . htmlspecialchars($nama_tabel));
            $this->db->execute();
            return $this->db->resultSet(); // Mengembalikan array of associative arrays
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false; // Mengembalikan false jika ada kesalahan database
        }
    }

    // Tambah Buku
    public function tambahBuku($data){
        // var_dump($data); var_dump($_FILES['foto']); die;

            $nama = htmlspecialchars($data['nama']);
            $stok = htmlspecialchars($data['stok']);
            $harga = htmlspecialchars($data['harga']);
            $penulis = htmlspecialchars($data['penulis']);
            $id_kategori = htmlspecialchars($data['id_kategori']);
            $foto = htmlspecialchars($data['foto']);
            $query = "INSERT INTO buku
                        VALUES
                        (NULL, :nama, :harga, :stok, :penulis, :id_kategori, :foto)";
            $this->db->Query($query);
            $this->db->Bind(":nama", $nama);
            $this->db->Bind(":harga", $harga);
            $this->db->Bind(":stok", $stok);
            $this->db->Bind(":penulis", $penulis);
            $this->db->Bind(":id_kategori", intval($id_kategori));
            $this->db->Bind(":foto", $foto);

            $this->db->execute();

            return $this->db->rowCount();
            return 0;
        
        
    }


    // Tambah Kategori
    public function tambahKategori($data){
        $nama = htmlspecialchars($data['nama']);
        $query = "INSERT INTO kategori
                    VALUES
                    (NULL, :nama)";
        $this->db->Query($query);
        $this->db->Bind(":nama", $nama);
        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }

    public function hapus($id){
        $query = "DELETE FROM buku WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    // Hapus Kategori
    public function hapusKategori($id){
        $query = "DELETE FROM kategori WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();


        return $this->db->rowCount();
    }


    

    // Update data buku
    public function ubah($data, $newFotoFileName = null){ // Ubah nama parameter dan nilai default
        $query = "UPDATE buku SET
                    nama = :nama,
                    harga =  :harga,
                    stok =  :stok,
                    penulis =  :penulis,
                    id_kategori =  :id_kategori";
        
        if ($newFotoFileName !== null){ 
            $query .= ", foto = :foto";
        }

        $query .= " WHERE id = :id"; 

        $this->db->Query($query);

        // Bind parameter
        $this->db->Bind(":nama", $data['nama']);
        $this->db->Bind(":harga", $data['harga']);
        $this->db->Bind(":stok", $data['stok']);
        $this->db->Bind(":penulis", $data['penulis']);
        $this->db->Bind(":id_kategori", $data['id_kategori']);
        $this->db->Bind(":id", $data['id']);     
        
        // Bind foto hanya jika ada foto baru
        if ($newFotoFileName !== null){
            $this->db->Bind(':foto', $newFotoFileName);
        }
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    
    // Ambil buku tapi dari id untuk update
    public function ambilBukuDariId($id) {
        $this->db->Query("SELECT * FROM buku WHERE id = :id");
        $this->db->Bind(':id', $id);
        return $this->db->single(); 
    }


    // Ambil foto buku dari id
    public function ambilFotoBukuDariId($id) {
        $this->db->Query("SELECT foto FROM buku WHERE id = :id");
        $this->db->Bind(':id', $id);
        $result = $this->db->single(); 
        
        // Pastikan $result bukan false dan memiliki kunci 'foto'
        return ($result && isset($result['foto'])) ? $result['foto'] : null; 
    }


}
?>