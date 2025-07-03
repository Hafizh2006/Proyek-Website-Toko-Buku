<?php 



class App {
    // Variabel yang hanya bisa diakses di dalam class ini
    protected $controller = "home";
    protected $methods = "index";
    protected $params = [];

    // fungsi yang dapat dieksekusi tanpa dipanggil secara langsung
    public function __construct()
    {
        
        $url = $this->parseURL();

        /// Controller bila ada indeks ke satu
        if (isset($url[0])){
            
            if (file_exists("../app/controller/".  $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        

        /// bila tidak maka ini yang akan di eksekusi
        require_once "../app/controller/" . $this->controller. '.php';
        $this->controller = new $this->controller;



        // Methods bila ada indeks ke 2
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->methods = $url[1];
                unset($url[1]);
            }
        }


        // Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }
        // var_dump($this->controller, $this->methods, $this->params); exit;

        // jalankan controller dan method dan kirimkan params bila ada
        call_user_func_array([$this->controller, $this->methods], $this->params);

    }
    
    // untul memecah url jika memiliki / dan jika ada / diakhir seperti home/admin/ slash diakhir akan hilang
    public function parseURL() {
        if (isset($_GET['url'])){
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }    
    }
};

?>
