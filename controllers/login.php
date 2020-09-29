<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->smartyAssign();
            $this->view->render('login');
        }
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;
        $loginStatus = false;
        $userName = ($loginStatus) ? 'JohnWick' : 'Guest';

        $smarty->assign('loginStatus', $loginStatus);
        $smarty->assign('userName', $userName);
    }

    public function signIn()
    {
        $response = array();

        # all return false will be set status,message and return to ajax later 

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!(isset($_POST['userName']) && isset($_POST['password']))) {
            return false;
        }

        if (!(strlen(trim($_POST['userName'])) > 0)) {
            return false;
        }

        if (!(strlen(trim($_POST['password'])) > 0)) {
            return false;
        }

        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if (!$this->model->manualLogin($data)) {
            return false;
        }

        // test 
        
        $response['message'] = 'test';

        $response['status'] = 1;
        echo json_encode($response);
    }
}
