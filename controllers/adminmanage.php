<?php

class AdminManage extends Controller
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

            // $this->view->renderAdmin($contrName);
        }
    }

    private function loadPage($admins, $pagination, $currentPage)
    {
        $user = $this->model->getUserData();  

        $smarty = $this->view->smarty;
        $smarty->assign('title', 'Somy系統 - 後台帳號管理');

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userId', $user['id']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('employeeAuth', $user['employee']);

        $smarty->assign('admins', $admins);
        $smarty->assign('pagination', $pagination);
        $smarty->assign('currentPage', $currentPage);
        
        $this->view->renderAdmin('adminmanage');
    }

    public function page($page = 1)
    {
        # change this variable value will be change display product amount
        $itemPerPage = 5;

        $page = $this->checkPage($page);
        $offset = ($page - 1) * $itemPerPage;

        $currentPage = $page;
        $admins = $this->model->showAllAdmin($itemPerPage, $offset);
        if (!$admins) {
            $admins = $this->model->showAllAdmin($itemPerPage, 0);
            $currentPage = 1;
        }

        $countAdmins = $this->model->countAdmin();
        $pagination = ceil($countAdmins / $itemPerPage);

        $this->loadPage($admins, $pagination, $currentPage);

        return true;
    }

    public function newAdmin()
    {
        try {
            $this->checkRequest();
            $this->checkRegisterElement();
            $this->checkRegisterDataNotNull();
            $this->comparePassword();
            $this->checkUserNameExist();

            $this->currentEmployeeAuth();
            $this->createAdmin();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Create new admin success.';
        Json::ajaxReturn(true, $message);
        return true;
    }

    public function editEnabledStatus()
    {
        try {
            $this->checkRequest();
            $this->checkUserIdElement();
            $this->checkEnabledElement();

            $this->currentEmployeeAuth();
            $this->antiSuicide();
            $this->modifyEnabledStatus();
            $this->checkEnableStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = [
            'enabled' => 'Enabled status success.',
            'disabled' => 'Disabled status success, set all status to be false.'
        ];

        return $this->returnAjax($_POST['enabledStatus'], $message);
    }

    public function editProductStatus()
    {
        try {
            $this->checkRequest();
            $this->checkUserIdElement();
            $this->checkProductElement();

            $this->currentEmployeeAuth();
            $this->modifyProductStatus();
            $this->setEnabledStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = [
            'enabled' => 'Enabled product status success. set status to enabled.',
            'disabled' => 'Disabled product status success.'
        ];

        return $this->returnAjax($_POST['productStatus'], $message);
    }

    public function editMemberStatus()
    {
        try {
            $this->checkRequest();
            $this->checkUserIdElement();
            $this->checkMemberElement();

            $this->currentEmployeeAuth();
            $this->modifyMemberStatus();
            $this->setEnabledStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = [
            'enabled' => 'Enabled member status success. set status to enabled.',
            'disabled' => 'Disabled member status success.'
        ];

        return $this->returnAjax($_POST['memberStatus'], $message);
    }

    public function editEmployeeStatus()
    {
        try {
            $this->checkRequest();
            $this->checkUserIdElement();
            $this->checkEmployeeElement();

            $this->currentEmployeeAuth();
            $this->antiSuicide();
            $this->modifyEmployeeStatus();
            $this->setEnabledStatus();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = [
            'enabled' => 'Enabled employee status success. set status to enabled.',
            'disabled' => 'Disabled employee status success.'
        ];

        return $this->returnAjax($_POST['employeeStatus'], $message);
    }

    private function returnAjax($status, $messageArr)
    {
        # We do this because if above action is done, the value of status should be reverse
        # So after we reverse and get a new value can easy to know current status 
        $status = ($status) ? 0 : 1;

        if ($status === 1) {
            $result = true;
            $message = $messageArr['enabled'];
        } else {
            $result = false;
            $message = $messageArr['disabled'];
        }

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

    private function checkUserIdElement()
    {
        if (!isset($_POST['userId'])) {
            throw new Exception('User Id not found in POST request.');
        }
        return true;
    }

    private function checkEnabledElement()
    {
        if (!isset($_POST['enabledStatus'])) {
            throw new Exception('Enabled status not found in POST request.');
        }
        return $this->checkStatusIllegalModify($_POST['enabledStatus']);
    }

    private function checkProductElement()
    {
        if (!isset($_POST['productStatus'])) {
            throw new Exception('Enabled status not found in POST request.');
        }
        return $this->checkStatusIllegalModify($_POST['productStatus']);
    }

    private function checkMemberElement()
    {
        if (!isset($_POST['memberStatus'])) {
            throw new Exception('Enabled status not found in POST request.');
        }
        return $this->checkStatusIllegalModify($_POST['memberStatus']);
    }
    
    private function checkEmployeeElement()
    {
        if (!isset($_POST['employeeStatus'])) {
            throw new Exception('Enabled status not found in POST request.');
        }
        return $this->checkStatusIllegalModify($_POST['employeeStatus']);
    }

    private function checkRegisterElement()
    {
        if (!isset($_POST['userName'])) {
            throw new Exception('User name not found in POST request.');
        }

        if (!isset($_POST['password'])) {
            throw new Exception('Password not found in POST request.');
        }

        if (!isset($_POST['passwordComfrim'])) {
            throw new Exception('Password comfrim not found in POST request.');
        }
        return true;
    }

    private function checkRegisterDataNotNull()
    {
        if (!(strlen(trim($_POST['userName'])) > 0)) {
            throw new Exception('userName only have space or is null.');
        }

        if (!(strlen(trim($_POST['password'])) > 0)) {
            throw new Exception('password only have space or is null.');
        }
        return true;
    }

    private function comparePassword()
    {
        if ($_POST['password'] !== $_POST['passwordComfrim']) {
            throw new Exception('passwordConfirm not same with password.');
        }
        return true;
    }

    private function checkUserNameExist()
    {
        if ($this->model->checkUserExist($_POST['userName'])) {
            throw new Exception('User name already exist.');
        }
        return true;
    }
    
    private function checkStatusIllegalModify($status)
    {
        if (!preg_match('/(^[0-1]{1}$)/', $status)) {
            throw new Exception('User status value is been illegal modify.');
        }
        return true;
    }

    private function currentEmployeeAuth()
    {
        $currentAuth = $this->model->getCurrentAuth();

        if (!$currentAuth) {
            throw new Exception('Your admin auth is disabled or logged out, you are not allow to action in any page.');
        }
        if (!$currentAuth['employee']) {
            throw new Exception('Your employee manage auth is disabled, you have no permits in this page.');
        }
        return true;
    }

    private function createAdmin()
    {
        $data = (object) [
            'userName' => $_POST['userName'],
            'userPasswd' => $_POST['password'],
        ];

        if (!$this->model->createAdmin($data)) {
            throw new Exception('Create admin failed.');
        }

        if (!$this->model->defaultAuth()) {
            throw new Exception('Set default auth failed.');
        }
        return true;
    }

    private function modifyEnabledStatus()
    {
        if (!$this->model->modifyEnabledStatus($_POST['userId'], $_POST['enabledStatus'])) {
            throw new Exception('Set enabled status failed.');
        }
        return true;
    }

    private function checkEnableStatus()
    {
        $status = ($_POST['enabledStatus']) ? 0 : 1;

        if ($status === 0 ) {
            if (!$this->model->setAllStatusDisable($_POST['userId'])) {
                throw new Exception('Set all status to disabled failed.');
            }
        } 
        return true;
    }

    private function setEnabledStatus()
    {
        if (!$this->model->setEnabledStatus($_POST['userId'])) {
            throw new Exception('Set enabled status failed.');
        }
        return true;
    }

    private function modifyProductStatus()
    {
        if (!$this->model->modifyProductStatus($_POST['userId'], $_POST['productStatus'])) {
            throw new Exception('Set product status failed.');
        }
        return true;
    }

    private function modifyMemberStatus()
    {
        if (!$this->model->modifyMemberStatus($_POST['userId'], $_POST['memberStatus'])) {
            throw new Exception('Set member status failed.');
        }
        return true;
    }

    private function modifyEmployeeStatus()
    {
        if (!$this->model->modifyEmployeeStatus($_POST['userId'], $_POST['employeeStatus'])) {
            throw new Exception('Set employee status failed.');
        }
        return true;
    }

    private function antiSuicide()
    {
        $user = $this->model->getUserData();

        if (!strcmp($user['id'], $_POST['userId'])) {
            throw new Exception('You cannot modify your enabled status & employee status, this is illegal action.');
        }
        return true;
    }
}