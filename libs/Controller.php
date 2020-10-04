<?php

class Controller
{
    public $cookieStatus;

    public function __construct($modelName)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->cookieStatus = Cookie::renew();
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
        header('location: http://localhost/gameStore/index');
        exit();
    }
}
