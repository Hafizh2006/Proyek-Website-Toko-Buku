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

    // private function uploadFoto($files)
    // {
    //     $namaFile = $files['foto']['name'];
    //     $tmpName = $files['foto']['tmp_name'];
    //     $error = $files['foto']['error'];

    //     if ($error === 4) { // 4 berarti tidak ada file yang diupload
    //         Flash::setFlash('Peringatan', 'pilih gambar', 'terlebih dahulu', 'warning');
    //         return false;
    //     }

    //     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    //     $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
    //     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    //         Flash::setFlash('Peringatan', 'yang anda upload', 'bukan gambar', 'warning');
    //         return false;
    //     }

    //     $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    //     $pathTujuan = $_SERVER['DOCUMENT_ROOT'] . '/Proyek-Website-Toko-Buku/public/img/books/' . $namaFileBaru;

    //     if (move_uploaded_file($tmpName, $pathTujuan)) {
    //         return $namaFileBaru;
    //     }
    //     return false;
    // }



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