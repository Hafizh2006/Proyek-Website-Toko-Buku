<?php 

class about extends Controller {

    public function index($name = "Ardyan", $dream = "Rich") {
        $data['name'] = $name;
        $data['dream'] = $dream;
        $data['judul'] = "About Me";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page() {
        $data['judul'] = "Page";
        $this->view('templates/header', $data);
        $this->view( "about/page");
        $this->view('templates/footer');
    }
}

?>