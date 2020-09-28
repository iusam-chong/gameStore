<?php

class Controller {

    function __construct()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view = new View();
        }
    }

    public function loadModel($name)
    {
        $file = 'models/' . $name . 'Model.php';

        if (file_exists($file)) {
            require_once($file);
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        } else {
            echo "(for develop only) Model not create.";
        }
    }
}