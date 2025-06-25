<?php 



class App {
    protected $controller = "home";
    protected $methods = "index";
    protected $params = [];

    public function __construct()
    {
        
        $url = $this->parseURL();

        /// Controller
        if (isset($url[0])){
            
            if (file_exists("../app/controller/".  $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        

        
        require_once "../app/controller/" . $this->controller. '.php';
        $this->controller = new $this->controller;



        // Methods
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
