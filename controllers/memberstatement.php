<?php

class MemberStatement extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            $user = $this->model->getUserData();

            if ($user['enabled'] === 0) {
                Cookie::destroy();
                parent::noPermitExist();
            }
            if ($user['type'] !== 'admin' && $user['type'] !== 'superAdmin') {
                parent::noPermitExist();
            }
            if (!$this->issetPage()) {
                parent::noPermitExist();
            }
            if (!$this->checkMemberId()) {
                header('location: http://localhost:8888/gameStore/membermanage');
            }
        }
    }

    private function loadPage($order, $orderDetails, $pagination, $memberId, $currentPage)
    {
        $user = $this->model->getUserData();  

        $smarty = $this->view->smarty;
        $smarty->assign('title', 'Somy系統 - 查看會員明細');

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userId', $user['id']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('employeeAuth', $user['employee']);

        $member = $this->model->findMember($memberId);

        $smarty->assign('order', $order);
        $smarty->assign('orderDetails', $orderDetails);
        $smarty->assign('pagination', $pagination);
        $smarty->assign('member', $member);
        $smarty->assign('currentPage', $currentPage);
        
        $this->view->renderAdmin('memberstatement');
    }

    public function id($memberId)
    {
        $pagiPage = $this->issetPagiPage();
        
        # change this variable value will be change display product amount
        $itemPerPage = 5;

        $page = $this->checkPage($pagiPage);
        $offset = ($page - 1) * $itemPerPage;

        $currentPage = $page;
        $order = $this->model->getOrder($itemPerPage, $offset, $memberId);
        if (!$order) {
            $order = $this->model->getOrder($itemPerPage, 0, $memberId);
            $currentPage = 1;
        }

        $orderDetails = ($order) ? $this->model->OrderDetails($order) : null;

        $countOrder = $this->model->countOrder($memberId);
        $pagination = ceil($countOrder / $itemPerPage);

        $this->loadPage($order, $orderDetails, $pagination, $memberId, $currentPage);

        return true;
    }

    private function checkMemberId()
    {
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);

        if (!isset($url[2])) {
            return false;
        }
        if (!$this->model->findMember($url[2])) {
            return false;
        }
        return true;
    }

    private function issetPagiPage()
    {
        $url = rtrim($_GET['url'], '/');
        $url = explode('/', $url);

        return (isset($url[3])) ? $url[3] : 1;
    }

    protected function checkPagiPage($page)
    {
        if (!preg_match('/(^\d+$)/', $page)) {
            return 1;
        }
        return ($page < 1) ? 1 : $page;
    }

}