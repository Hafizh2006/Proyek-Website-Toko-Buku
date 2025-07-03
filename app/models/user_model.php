<?php 

class user_model 
{
    private $table = "user";
    private $db;


    public function __construct()
    {
        $this->db = new database;
    }

    // Mengambil data user
    public function getUser() {
        $this->db->Query("SELECT * FROM ". $this->table);
        return $this->db->resultSet();
    }

    // Mengambil data user berdasarkan email
    public function getEmailUser($email_user) {
        $email_user_modified = htmlspecialchars($email_user);
        $this->db->Query("SELECT email_user FROM ". $this->table ." WHERE email_user = :email_user");
        $this->db->Bind(':email_user', $email_user_modified);
        return $this->db->single();
    }

    // Mengambil data user berdasarkan email
    public function getUserbyEmail($email_user) {
        $email_user_modified = htmlspecialchars($email_user);
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE email_user = :email_user");
        $this->db->Bind(':email_user', $email_user_modified);
        return $this->db->single();
    }

    // Mengambil data user berdasarkan id
    public function getUserbyId($id) {
        $this->db->Query("SELECT * FROM ". $this->table. " WHERE id = :id");
        $this->db->Bind('id', $id);
        return $this->db->single();
    }

    // Chek nama email
    public function cekEmailname($data) {
        $email = htmlspecialchars($data['email_user']);
        $this->db->Query("SELECT email_user FROM ". $this->table . " WHERE email_user = :email_user");

        $this->db->Bind(':email_user', $email);
        $this->db->execute();

        $result_user = $this->db->single();
        
        if($result_user['email_user'] === $email):
            return True;
        else:
            return False;
        endif;
    }

    // cek password
    public function cekPassword($data) {
        
        if (!isset($data['email_user']) || !isset($data['password_user'])) {
            return false; 
        }

        // Mencegah  Sql injection
        $email = htmlspecialchars($data['email_user']);
        $password = htmlspecialchars($data['password_user']);

        // Mengkuerikan
        $this->db->Query("SELECT password_user, role FROM ". $this->table. " WHERE email_user = :email_user");
        $this->db->Bind(':email_user', $email);
        $this->db->execute();
        $result_user = $this->db->single();

        // Result user
        if (isset($result_user)):
            if ($result_user['role'] === 'user'):
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

    // Cek password lama lewat input update
    public function cekPasswordLama($data) {
        
        if (!isset($data['nama_user']) || !isset($data['password_user'])) {
            return false; 
        }

        // Mencegah  Sql injection
        $username = htmlspecialchars($data['nama_user']);
        $password = htmlspecialchars($data['password_old']);

        // Mengkuerikan
        $this->db->Query("SELECT password_user, role FROM ". $this->table. " WHERE nama_user = :nama_user");
        $this->db->Bind(':nama_user', $username);
        $this->db->execute();
        $result_user = $this->db->single();
        //var_dump($result_user); die;
        // Result user
        if (isset($result_user)):
            if ($result_user['role'] === 'user'):
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


    // Tambah user
    public function tambahUser($data) {
        $query = "INSERT INTO user
                    VALUES
                    (NULL , :password_user, :nama_user, :alamat_user, :no_user,  :email_user , :foto,  :role)";

        $nama_user = htmlspecialchars($data['nama_user']);
        $password_user =  htmlspecialchars($data['password_user']);
        $email_user =  htmlspecialchars($data['email_user']);
        $alamat = "default";
        $role = "user";
        $nomer_default = "1";            
        $this->db->Query($query);
        $this->db->Bind(":nama_user", $nama_user);
        $this->db->Bind(":password_user", password_hash($password_user, PASSWORD_DEFAULT));
        $this->db->Bind(":email_user", $email_user);
        $this->db->Bind(":alamat_user", $alamat);
        $this->db->Bind(":no_user", intval($nomer_default));
        $this->db->Bind(":role", $role);
        $this->db->execute();

        return $this->db->rowCount();
        return 0;
    }


    // Menghapus user berdasarkan id
    public function hapusUser($id){
        $query = "DELETE FROM user WHERE id = :id";
        $this->db->Query($query);
        $this->db->Bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // Mengubah user berdasarkan id
    public function ubahUser($data, $newFotoFileName = null){
        //var_dump($data); die;
        $nama_user = htmlspecialchars($data['nama_user']);
        
        // Jika ada inputan password baru
        if ($data['passwordUpdate'] === True){
            $password_user = htmlspecialchars($data['password_user']);
        }

        $email_user = htmlspecialchars($data['email_user']);
        $alamat_user = htmlspecialchars($data['alamat_user']);
        $no_user = htmlspecialchars($data['no_user']);
        

        $query = "UPDATE user SET
                    nama_user = :nama_user,
                    email_user = :email_user,
                    alamat_user = :alamat_user,
                    no_user = :no_user";
        
        // Kuerikan bila ada
        if ($data['passwordUpdate'] === True ){ 
            $query .= ", password_user = :password_user";
        }

        // Seleksi foto null atau ada isinya
        if ($newFotoFileName !== null){ 
            $query .= ", foto = :foto";
        }

        

        // Dipisah agar tidak langsung dikuerikan
        $query .= " WHERE id = :id"; 

        $this->db->Query($query);


        $this->db->Query($query);
        $this->db->Bind("nama_user", $nama_user);
        $this->db->Bind("email_user", $email_user);
        $this->db->Bind("alamat_user", $alamat_user);
        $this->db->Bind("no_user", $no_user);
        $this->db->Bind("id", $data['id']);

        // Bind password jika ada
        if ($data['passwordUpdate'] === True ){
            $this->db->Bind("password_user", password_hash($password_user, PASSWORD_DEFAULT));
        }
        // Bind foto hanya jika ada input foto 
        if ($newFotoFileName !== null){
            $this->db->Bind(':foto', $newFotoFileName);
        }


        $this->db->execute();

        return $this->db->rowCount();
        return 0;
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


    public function ambilSemuaBukuDarIdkategori($id){
        $this->db->Query("SELECT * FROM buku WHERE id_kategori = :id");
        $this->db->Bind(":id", $id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function ambilSemuaBuku(){
        $this->db->Query("SELECT * FROM buku");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function ambilBukuById($id){
        $this->db->Query("SELECT * FROM buku WHERE id = :id");
        $this->db->Bind(":id",  $id);
        $this->db->execute();
        return $this->db->single();
    }
}