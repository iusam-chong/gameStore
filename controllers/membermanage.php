<?php

class MemberManage extends Controller
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
                $this->page();
            }
        }
    }

    private function loadPage($members, $pagination, $currentPage)
    {
        $this->view->smarty->assign('title', 'Somy系統 - 會員管理');

        $this->smartyAssignUser();
        $this->smartyAssignProducts($members, $pagination, $currentPage);

        $this->view->renderAdmin('membermanage');
    }

    private function smartyAssignUser()
    {
        $user = $this->model->getUserData();  

        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('memberAuth', $user['member']);
    }

    private function smartyAssignProducts($members, $pagination, $currentPage)
    {
        $smarty = $this->view->smarty;

        $smarty->assign('members', $members);
        $smarty->assign('pagination', $pagination);
        $smarty->assign('currentPage', $currentPage);
    }

    public function page($page = 1)
    {
        # change this variable value will be change display product amount
        $itemPerPage = 5;

        $page = $this->checkPage($page);
        $offset = ($page - 1) * $itemPerPage;

        $currentPage = $page;
        $members = $this->model->showAllMember($itemPerPage, $offset);
        if (!$members) {
            $members = $this->model->showAllMember($itemPerPage, 0);
            $currentPage = 1;
        }

        $countMembers = $this->model->countMember();
        $pagination = ceil($countMembers / $itemPerPage);

        $this->loadPage($members, $pagination, $currentPage);

        return true;
    }

    public function modifyStatus()
    {
        try {
            $this->checkRequest();
            $this->checkPostElement();
            $this->checkPostStatus();
            $this->checkUserExist();
            $this->currentEmployeeAuth();

            $this->setUserStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $result = ($_POST['status']) ? 0 : 1; 
        $message = 'Set user status success.';

        Json::ajaxReturn(true, $message, $result);
        return true;
    }

    private function checkRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception('Request method not POST.');
        }
        return true;
    }

    private function checkPostElement()
    {
        if (!isset($_POST['userId'])) {
            throw new Exception('User id not found in POST request.');
        }

        if (!isset($_POST['status'])) {
            throw new Exception('Status not found in POST request.');
        }
        return true;
    }

    private function checkPostStatus()
    {
        if (!preg_match('/(^[0-1]{1}$)/', $_POST['status'])) {
            throw new Exception('User status value is been illegal modify.');
        }
        return true;
    }

    private function checkUserExist()
    {
        if (!$this->model->userExist($_POST['userId'])) {
            throw new Exception('User id not found, or is been illegal modify.');
        }
        return true;
    }

    private function setUserStatus()
    {
        if (!$this->model->setStatus($_POST['userId'], $_POST['status'])) {
            throw new Exception('Set user status fail.');
        }
        return true;
    }

    private function currentEmployeeAuth()
    {
        $currentAuth = $this->model->getUserData();

        if (!$currentAuth['enabled']) {
            throw new Exception('Your admin auth is disabled or logged out, you are not allow to action in any page.');
        }
        if (!$currentAuth['member']) {
            throw new Exception('Your member auth is disabled, you have no permits in this page.');
        }
        return true;
    }
}