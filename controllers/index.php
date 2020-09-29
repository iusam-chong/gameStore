<?php 

class Index extends Controller
{
    function __construct()
    {
        parent::__construct();

        echo (Cookie::renew()) ? 'renew' : 'false';
        //echo (isset($_COOKIE['auth'])) ? $_COOKIE['auth'] : 'get nothing'; 

        $this->smartyAssign();
        $this->view->render('index');
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $loginStatus = true;
        $userName = ($loginStatus) ? 'JohnWick' : 'Guest';

        $smarty->assign('loginStatus', $loginStatus);
        $smarty->assign('userName', $userName);
    }
}