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

    # alot of condition need to check
    public function newProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        $response['img'] = $this->checkImg();

        # condition to check input value

        if ($response['img'] !== null) {
            $response['status'] = 2;
        } else {

            $imgData = file_get_contents($_FILES['productImg']['tmp_name']);
            $imageProperties = $_FILES['productImg']['type'];
            $img = $imgData . $imageProperties;

            $data = (object) [
                'name' => $_POST['productName'],
                'price' => $_POST['productPrice'],
                'quantity' => $_POST['productQuantity'],
                'description' => $_POST['productDescription'],
                'image' => $img,
            ];

            if (!$this->model->insertProduct($data)) {
                $response['status'] = 3;
            } else {
                $response['status'] = 1;
            }
        }
        echo json_encode($response);
        return true;
    }

    public function editProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!parent::loginStatus()) {

            $response['status'] = "no login";
            echo json_encode($response);
            exit();
        }
        
        // should got isset or some condition to check $_POST

        # check user input img exist
        if (!file_exists($_FILES['productImg']['tmp_name']) || !is_uploaded_file($_FILES['productImg']['tmp_name'])) {
            $response['img'] = null;

            $img = null;
        } else {
            $response['img'] = $this->checkImg();

            $imgData = file_get_contents($_FILES['productImg']['tmp_name']);
            $imageProperties = $_FILES['productImg']['type'];
            $img = $imgData . $imageProperties;
        }

        if ($response['img'] !== null) {
            $response['status'] = 2;
        } else {

            $data = (object) [
                'id' => $_POST['productId'],
                'name' => $_POST['productName'],
                'price' => $_POST['productPrice'],
                'quantity' => $_POST['productQuantity'],
                'description' => $_POST['productDescription'],
                'image' => $img,
            ];

            //print_r($data);

            if (!$this->model->modifyProduct($data)) {
                $response['status'] = 3;
            } else {
                $response['status'] = 1;
            }
        }
        echo json_encode($response);
        return true;
    }

    public function deleteProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!parent::loginStatus()) {

            $response['status'] = "no login";
            echo json_encode($response);
            exit();
        }

        // should got isset or some condition
        $id = $_POST['productId'];

        if (!$this->model->disableProduct($id)) {
            $response['status'] = 3;
        } else {
            $response['status'] = 1;
        }

        echo json_encode($response);
        return true;
    }

    private function checkImg()
    {
        if (!is_array($_FILES)) {
            return 'cant get Img';
        }

        if (!is_uploaded_file($_FILES['productImg']['tmp_name'])) {
            return 'cant get Img';
        }

        $info = getimagesize($_FILES['productImg']['tmp_name']);
        if ($info === false) {
            return 'unable to determine imega type of uploaded file';
        }

        if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
            return 'image type only can be gif/jpeg/png';
        }
    }
}
