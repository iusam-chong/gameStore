<?php

class Controller
{
    public $cookieStatus;

    public function __construct($modelName)
    {
        $this->cookieStatus = Cookie::renew();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view = new View();
        }
        $this->loadModel($modelName);
    }

    public function loadModel($name)
    {
        $file = 'models/' . $name . 'Model.php';

        if (file_exists($file)) {
            require $file;
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        } else {
            echo "(for develop only) Model not create.";
        }
    }

    public function loginStatus()
    {
        return $this->cookieStatus;
    }

    public function noPermitExist()
    {
        header('location: http://localhost:8888/gameStore/index');
        exit();
    }

    protected function checkPage($page)
    {
        if (!preg_match('/(^\d+$)/', $page)) {
            return 1;
        }

        return ($page < 1) ? 1 : $page;
    }
    
    protected function issetPage()
    {
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);

        return (isset($url[1])) ? true : false;
    }
}
