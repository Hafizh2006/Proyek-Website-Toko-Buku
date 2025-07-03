<?php 

class Home extends Controller{

    public function  index() {
        // Membuat array yang akan dikirimkan ke view bentuknya assosiatif
        $data['pendidikan'] =  $this->model("buku_model")->ambilSemuaBukuDarIdkategori("1");
        $data['novel'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("4");
        $data['komik'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("3");
        $data['judul'] = "home";

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function login(){
        $data['judul'] = "home";

        // Seleksi apakah sudah mengirim post dari login ?
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST;
            
            //var_dump($data); die;

            // cek email dan password 
            $cekEmail = $this->model("user_model")->cekEmailname($data);
            $cekPassword = $this->model("user_model")->cekPassword($data);
            
            //var_dump($cekEmail);
            //var_dump($cekPassword); die;
            
            // Jika True keduanya maka lanjut
            if ($cekEmail === True && $cekPassword === True){
                // Cek ada tidak cookiesnya 
                if (isset($data['cookies'])){
                    // Kenapa $data['cookies'] === on karena itu berbentuk checkbox
                    if ($data['cookies'] === "on"){
                        setcookie('key', hash('sha256', $data['email_user']), time() + 60);
                    }
                }
                // Buat session untuk semua bahwa ini telah login
                $_SESSION['LoginUser'] = $this->model("user_model")->getUserbyEmail($data['email_user']);
                //var_dump($_SESSION['LoginUser']); die;
                header("Location:". BASE_URL. "/home");
                exit();   
            } else {
                header("Location:". BASE_URL. "/home");
                exit();
            }


        } else {
            header("Location:". BASE_URL. "/home");
            exit();
        }

    }

    public function signup(){
        // Membuat array yang akan dikirimkan ke view bentuknya assosiatif
        $data['judul'] = "home";
        $data['pendidikan'] =  $this->model("buku_model")->ambilSemuaBukuDarIdkategori("1");
        $data['novel'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("4");
        $data['komik'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("3");
        
        // Apakah ada data yang dikirim secara post
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $input = $_POST;
            // var_dump($input); die;
            
            
            $emailYangSudahAda = $this->model('user_model')->getEmailUser($input['email_user']);

            // Berapa panjang inputan password
            if (strlen($input['password_user']) < 8){
                echo "<script>alert('Password harus lebih dari 8 karakter')</script>";
                $this->view("templates/header", $data);
                $this->view("home/index", $data);
                $this->view("templates/header");
                exit();
            }
            //var_dump($emailYangSudahAda['email_user']); die;


            //  Seleksi email yang sama
            if ($emailYangSudahAda && isset($emailYangSudahAda['email_user']) && $input['email_user'] ===  $emailYangSudahAda['email_user']){
                echo "<script>alert('Email sudah ada dan tidak bisa digunakan untuk sign up')</script>";
                $this->view("templates/header", $data);
                $this->view("home/index", $data);
                $this->view("templates/header");
                exit();
            }
            
            // Berhasil menambahkan user yang sign in
            if ($this->model("user_model")->tambahUser($input) > 0){
                echo "<script>alert('Berhasil sign up')</script>";
                $this->view("templates/header", $data);
                $this->view("home/index", $data );
                $this->view("templates/header");
                exit();
            } else {

                // Tidak berhsil sign in
                echo "<script>alert('Gagal sign up')</script>";   
                $this->view("templates/header", $data);
                $this->view("home/index", $data );
                $this->view("templates/header");
                exit();
            }

        }
        $this->view("templates/header", $data);
        $this->view("home/index", $data );
        $this->view("templates/header");
        exit();    
    }

    

    public function updateUser(){
        $data['judul'] = "Update Profile";
        $data['user'] = $_SESSION['LoginUser'];
        
        //  PENANGANAN POST REQUEST (Memproses form edit)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataForm = $_POST; 
            //var_dump($dataForm); var_dump($_FILES['foto']); die;
            $idUser = $dataForm['id']; // ID buku dari hidden input form
            


            // Variabel bila ada
            $updatePassword = False;
            $PasswordBaru = Null;
            // Cek Password
            if (!empty($dataForm['password_old']) && !empty($dataForm['password_user']) && !empty($dataForm['confirm_password'])){
                // Cek panjang password
                if (strlen($dataForm['password_user']) < 8){
                    echo "<script>alert('Password harus lebih dari 8 karakter');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                if (strlen($dataForm['password_old']) < 8){
                    echo "<script>alert('Password harus lebih dari 8 karakter');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                if (strlen($dataForm['confirm_password']) < 8){
                    echo "<script>alert('Password harus lebih dari 8 karakter');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                // Cek apakah password tidak sama 
                if ($dataForm['password_user'] !== $dataForm['confirm_password']){
                    echo "<script>alert('Password  baru tidak sama');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                // Cek password lama
                if ($this->model("user_model")->cekPasswordLama($dataForm) === False){
                    echo "<script>alert('Password salah ');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                // Hanya akan dieksekusi ketika semua ini sudah seleksi terlewati
                $updatePassword = True;
                $PasswordBaru = $dataForm['password_user'];
                
            }
            

            // Validasi ID dari form POST juga
            // Redirect jika ID tidak valid
            if (!is_numeric($idUser)) {
                echo "<script>alert('id tidak ditemukan');</script>";
                $this->view("templates/header", $data);
                $this->view("home/ubahprofile", $data );
                $this->view("templates/header");
                exit();
            }

            //  Ambil data user saat ini dari database untuk mendapatkan nilai lama 
            $currentUserData = $this->model("user_model")->getUserbyId($idUser);

            if (!$currentUserData) {
                echo "<script>alert('Data tidak ditemukan');</script>";
                $this->view("templates/header", $data);
                $this->view("home/ubahprofile", $data );
                $this->view("templates/header");
                exit();
            }



            $oldFotoFileName = $currentUserData['foto']; 
            $newFotoFileName = null; 
            $fileDestination = null; 
            $uploadDir = "../public/backend/image/user/"; 
            
            // Buat direktori jika tidak ada
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            //  Seleksi Upload Foto Baru ada dan error oada foto  = 0 
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['foto'];

                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];

                $allowedExtensions = ['jpg', 'jpeg', 'png'];

                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if (!in_array($fileExt, $allowedExtensions)) {
                    echo "<script>alert('Format foto hanya mendukung JPG, JPEG, PNG');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                if ($fileSize > 5000000) { 
                    echo "<script>alert('Filemu terlalu besar kurang seharusnya kurang dari 5 Mb');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }

                $newFotoFileName = uniqid('', true) . '.' . $fileExt; 
                $fileDestination = $uploadDir . $newFotoFileName;
                
                if (!move_uploaded_file($fileTmpName, $fileDestination)) {
                    echo "<script>alert('File tidak ke upload');</script>";
                    $this->view("templates/header", $data);
                    $this->view("home/ubahprofile", $data );
                    $this->view("templates/header");
                    exit();
                }
            } else if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                echo "<script>alert('File error');</script>";
                $this->view("templates/header", $data);
                $this->view("home/ubahprofile", $data );
                $this->view("templates/header");
                exit();
            }
            
            $dataToModel = [
                'id'          => $idUser,
                'nama_user'   => !empty($dataForm['nama_user']) ? htmlspecialchars($dataForm['nama_user']) : $currentUserData['nama_user'],
                'password_user' => $PasswordBaru,
                'alamat_user'   => !empty($dataForm['alamat_user']) ? htmlspecialchars($dataForm['alamat_user']) : $currentUserData['alamat_user'],
                'no_user'     => !empty($dataForm['no_user']) ? htmlspecialchars($dataForm['no_user']) : $currentUserData['no_user'],
                'email_user'     => !empty($dataForm['email_user']) ? htmlspecialchars($dataForm['email_user']) : $currentUserData['email_user'],
                'passwordUpdate' => $updatePassword,
            ];

            
            if ($this->model("user_model")->ubahUser($dataToModel, $newFotoFileName) > 0){
                
                // Seleksi untuk menghilangkan foto lama di database
                if ($newFotoFileName && $oldFotoFileName && $oldFotoFileName !== 'default.jpg' && $oldFotoFileName !== $newFotoFileName && file_exists($uploadDir . $oldFotoFileName)) {
                    unlink($uploadDir . $oldFotoFileName); // Hapus foto lama
                }

                echo "<script>alert('Berhasil mengubah');</script>";
                $this->view("templates/header", $data);
                $this->view("home/ubahprofile", $data );
                $this->view("templates/header");
                exit();
            } else {
                echo "<script>alert('Tidak berhasil mengubah');</script>";
                if ($newFotoFileName && file_exists($fileDestination)) {
                    unlink($fileDestination);
                }
                $this->view("templates/header", $data);
                $this->view("home/ubahprofile", $data );
                $this->view("templates/header");
                exit();    
            }
        }
    }

    public function profile(){
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }

        $dataold = $_SESSION['LoginUser'];
        //var_dump($dataold); die;
        $databaru = $this->model("user_model")->getUserbyId($dataold['id']);
        //var_dump($databaru); die;
        $data['judul'] = "User";
        $data['user'] = $databaru;
        //var_dump($data['user']); die;
        $this->view("templates/header", $data);
        $this->view("home/profile", $data);
        $this->view("templates/footer");
        exit();
    
    }

    public function logout(){
        // sesi di hilangkan, diunset, di destroy, cookie dipercepat

        $_SESSION = [];
        session_unset();
        session_destroy();
        setcookie('key', '', time() - 60);
        header("Location:". BASE_URL);
        exit();
    }

    public function deleteUser($id){
        //var_dump($id); die;
        if ($this->model("user_model")->hapusUser($id) > 0){
            $_SESSION = [];
            session_unset();
            session_destroy();
            setcookie('key', '', time() - 60);
            header("Location:". BASE_URL);
            exit();  
        } else {
            header("Location:". BASE_URL);
            exit();
        }
    }

    public function HalamanUpdate(){
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }

        $dataold = $_SESSION['LoginUser'];
        //var_dump($dataold); die;
        $databaru = $this->model("user_model")->getUserbyId($dataold['id']);
        //var_dump($databaru); die;
        $data['judul'] = "User";
        $data['user'] = $databaru;
        //var_dump($data['user']); die;
        $this->view("templates/header", $data);
        $this->view("home/ubahprofile", $data);
        $this->view("templates/footer");
    }


    public function about(){
        $data['judul'] = "About";
        $this->view("templates/header", $data);
        $this->view("home/about");
        $this->view("templates/footer");
    }

    public function allCategory(){
        $data['judul'] = "Semua Kategori";
        $data['kategori'] = $this->model("user_model")->ambilSemuaBuku();
        $data['segmen'] = "Semua Buku";

        //var_dump($data['kategori']); die;
        $this->view("templates/header", $data);
        $this->view("home/catalog", $data);
        $this->view("templates/footer");
    }

    public function category($id){
        $data['judul'] = "Kategori";
        $data['kategori'] = $this->model("user_model")->ambilSemuaBukuDarIdkategori($id);
        $data['segmen'] = "";
        if (!empty($data['kategori'])){
            //var_dump($data['kategori'][0]['id_kategori']); die;
            if ($data['kategori'][0]['id_kategori'] === 1 || $data['kategori'][0]['id_kategori'] === '1'){
                $data['segmen'] = "Pendidikan";
            } else if ($data['kategori'][0]['id_kategori'] === 2 || $data['kategori'][0]['id_kategori'] === '2'){
                $data['segmen'] = "Romansa";
            } else if ($data['kategori'][0]['id_kategori'] === 3 || $data['kategori'][0]['id_kategori'] === '3'){
                $data['segmen'] = "Komik";
            } else if ($data['kategori'][0]['id_kategori']=== 4 || $data['kategori'][0]['id_kategori'] === '4'){
                $data['segmen'] = "Novel";
            }    
        }
        
        $this->view("templates/header", $data);
        $this->view("home/catalog", $data);
        $this->view("templates/footer"); 
    }

    public function product($id){
        $data['judul'] = "Product";
        $data['produk'] = $this->model("buku_model")->getAllBukuById($id);
        $this->view("templates/header", $data);
        $this->view("home/detailproduk", $data);
        $this->view("templates/footer");
            
    }

    public function lihatCart($id){
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }
        //var_dump($id); die;
        $data['judul'] = "Keranjang";
        $data['user'] = $_SESSION['LoginUser'];
        $data['judul'] = "Keranjang";
        $data['keranjang'] = $this->model("keranjang_model")->ambilSemuaKeranjang($id);
        
        $this->view("templates/header", $data);
        $this->view("home/cart", $data);
        $this->view("templates/footer");
    }

    public function tambahCart($id){
        if  (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $dataForm = $_POST;
            $id_user = $_SESSION['LoginUser']['id'];
            
            //var_dump($id_user); die;
            //var_dump($dataForm

            $id_buku = $id;
            $jumlah_tambahan = intval($dataForm['jumlah']);

            // Ambil harga satuan dari database buku untuk keamanan
            $buku = $this->model("buku_model")->getAllBukuById($id_buku);
            if (!$buku) {
                // Handle jika buku tidak ditemukan
                header("Location:". BASE_URL);
                exit();
            }
            $harga_satuan = $buku['harga'];

            // Cek apakah item sudah ada di keranjang user
            $itemKeranjang = $this->model("keranjang_model")->getKeranjangByBukuAndUser($id_buku, $id_user);

            if ($itemKeranjang) {
                // JIKA ITEM SUDAH ADA: Update jumlah dan harga
                $jumlah_baru = $itemKeranjang['jumlah'] + $jumlah_tambahan;
                $harga_total_baru = $harga_satuan * $jumlah_baru;

                $data_update = [
                    'id' => $itemKeranjang['id'],
                    'jumlah' => $jumlah_baru,
                    'harga' => $harga_total_baru
                ];
                $this->model("keranjang_model")->ubahDataKeranjang($data_update);

            } else {
                // JIKA ITEM BELUM ADA: Tambah item baru
                $harga_total = $harga_satuan * $jumlah_tambahan;
                $data_insert = [
                    'id_user' => $id_user,
                    'id_buku' => $id_buku,
                    'jumlah' => $jumlah_tambahan,
                    'harga' => $harga_total,
                    'nama_buku' => $dataForm['nama_buku'],
                    'foto_buku' => $dataForm['foto_buku']
                ];
                $this->model("keranjang_model")->tambahKeranjang($data_insert);
            }
            
            // Redirect ke halaman keranjang untuk melihat hasilnya
            header("Location:". BASE_URL . "/home/lihatCart/" . $id_user);
            exit();

        } else {
            header("Location:". BASE_URL);
            exit();
        }
    }

    public function hapusCart($id){
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }
    
        if ($this->model("keranjang_model")->hapusKeranjang($id) > 0){
            header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
            exit();
        } else {
            // Anda bisa menambahkan flash message di sini jika gagal
            header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
            exit();
        }
    }

    public function updateCart($id){
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $id_keranjang = $id;

            // Ambil jumlah baru dari array 'jumlah' menggunakan id keranjang sebagai key
            if (!isset($_POST['jumlah'][$id_keranjang])) {
                // Handle error jika data jumlah tidak ada, lalu redirect
                header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
                exit();
            }
            $jumlah_baru = $_POST['jumlah'][$id_keranjang];
    
            // Ambil item keranjang untuk mendapatkan id_buku
            $itemKeranjang = $this->model("keranjang_model")->getKeranjangById($id_keranjang);
            if (!$itemKeranjang) {
                // Item tidak ditemukan, redirect kembali
                header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
                exit();
            }
    
            // Ambil harga satuan buku dari tabel 'buku'
            $buku = $this->model("buku_model")->getAllBukuById($itemKeranjang['id_buku']);
            if (!$buku) {
                // Buku tidak ditemukan, redirect kembali
                header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
                exit();
            }
    
            // Hitung total harga baru
            $harga_satuan = $buku['harga'];
            $harga_total_baru = intval($harga_satuan) * intval($jumlah_baru);
    
            // Siapkan data untuk diupdate
            $data_update = [
                'id' => $id_keranjang,
                'jumlah' => $jumlah_baru,
                'harga' => $harga_total_baru
            ];
    
            // Update keranjang di database dan redirect
            $this->model("keranjang_model")->ubahDataKeranjang($data_update);
            header("Location:". BASE_URL . "/home/lihatCart/" . $_SESSION['LoginUser']['id']);
            exit();
            
        } else {
            header("Location:". BASE_URL);
            exit();
        }

    } 
    

    public function menuCheckout(){
        $data['judul'] = "Checkout";
        
        if (!isset($_SESSION['LoginUser'])){
            header("Location:". BASE_URL);
            exit();
        }
        $data['user'] = $_SESSION['LoginUser'];

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $dataForm = $_POST;
            
            // cek dan ada item yang dipilih
            if (!isset($dataForm['selected_items']) || empty($dataForm['selected_items'])) {
                //
                header("Location:". BASE_URL . "/home/lihatCart/" . $data['user']['id']);
                exit();
            }

            $selected_ids = $dataForm['selected_items'];
            $id_user = $data['user']['id'];

            // Ambil data item yang dipilih dari model
            $data['items_checkout'] = $this->model("keranjang_model")->getKeranjangByMultipleIds($selected_ids, $id_user);
            
            // Hitung ulang total di sisi server untuk keamanan
            $total_harga = 0;
            foreach ($data['items_checkout'] as $item) {
                $total_harga += $item['harga'];
            }
            $data['total_harga'] = $total_harga;

            // 4. Tampilkan halaman checkout dengan data yang relevan
            $this->view("templates/header", $data);
            $this->view("home/checkout", $data);
            $this->view("templates/footer");

        } else {
            // Jika halaman diakses langsung (GET), alihkan ke keranjang
            header("Location:". BASE_URL . "/home/lihatCart/" . $data['user']['id']);
            exit();
        }
    }

    public function checkout() {
        if (!isset($_SESSION['LoginUser'])){
            echo "<script>alert('Maaf Coba login dahulu')</script>";
            header("Location:". BASE_URL);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $dataForm = $_POST;
            //var_dump($dataForm); die;
            $id_user = $_SESSION['LoginUser']['id'];
            
            $tanggalDanJam = $dataForm['tanggal_sekarang'] . " pada jam " . $dataForm['jam_sekarang'];
            // 1. Validasi data yang masuk
            if (!isset($dataForm['id_buku']) || !isset($dataForm['jumlah']) || !isset($dataForm['cart_item_ids']) || empty($dataForm['id_buku'])) {
                Flash::setFlash("Gagal", "Tidak ada item yang diproses. Terjadi kesalahan.", "danger");
                header("Location:". BASE_URL . "/home/lihatCart/" . $id_user);
                exit();
            }

            // inisiasi variabel untuk update tabel keranjang setelah di checkout
            $ids_buku = $dataForm['id_buku'];
            $jumlah_dibeli = $dataForm['jumlah'];
            $ids_keranjang = $dataForm['cart_item_ids'];
            $nama_buku_array = $dataForm['nama_buku'];

            // Gabungkan nama buku menjadi satu string untuk disimpan di riwayat
            $semua_buku = implode(', ', $nama_buku_array);
            $kodeBarang = uniqid("-");


            // var_dump($semua_buku); 
            // var_dump($kodeBarang);
            // die;
            
            
            $dataPesanan = [
                'id_user'           => $id_user,
                'semua_buku'        => $semua_buku,
                'total'             => $dataForm['total'],
                'tanggal_diterima'  => $tanggalDanJam,
                'status'  => "Selesai",
                'kode_barang' => $kodeBarang,
                'metode_pembayaran' => $dataForm['payment']
            ];

            //var_dump($dataPesanan); die;
            
            // Update stok untuk setiap buku yang dibeli
            for ($i = 0; $i < count($ids_buku); $i++) {
                $this->model('buku_model')->updateStokBuku($ids_buku[$i], $jumlah_dibeli[$i]);
            }

            // Hapus item dari keranjang setelah checkout berhasil
            foreach ($ids_keranjang as $id_keranjang) {
                $this->model('keranjang_model')->hapusKeranjang($id_keranjang);
            }

            // Simpan riwayat pesanan ke database
            $this->model('riwayat_model')->tambahRiwayatPesanan($dataPesanan);
            Flash::setFlash("Berhasil", "Pesanan Anda telah berhasil dibuat dan akan segera diproses.", "success");
            header("Location:". BASE_URL . "/home/riwayat/" . $id_user);
            exit();
        } else {
            echo "<script>alert('Maaf sistem kami bermasalah coba lagi nanti')</script>";
            header("Location:". BASE_URL);
            exit();
        }

    }

    public function riwayat($id){
        $data['judul'] = "Riwayat Transaksi";
        // Logika untuk mengambil data riwayat dari model bisa ditambahkan di sini
        $data['riwayat'] = $this->model("riwayat_model")->ambilSemuaRiwayat($id);
        

        $this->view("templates/header", $data);
        $this->view("home/riwayat", $data);
        $this->view("templates/footer");
    }



}

?>