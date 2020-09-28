<?php 

class Index extends Controller{

    function __construct()
    {
        parent::__construct();

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