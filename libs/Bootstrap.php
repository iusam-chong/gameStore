<?php

class Bootstrap
{
    public function __construct()
    {

        $url = (isset($_GET['url'])) ? $_GET['url'] : null ;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // print_r($url);
        // echo "<br>";

        $url = $this->requireContr($url); 
        
        $this->runContrMethod($url);
    }

    public function requireContr($url)
    {
        $file = 'controllers/' . $url[0] . '.php';

        if (file_exists($file)) {
            //echo 'require '.$file.'<br />';
            require_once($file);
        } else {
            //echo 'require index';
            require_once('controllers/index.php');
            unset($url);
            $url = array('index');
        }

        return $url;
    }

    public function runContrMethod($url)
    {
        //print_r($url); die();

        $controller = new $url[0];

        //die();

        $controller->loadModel($url[0]);

        if (isset($url[1])) {
            if (!method_exists($controller, $url[1])) {
                echo '(for develop only) method not found in controller.';
                return false;
            }
            
            if (isset($url[2])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $controller->{$url[1]}();
            }
        }
    }
}
