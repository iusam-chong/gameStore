<?php 

class Register extends Controller{

    function __construct()
    {
        parent::__construct();
       
        $this->smartyAssign();
        $this->view->render('register');
    }

    private function smartyAssign()
    {
        $smarty = $this->view->smarty;

        $smarty->assign('userName', 'Guest');
    }
}