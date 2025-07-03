<?php 


class Controller {
    
    // fungsi return view manual 
    public function view($view, $data = []) {

        require_once "../app/views/". $view . ".php";

    }

    // fungsi return model manual
    public function model($model) {
        require_once "../app/models/". $model . ".php";
        return new $model;        
    }
}


?>