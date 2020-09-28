<?php

class View {

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    public function render($name)
    {
        $this->smarty->display('views/header.tpl');
        $this->smarty->display('views/navbar.tpl');
        $this->smarty->display('views/' . $name . '/page.tpl');
        $this->smarty->display('views/footer.tpl');
    }
}