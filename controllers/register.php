<?php

class Register extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (parent::loginStatus()) {
                parent::noPermitExist();
            }
            $this->smartyAssign();
            $this->view->render('register');
        }
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('userName', 'Guest');
    }

    public function signUp()
    {
        $response = array();

        # all return false will be set status,message and return to ajax later

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!isset($_POST['userName']) && !isset($_POST['password']) && !isset($_POST['passwordConfirm'])) {
            return false;
        }

        if (!(strlen(trim($_POST['userName'])) > 0)) {
            return false;
        }

        if (!(strlen(trim($_POST['password'])) > 0)) {
            return false;
        }

        if ($_POST['password'] !== $_POST['passwordConfirm']) {
            return false;
        }

        if ($this->model->getUser($_POST['userName'])) {
            return false;
        }

        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if (!($this->model->createUser($data))) {
            return false;
        }

        $response['status'] = 1;
        echo json_encode($response);
    }

    private function chkFormFormat()
    {

    }

}
