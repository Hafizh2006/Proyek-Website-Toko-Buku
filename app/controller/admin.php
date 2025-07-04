<?php 

class admin extends Controller {
        
    public function  index() {

        // Redirect ketika tidak ada sesi login
        if (!isset($_SESSION['loginAdmin'])){
            $data['judul'] = "login";
            $this->view('templates_admin/header', $data);    
            $this->view("admin/login");
            $this->view('templates_admin/footer');
            exit();
        }

        $selectedTable = $data['optionTabel'] = "buku";

            // Panggil model untuk mendapatkan data
        $tableData = $this->model("admin_model")->ambilTabel($selectedTable);
        $data['kolom'] = ['id','Buku','Harga','Stok','penulis','kategori', 'foto', 'halaman', 'lebar', 'panjang', 'berat', 'sinopsis'];
        if ($tableData !== false) {      
            $data['judul'] = "Data Tabel " . ucfirst($selectedTable); 
            $data['tabelTerpilih'] = $selectedTable; 
            $processedTableData = [];
            
            foreach ($tableData as $row) {
                $processedRow = array_values($row); 
                $processedTableData[] = $processedRow;
            }
        }
                // var_dump($processedTableData); die;
        $data['hasilTabel'] = $processedTableData;
                // Hitung jumlah kolom 
                // $jumlah_baris_pertama = count($data['hasilTabel'][0]);
        $data['panjangKolom'] = !empty($data['hasilTabel'])? count($data['hasilTabel'][0]): 0;

        $data['hasilTabel'] = $this->model("admin_model")->ambilTabel($selectedTable);
        $data['judul'] = "admin";
        $this->view('templates_admin/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates_admin/footer');

    }


    public function login(){

        if (isset($_SESSION['loginAdmin'])){
            $selectedTable = $data['optionTabel'] = "buku";

            // Panggil model untuk mendapatkan data
            $tableData = $this->model("admin_model")->ambilTabel($selectedTable);
            $data['kolom'] = ['id','Buku','Harga','Stok','penulis','kategori', 'foto'];
            if ($tableData !== false) { // Cek apakah model berhasil mengembalikan data (bukan false)
                // Data berhasil diambil, siapkan untuk dikirim ke view
                $data['judul'] = "Data Tabel " . ucfirst($selectedTable); // Judul untuk view
                $data['tabelTerpilih'] = $selectedTable; // Nama tabel yang dipilih
                $processedTableData = [];
                foreach ($tableData as $row) {
                    $processedRow = array_values($row); // Ini akan mengkonversi array asosiatif menjadi numerik
                    $processedTableData[] = $processedRow;
                }
            }
                // var_dump($processedTableData); die;
            
                // Hitung jumlah kolom 
                // $jumlah_baris_pertama = count($data['hasilTabel'][0]);
            $data['hasilTabel'] = $processedTableData;
            $data['panjangKolom'] = !empty($data['hasilTabel'])? count($data['hasilTabel'][0]): 0;

            $data['judul'] = "login";
            $this->view('templates_admin/header', $data);    
            $this->view("admin/index", $data);
            $this->view('templates_admin/footer');
            exit();
        }
        


        $data['judul'] = "admin";
        $this->view('templates_admin/header', $data);
        $this->view('admin/login');
        $this->view('templates_admin/footer');
    } 

    public function cekLogin(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {                      
            
            if ($this->model("admin_model")->cekUsername($_POST) === True && $this->model("admin_model")->cekPassword($_POST) === True):
                Flash::setFlash("Berhasil", "Berhasil Login", "success");
                $_SESSION['loginAdmin'] = True;
                header("Location:". BASE_URL. "/admin");
                exit;
            else:
                Flash::setFlash("Berhasil", "Tidak Berhasil login", "danger");
                header("Location:". BASE_URL. "/admin/login");
                exit;
            endif;
        }
        
    }
    


    // public function sort(){
    //     if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['optionTabel'])) {
    //         $selectedTable = $data['optionTabel'] = $_GET['optionTabel'];

    //         // Panggil model untuk mendapatkan data
    //         $tableData = $this->model("admin_model")->ambilTabel($selectedTable);


    //         if ($selectedTable === "user"){
    //             $data['kolom'] = ['id','password','username','alamat','nomer','email', 'foto','role'];
    //         } else if ($selectedTable === "buku"){
    //             $data['kolom'] = ['id','Buku','Harga','Stok','penulis','kategori', 'foto'];
    //         } else if ($selectedTable === ""){
    //             $data['kolom'] = ['id','password','username','alamat','nomer','email', 'foto','role'];
    //         }

    //         if ($tableData !== false) { // Cek apakah model berhasil mengembalikan data (bukan false)
    //             // Data berhasil diambil, siapkan untuk dikirim ke view
    //             $data['judul'] = "Data Tabel " . ucfirst($selectedTable); // Judul untuk view
    //             $data['tabelTerpilih'] = $selectedTable; // Nama tabel yang dipilih
    //             $processedTableData = [];
    //             foreach ($tableData as $row) {
    //                 $processedRow = array_values($row); // Ini akan mengkonversi array asosiatif menjadi numerik
    //                 $processedTableData[] = $processedRow;
    //             }
    //             // var_dump($processedTableData); die;
    //             $data['hasilTabel'] = $processedTableData;
    //             // Hitung jumlah kolom 
    //             // $jumlah_baris_pertama = count($data['hasilTabel'][0]);
    //             $data['panjangKolom'] = !empty($data['hasilTabel'])? count($data['hasilTabel'][0]): 0;

    //             // Load view untuk menampilkan hasil tabel
    //             $this->view('templates_admin/header', $data);
    //             $this->view('admin/user', $data); // View ini akan menampilkan datanya
    //             $this->view('templates_admin/footer');
    //         } else {
    //             // Gagal mengambil data (misal, tabel tidak valid atau error DB)
    //             Flash::setFlash("Gagal", "Gagal mengambil data tabel " . $selectedTable, "danger");
    //             header("Location:". BASE_URL. "/admin"); // Redirect kembali ke dashboard admin
    //             exit;
    //         }

    //     } else {
    //         // Jika bukan GET request atau parameter tidak ada
    //         Flash::setFlash("Perhatian", "Permintaan tidak valid.", "warning");
    //         header("Location:". BASE_URL. "/admin"); // Redirect ke dashboard admin
    //         exit;
    //     }
    // }


    public function user(){
        if (!isset($_SESSION['loginAdmin'])){
            $data['judul'] = "login";
            $this->view('templates_admin/header', $data);    
            $this->view("admin/login");
            $this->view('templates_admin/footer');
            exit();
        }
        $selectedTable = $data['optionTabel'] = "user";

        // Panggil model untuk mendapatkan data
        $dataTable = $this->model("admin_model")->ambilTabel($selectedTable);

        $data['kolom'] = ['id','nama_user','alamat_user','no_user','email_user','foto', 'role'];
        if ($dataTable !== false) {      
            $data['judul'] = "Data Tabel " . ucfirst($selectedTable); 
            $data['tabelTerpilih'] = $selectedTable; 
            $processedTableData = [];
            
            foreach ($dataTable as $row) {
                $processedRow = array_values($row); 
                $processedTableData[] = $processedRow;
            }
        }

        // var_dump($processedTableData); die;
        $data['hasilTabel'] = $processedTableData;
        
        // Hitung jumlah kolom 
        // $jumlah_baris_pertama = count($data['hasilTabel'][0]);

        $data['panjangKolom'] = !empty($data['hasilTabel'])? count($data['hasilTabel'][0]): 0;

        $data['hasilTabel'] = $this->model("admin_model")->ambilTabel($selectedTable);


        $data['judul'] = "user";
        $this->view('templates_admin/header', $data);
        $this->view('admin/user', $data); // View ini akan menampilkan datanya
        $this->view('templates_admin/footer');
    }

   
   public function tambahBuku(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataForm = $_POST; 
            //var_dump($dataForm); var_dump($_FILES); die;
            // var_dump($_FILES['foto']); die;
            $fotoFileName = null; 
            $uploadDir = "../public/backend/image/buku/"; 

            // Pastikan direktori ada dan bisa ditulis
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['foto'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];

                $allowedExtensions = ['jpg', 'jpeg', 'png'];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // Validasi ekstensi
                if (!in_array($fileExt, $allowedExtensions)) {
                    Flash::setFlash("Gagal", "Jenis file tidak diizinkan. Hanya JPG, JPEG, PNG.", "danger");
                    header("Location:". BASE_URL. "/admin");
                    exit();
                }

                // Validasi ukuran (lebih dari 5MB)
                if ($fileSize > 5000000) {
                    Flash::setFlash("Gagal", "Ukuran file terlalu besar (maks 5MB).", "danger");
                    header("Location:". BASE_URL. "/admin");
                    exit();
                }

                // Buat nama file unik
                $fotoFileName = uniqid('', true) . '.' . $fileExt;
                $fileDestination = $uploadDir . $fotoFileName;
                
                // Pindahkan file
                if (!move_uploaded_file($fileTmpName, $fileDestination)) {
                    Flash::setFlash("Gagal", "Terjadi kesalahan saat mengunggah file.", "danger");
                    header("Location:". BASE_URL. "/admin");
                    exit();
                }
            } else if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                Flash::setFlash("Gagal", "Error upload file: Kode " . $_FILES['foto']['error'], "danger");
                header("Location:". BASE_URL. "/admin");
                exit();
            }

            $data = [
                'nama'        => $dataForm['nama'],
                'stok'        => $dataForm['stok'],
                'harga'       => $dataForm['harga'],
                'penulis'     => $dataForm['penulis'],
                'id_kategori' => $dataForm['id_kategori'],
                'foto'        => $fotoFileName,
                'halaman'        => $dataForm['halaman'],
                'lebar'        => $dataForm['lebar'],
                'panjang'        => $dataForm['panjang'],
                'berat'        => $dataForm['berat'],
                'sinopsis'        => $dataForm['sinopsis'],
            ];

            if ($this->model("admin_model")->tambahBuku($data) > 0){
                Flash::setFlash("Berhasil ", "Berhasil menambah data tabel buku", "success");
                header("Location:". BASE_URL. "/admin");
                exit;
            } else {
                Flash::setFlash("Gagal ", "Gagal menambah data tabel buku", "dager");
                header("Location:". BASE_URL. "/admin");
                exit;
            }
}
}

    public function tambahKategori(){
        //var_dump($_POST); die;
        if ($this->model("admin_model")->tambahKategori($_POST) > 0){
            Flash::setFlash("Berhasil ", "Berhasil menambah data tabel kategori ", "success");
            header("Location:". BASE_URL. "/admin");
            exit;
        } else {
            Flash::setFlash("Gagal ", "Gagal menambah data tabel kategori", "dager");
            header("Location:". BASE_URL. "/admin");
            exit;
        }
    }


    public function ubah($id){
        if (!isset($_SESSION['loginAdmin'])){
            $data['judul'] = "login";
            $this->view('templates_admin/header', $data);    
            $this->view("admin/login");
            $this->view('templates_admin/footer');
            exit();
        }
        $data['buku'] = $this->model("admin_model")->ambilBukuDariId($id); 
        $data['judul']  = 'Ubah Buku';

        $this->view('templates_admin/header', $data);
        $this->view('admin/ubah', $data);
        $this->view('templates_admin/footer');
    }


    
   public function ubahBuku($id = null) {  
        //  PENANGANAN POST REQUEST (Memproses form edit)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataForm = $_POST; 

            $idBuku = $dataForm['id']; // ID buku dari hidden input form

            // Validasi ID dari form POST juga
            if (!is_numeric($idBuku)) {
                Flash::setFlash("Gagal", "ID buku tidak valid dari form.", "danger");
                header("Location:". BASE_URL. "/admin"); // Redirect jika ID tidak valid
                exit();
            }

            //  Ambil data buku saat ini dari database untuk mendapatkan nilai lama 
            $currentBukuData = $this->model("admin_model")->ambilBukuDariId($idBuku);

            // var_dump($currentBukuData);
            // die;

            if (!$currentBukuData) {
                Flash::setFlash("Gagal", "Buku tidak ditemukan saat proses update.", "danger");
                header("Location:". BASE_URL. "/admin");
                exit();
            }

            $oldFotoFileName = $currentBukuData['foto']; 
            $newFotoFileName = null; 
            $fileDestination = null; 
            $uploadDir = "../public/backend/image/buku/"; 

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // --- Logika Upload Foto Baru ---
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['foto'];

                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];

                $allowedExtensions = ['jpg', 'jpeg', 'png'];

                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($fileExt, $allowedExtensions)) {
                    Flash::setFlash("Gagal", "Jenis file tidak diizinkan. Hanya JPG, JPEG, PNG.", "danger");
                    header("Location:". BASE_URL. "/admin/ubahBuku/".$idBuku); 
                    exit();
                }

                if ($fileSize > 5000000) { 
                    Flash::setFlash("Gagal", "Ukuran file terlalu besar (maks 5MB).", "danger");
                    header("Location:". BASE_URL. "/admin/ubahBuku/".$idBuku); 
                    exit();
                }

                $newFotoFileName = uniqid('', true) . '.' . $fileExt; 
                $fileDestination = $uploadDir . $newFotoFileName;
                
                if (!move_uploaded_file($fileTmpName, $fileDestination)) {
                    Flash::setFlash("Gagal", "Terjadi kesalahan saat mengunggah file.", "danger");
                    header("Location:". BASE_URL. "/admin/ubahBuku/".$idBuku); 
                    exit();
                }
            } else if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                Flash::setFlash("Gagal", "Error upload file: Kode " . $_FILES['foto']['error'], "danger");
                header("Location:". BASE_URL. "/admin/ubahBuku/".$idBuku); 
                exit();
            }
            
            $dataToModel = [
                'id'          => $idBuku,
                'nama'        => !empty($dataForm['nama']) ? htmlspecialchars($dataForm['nama']) : $currentBukuData['nama'],
                'stok'        => !empty($dataForm['stok']) ? htmlspecialchars($dataForm['stok']) : $currentBukuData['stok'],
                'harga'       => !empty($dataForm['harga']) ? htmlspecialchars($dataForm['harga']) : $currentBukuData['harga'],
                'penulis'     => !empty($dataForm['penulis']) ? htmlspecialchars($dataForm['penulis']) : $currentBukuData['penulis'],
                'id_kategori' => htmlspecialchars($dataForm['id_kategori']),
                'halaman'     => !empty($dataForm['halaman']) ? htmlspecialchars($dataForm['halaman']) : $currentBukuData['halaman'],
                'lebar'       => !empty($dataForm['lebar']) ? htmlspecialchars($dataForm['lebar']) : $currentBukuData['lebar'],
                'panjang'     => !empty($dataForm['panjang']) ? htmlspecialchars($dataForm['panjang']) : $currentBukuData['panjang'],
                'berat'       => !empty($dataForm['berat']) ? htmlspecialchars($dataForm['berat']) : $currentBukuData['berat'],
                'sinopsis'    => !empty($dataForm['sinopsis']) ? htmlspecialchars($dataForm['sinopsis']) : $currentBukuData['sinopsis'],
                'foto'        => $newFotoFileName,
            ];

            
            if ($this->model("admin_model")->ubah($dataToModel, $newFotoFileName) > 0){
                
                if ($newFotoFileName && $oldFotoFileName && $oldFotoFileName !== 'default.jpg' && $oldFotoFileName !== $newFotoFileName && file_exists($uploadDir . $oldFotoFileName)) {
                    unlink($uploadDir . $oldFotoFileName); // Hapus foto lama
                }

                Flash::setFlash("Berhasil ", "Berhasil mengubah data buku ", "success");
                header("Location:". BASE_URL. "/admin");
                exit();
            } else {
                Flash::setFlash("Gagal ", "Gagal mengubah data buku", "danger"); 
                if ($newFotoFileName && file_exists($fileDestination)) {
                    unlink($fileDestination);
                }
                header("Location:". BASE_URL. "/admin/ubahBuku/".$idBuku); 
                exit();    
            }
}
}


    public function hapus($id){
        if (!is_numeric($id)) {
            Flash::setFlash("Gagal", "ID buku tidak valid.", "danger");
            header("Location:". BASE_URL. "/admin");
            exit();
        }

        // 2. Ambil nama file foto lama sebelum menghapus dari database
        $fotoYangAkanDihapus = $this->model("admin_model")->ambilFotoBukuDariId($id);

        // 3. Hapus entri buku dari database
        if ($this->model("admin_model")->hapus($id) > 0) { 
            
            $uploadDir = "../public/backend/image/buku/";
            if ($fotoYangAkanDihapus !== 'default.jpg' && file_exists($uploadDir . $fotoYangAkanDihapus)) {
                // Coba hapus file
                if (unlink($uploadDir . $fotoYangAkanDihapus)) {

                    Flash::setFlash("Berhasil", "Buku dan foto berhasil dihapus!", "success");
                
                } else {

                    // Jika penghapusan file gagal (tapi DB berhasil), berikan pesan berbeda
                    Flash::setFlash("Berhasil", "Buku berhasil dihapus, tetapi foto gagal dihapus dari server (cek izin file).", "warning");
                }
            } else {

                // Jika tidak ada foto atau itu foto default, buku tetap dihapus tanpa mencoba menghapus file
                Flash::setFlash("Berhasil", "Buku berhasil dihapus!", "success");
            }
        } else {

            Flash::setFlash("Gagal", "Gagal menghapus buku (mungkin buku tidak ditemukan).", "danger");
        }

        header("Location:". BASE_URL. "/admin"); // Redirect kembali ke halaman daftar admin
        exit();
        }


    public function hapusKategori($id){
        if($this->model("admin_model")->hapusKategori($id) > 0){
            Flash::setFlash("Berhasil ", "Berhasil menghapus data tabel kategori ", "success");
            header("Location:". BASE_URL. "/admin");
            exit;
        } else {
            Flash::setFlash("Gagal ", "Gagal menghapus data tabel kategori", "dager");
            header("Location:". BASE_URL. "/admin");
            exit;    
        }
    }


    public function logout(){
        $data['judul'] = "Logout";
        $_SESSION[''] = '';
        session_destroy();
        $this->view("templates_admin/header", $data);
        $this->view("admin/login");
        $this->view("templates_admin/footer");
        exit;
    }   
}
?>