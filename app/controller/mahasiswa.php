<?php


class Mahasiswa extends Controller{

    public function index() {
        $data['judul'] = "Mahasiswa";
        $data['mhs'] = $this->model("mahasiswa_model")->getAllMhs();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");   
    }

    public function detail($id) {
        $data['judul'] = "Detail Mahasiswa";
        $data['mhs'] = $this->model("mahasiswa_model")->getAllMhsbyId($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");   
    }


    public function tambah() { 
        if ( $this->model("mahasiswa_model")->tambahMhs($_POST) > 0) {
            Flash::setFlash("Berhasil", "Data berhasil ditambahkan", "success");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        } else {
            Flash::setFlash("Tidak berhasil", "Data tidak berhasil ditambahkan", "danger");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        }

    }

    public function hapus($id) { 
        if ( $this->model("mahasiswa_model")->hapusMhs($id) > 0) {
            Flash::setFlash("Berhasil", "Data berhasil dihapus", "success");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        } else {
            Flash::setFlash("Tidak berhasil", "Data tidak berhasil dihapus", "danger");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        }

    }

    public function getUbah(){
     echo json_encode($this->model("mahasiswa_model")->getAllMhsbyId($_POST['id']));
    }
    public function ubah()
    {
        if ( $this->model("mahasiswa_model")->ubahMhs($_POST) > 0) {
            Flash::setFlash("Berhasil", "Data berhasil diubah", "success");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        } else {
            Flash::setFlash("Tidak berhasil", "Data tidak berhasil diubah", "danger");
            header("Location:". BASE_URL. "/mahasiswa");
            exit;
        }


    }
}