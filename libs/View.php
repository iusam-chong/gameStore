<?php

class View
{
    public function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function render($pageName)
    {
        $this->smarty->display('views/header.tpl');
        $this->smarty->display('views/navbar.tpl');
        $this->smarty->display('views/' . $pageName . '/page.tpl');
        $this->smarty->display('views/footer.tpl');
    }

    public function renderAdmin($pageName)
    {
        $this->smarty->display('views/header.tpl');
        $this->smarty->display('views/navbar.tpl');
        $this->smarty->display('views/adminbar.tpl');
        $this->smarty->display('views/' . $pageName . '/page.tpl');
        $this->smarty->display('views/footer.tpl');
    }
}
