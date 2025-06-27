<?php 

class Home extends Controller{

    public function  index() {
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST;
            
            //var_dump($data); die;

            $cekEmail = $this->model("user_model")->cekEmailname($data);
            $cekPassword = $this->model("user_model")->cekPassword($data);
            
            //var_dump($cekEmail);
            //var_dump($cekPassword); die;
            
            if ($cekEmail === True && $cekPassword === True){
                // Cek ada tidak cookiesnya
                if (isset($data['cookies'])){
                    if ($data['cookies'] === "on"){
                        setcookie('key', hash('sha256', $data['email_user']), time() + 60);
                    }
                }

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
        $data['judul'] = "home";
        $data['pendidikan'] =  $this->model("buku_model")->ambilSemuaBukuDarIdkategori("1");
        $data['novel'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("4");
        $data['komik'] = $this->model("buku_model")->ambilSemuaBukuDarIdkategori("3");
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $input = $_POST;
            // var_dump($input); die;
            
            
            $emailYangSudahAda = $this->model('user_model')->getEmailUser($input['email_user']);

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

    public function profile(){
        $data['judul'] = "User";
        $data['user'] = $_SESSION['LoginUser'];
        //var_dump($data['user']); die;
        $this->view("templates/header", $data);
        $this->view("home/profile", $data);
        $this->view("templates/footer");
        exit();
    
    }

    public function logout(){
        $_SESSION = [];
        session_unset();
        session_destroy();
        setcookie('key', '', time() - 60);
        header("Location:". BASE_URL);
        exit();
    }

    public function updateUser(){
        
    }
}

?>