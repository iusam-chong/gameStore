<?php

class Cart extends Controller
{
    public function __construct($contrName)
    {
        parent::__construct($contrName);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!parent::loginStatus()) {
                parent::noPermitExist();
            }

            $user = $this->model->getUserData();

            $this->smartyAssign($user);
            $this->view->render('cart');
        }
    }

    private function smartyAssign($user)
    {
        $carts = $this->model->getUserCart();
        $cartTotal = $this->getCartTotal($carts);

        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 購物車');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('carts', $carts);
        $smarty->assign('total', $cartTotal);
    }

    public function addCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!isset($_POST['productId'])) {
            return false;
        }

        if (!parent::loginStatus()) {
            $response['status'] = 3;
            echo json_encode($response);
            return true;
        }

        $productId = $_POST['productId'];

        if (!$this->model->productExist($productId)) {
            return false;
        }

        # important! this method if match data from db should return true 
        # and tell js users already add this item into the cart
        if ($this->model->productInCart($productId)) {
            $response['status'] = 2;
            echo json_encode($response);
            return true;
        }

        if (!$this->model->addCart($productId)) {
            return false;
        }
        
        $response['status'] = 1;
        echo json_encode($response);
        return true;
    }

    public function editQuantity()
    {
        try {
            $this->checkRequest();
            $this->checkProductElement();

            # should check quantiy format, another condition

            $this->modifyCartQuantity();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $result = [
            'productId' => $_POST['productId'],
            'quantity' => $_POST['quantity']
        ];

        $message = 'edit product quantity in cart success.';
        Json::ajaxReturn(true, $message, $result);
        return true;
    }

    public function getCartTotal($cart)
    {
        $total = 0 ;
        foreach($cart as $product) {
            $total += ($product['price']*$product['quantity']);
        }

        return $total;
    }

    public function deleteFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!isset($_POST['productId'])) {
            return false;
        }

        if (!parent::loginStatus()) {
            $response['status'] = 3;
            echo json_encode($response);
            return true;
        }

        $productId = $_POST['productId'];

        if (!$this->model->productExist($productId)) {
            return false;
        }

        if (!$this->model->productInCart($productId)) {
            $response['status'] = 2;
            echo json_encode($response);
            return true;
        }

        if (!$this->model->deleteFromCart($productId)) {
            return false;
        }

        $response['status'] = 1;
        echo json_encode($response);
        return true;
    }

    public function bill()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }

        if (!parent::loginStatus()) {
            $response['status'] = 3;
            echo json_encode($response);
            return true;
        }

        if (!$this->model->bill()) {
            return false;
        }

        $response['status'] = 1;
        echo json_encode($response);
        return true;
    }

    private function checkRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exception('Request method not POST.');
        }
        return true;
    }

    private function checkProductElement()
    {
        if (!isset($_POST['productId'])) {
            throw new Exception('User Id not found in POST request.');
        }
        return true;
    }

    private function modifyCartQuantity()
    {
        if (!$this->model->modifyCartQuantity($_POST['productId'], $_POST['quantity'])) {
            throw new Exception('Modify product quantity in cart unsuccess.');
        }
        return true;
    }
}
