<?php 

class Login extends Controller{

    function __construct()
    {
        echo "controller create";
        parent::__construct();
       
        $this->smartyAssign();
        $this->view->render('login');
    }

    public function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('userName', 'Guest');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }
        echo "done";
    }
}