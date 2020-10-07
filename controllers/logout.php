<?php

class logout extends Controller
{
    public function __construct($contrName)
    {
        //parent::__construct($contrName);

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
            $response['status'] = 1;
            echo json_encode($response);
            return true;
        }
    }

    public function checkLogout()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!isset($_COOKIE['auth'])) {
            $response['status'] = 1;
            echo json_encode($response);
        } else {
            $response['status'] = 2;
            echo json_encode($response);
        }
        return true;
    }

    public function loginStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $response['status'] = (isset($_COOKIE['auth'])) ? 1 : 2;
        echo json_encode($response);

        return true;
    }
}