<?php

class Login extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (parent::loginStatus()) {
                parent::noPermitExist();
            }
            $this->smartyAssign();
            $this->view->render('login');
        }
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 會員登入');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('userName', 'Guest');
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

        $response['message'] = 'login success';

        $response['status'] = 1;
        echo json_encode($response);

        return true;
    }
}
