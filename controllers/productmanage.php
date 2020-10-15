<?php

class ProductManage extends Controller
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

    private function loadPage($products, $pagination, $currentPage)
    {
        $this->view->smarty->assign('title', 'Somy系統 - 商品管理');

        $this->smartyAssignUser();
        $this->smartyAssignProducts($products, $pagination, $currentPage);

        $this->view->renderAdmin('productmanage');
    }

    private function smartyAssignUser()
    {
        $user = $this->model->getUserData();

        $smarty = $this->view->smarty;

        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('productAuth', $user['product']);
    }

    private function smartyAssignProducts($products, $pagination, $currentPage)
    {
        $smarty = $this->view->smarty;

        $smarty->assign('products', $products);
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
        $products = $this->model->getProducts($itemPerPage, $offset);
        if (!$products) {
            $products = $this->model->getProducts($itemPerPage, 0);
            $currentPage = 1;
        }

        $countProducts = $this->model->countProducts();
        $pagination = ceil($countProducts / $itemPerPage);

        $this->loadPage($products, $pagination, $currentPage);

        return true;
    }

    public function newProduct()
    {
        try {
            $this->checkRequest();
            $this->currentEmployeeAuth();
            $this->checkProdName();
            $this->checkProdPrice();
            $this->checkProdQuantity();
            $this->checkImg();

            $this->insertProduct();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        // $result = [
        //     "PostSize" => (int) $_SERVER['CONTENT_LENGTH'],
        //     "ImgSize" => $_FILES['productImg']['size'],
        // ];

        $message = 'Add product success, yahoo!';
        Json::ajaxReturn(true, $message);
        return true;
    }

    public function editProduct()
    {
        try {
            $this->checkRequest();
            $this->currentEmployeeAuth();
            $this->checkProdId();
            $this->checkProdName();
            $this->checkProdPrice();
            $this->checkProdQuantity();

            $this->modifyProduct();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Edit product success, yahoo!';
        Json::ajaxReturn(true, $message);
        return true;
    }

    public function deleteProduct()
    {
        try {
            $this->checkRequest();
            $this->currentEmployeeAuth();
            $this->checkProdId();

            $this->disableProduct();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Delete product success, yahoo!';
        Json::ajaxReturn(true, $message);
        return true;
    }

    private function checkImg()
    {
        if (!is_uploaded_file($_FILES['productImg']['tmp_name'])) {
            throw new Exception('No File detected');
        }

        $info = getimagesize($_FILES['productImg']['tmp_name']);
        if ($info === false) {
            throw new Exception('Unable to determine image type of uploaded file');
        }
        if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
            throw new Exception('Image type only can accept gif / jpeg / png');
        }
        if (($_FILES['productImg']['size']) > (1024 * 1024 * 5)) {
            throw new Exception('Image size cannot large than 5Mb');
        }
        return true;
    }

    private function checkRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception('Request method not POST.');
        }
        return true;
    }

    private function checkProdId()
    {
        if (!isset($_POST['productId'])) {
            throw new Exception('Product Id not found in POST request');
        }
        if (!$this->model->findProduct($_POST['productId'])) {
            throw new Exception('Product not found in shop');
        }
        return true;
    }

    private function checkProdName()
    {
        if (!isset($_POST['productName'])) {
            throw new Exception('Product name not found in POST request');
        }
        if (!(strlen(trim($_POST['productName'])) > 0)) {
            throw new Exception('Product name cannot only have space or null');
        }
        return true;
    }

    private function checkProdPrice()
    {
        if (!isset($_POST['productPrice'])) {
            throw new Exception('Product price not found in POST request');
        }
        if (!preg_match('/^[1-9][0-9]*$/', $_POST['productPrice'])) {
            throw new Exception('Product price only accept number');
        }
    }

    private function checkProdQuantity()
    {
        if (!isset($_POST['productQuantity'])) {
            throw new Exception('Product quantity not found in POST request');
        }
        if (!preg_match('/^[1-9][0-9]*$/', $_POST['productQuantity'])) {
            throw new Exception('Product quantity only accept number');
        }
    }

    private function currentEmployeeAuth()
    {
        $currentAuth = $this->model->getCurrentAuth();

        if (!$currentAuth) {
            throw new Exception('Your admin auth is disabled or logged out, you are not allow to action in any page.');
        }
        if (!$currentAuth['product']) {
            throw new Exception('Your employee manage auth is disabled, you have no permits in this page.');
        }
        return true;
    }

    private function getUploadImg()
    {
        $imgData = file_get_contents($_FILES['productImg']['tmp_name']);
        $imageProperties = $_FILES['productImg']['type'];

        return $imgData . $imageProperties;
    }

    private function insertProduct()
    {
        $img = $this->getUploadImg();

        $data = (object) [
            'name' => $_POST['productName'],
            'price' => $_POST['productPrice'],
            'quantity' => $_POST['productQuantity'],
            'description' => $_POST['productDescription'],
            'image' => $img,
        ];

        if (!$this->model->insertProduct($data)) {
            throw new Exception('New product unsuccess.');
        }
        return true;
    }

    private function modifyProduct()
    {
        $img = null;

        if (is_uploaded_file($_FILES['productImg']['tmp_name'])) {
            $this->checkImg();
            $img = $this->getUploadImg();
        }

        $data = (object) [
            'id' => $_POST['productId'],
            'name' => $_POST['productName'],
            'price' => $_POST['productPrice'],
            'quantity' => $_POST['productQuantity'],
            'description' => $_POST['productDescription'],
            'image' => $img,
        ];

        if (!$this->model->modifyProduct($data)) {
            throw new Exception('Edit product unsuccess.');
        }
        return true;
    }

    private function disableProduct()
    {
        if (!$this->model->disableProduct($_POST['productId'])) {
            throw new Exception('Delete product unsuccess.');
        }
        return true;
    }
}
