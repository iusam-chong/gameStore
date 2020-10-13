<?php

class Statement extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            if (!$this->issetPage()) {
                $this->page();
            }
        }
    }

    private function loadPage($order, $orderDetails, $pagination, $currentPage)
    {
        $this->view->smarty->assign('title', 'Somy - 交易紀錄');

        $this->smartyAssignUser();
        $this->smartyAssignOrder($order, $orderDetails, $pagination, $currentPage);

        $this->view->render('statement');
    }

    private function smartyAssignUser()
    {
        $user = $this->model->getUserData();
        
        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
    }

    private function smartyAssignOrder($order, $orderDetails, $pagination, $currentPage)
    {
        $smarty = $this->view->smarty;

        $smarty->assign('order', $order);
        $smarty->assign('orderDetails', $orderDetails);
        $smarty->assign('pagination', $pagination);
        $smarty->assign('currentPage', $currentPage);
    }

    public function page($page = 1)
    {
        # change this variable value will be change display product amount
        $itemPerPage = 2;

        $page = $this->checkPage($page);
        $offset = ($page - 1) * $itemPerPage;

        $currentPage = $page;
        $order = $this->model->getOrder($itemPerPage, $offset);
        if (!$order) {
            $order = $this->model->getOrder($itemPerPage, 0);
            $currentPage = 1;
        }

        $orderDetails = $this->model->OrderDetails($order);

        $countOrder = $this->model->countOrder();
        $pagination = ceil($countOrder / $itemPerPage);

        $this->loadPage($order, $orderDetails, $pagination, $currentPage);

        return true;
    }

    private function checkPage($page)
    {
        if (!preg_match('/(^\d+$)/', $page)) {
            return 1;
        }
        return ($page < 1) ? 1 : $page;
    }
    
    private function issetPage()
    {
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);

        return (isset($url[1])) ? true : false;
    }

}