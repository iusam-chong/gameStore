<?php

class logout extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }
        }
    }

    public function destroyCookie()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (Cookie::destroy()) {
            $response['status'] = "1";
            echo json_encode($response);
            exit();
        }
    }
}