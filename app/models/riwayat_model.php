<?php

class riwayat_model {
    private $table = "riwayat_pesanan";
    private $db;

    public function __construct() {
        $this->db = new database;
    }

    // Tambahkan riwayat tekanan
    public function tambahRiwayatPesanan($data) {

        //var_dump($data); die;
        
        // Kueri tabel 'pesanan' memiliki kolom-kolom ini
        $query = "INSERT INTO " . $this->table . " (id_user, semua_buku,  total, tanggal_diterima, status, kode_barang, metode_pembayaran) 
                  VALUES (:id_user, :semua_buku,  :total, :tanggal_diterima, :status, :kode_barang, :metode_pembayaran)";
        
        // Kuerikan
        $this->db->Query($query);
        $this->db->Bind(':id_user', htmlspecialchars($data['id_user']));
        $this->db->Bind(':semua_buku', htmlspecialchars( $data['semua_buku']));
        $this->db->Bind(':total', intval($data['total']));
        $this->db->Bind(':status', $data['status']);
        $this->db->Bind(':tanggal_diterima', htmlspecialchars($data['tanggal_diterima']));
        $this->db->Bind(':kode_barang', htmlspecialchars($data['kode_barang']));
        $this->db->Bind(':metode_pembayaran', htmlspecialchars($data['metode_pembayaran']));

        // Eksekusi
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function ambilSemuaRiwayat($id){
        $query = "SELECT * FROM " . $this->table . " WHERE id_user = :id_user";
        $this->db->Query($query);
        $this->db->Bind(":id_user", htmlspecialchars(intval($id)));
        $this->db->execute();
        return $this->db->resultSet();
    }
}

?>

