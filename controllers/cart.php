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

        $smarty = $this->view->smarty;

        $smarty->assign('title', 'Somy - 購物車');
        $smarty->assign('loginStatus', parent::loginStatus());
        $smarty->assign('type', $user['type']);
        $smarty->assign('userName', $user['user_name']);
        $smarty->assign('carts', $carts);
    }

    public function addCart()
    {
        try {
            $this->checkRequest();
            $this->checkLoginStatus();
            $this->checkProductElement();
            $this->checkProductExist();
            $this->checkProductAlreadyInCart();

            $this->addToCart();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Item add to cart success.';
        Json::ajaxReturn(true, $message);
        return true;
    }

    public function editQuantity()
    {
        try {
            $this->checkRequest();
            $this->checkLoginStatus();
            $this->checkProductElement();
            $this->checkQuantityElement();
            $this->checkProductExist();
            $this->checkProductExistInCart();

            $this->modifyCartQuantity();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $result = [
            'productId' => $_POST['productId'],
            'currentQuantity' => $_POST['quantity'],
        ];

        $message = 'Edit product quantity in cart success.';
        Json::ajaxReturn(true, $message, $result);
        return true;
    }

    public function deleteFromCart()
    {
        try {
            $this->checkRequest();
            $this->checkLoginStatus();
            $this->checkProductElement();
            $this->checkProductExist();
            $this->checkProductExistInCart();

            $this->deleteProduct();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $result = [
            'productId' => $_POST['productId'],
        ];

        $message = 'Remove product from cart success.';
        Json::ajaxReturn(true, $message, $result);
        return true;
    }

    public function bill()
    {
        try {
            $this->checkRequest();
            $this->checkLoginStatus();
            $this->compareProductInStore();

            $this->billing();

        } catch (Exception $e) {

            Json::ajaxReturn(false, $e->getMessage());
            return true;
        }

        $message = 'Payment success, yahoo!';
        Json::ajaxReturn(true, $message);
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

    private function checkQuantityElement()
    {
        if (!isset($_POST['quantity'])) {
            throw new Exception('Quantity not found in POST request.');
        }
        if (!preg_match('/^[1-9][0-9]*$/', $_POST['quantity'])) {
            throw new Exception('Quantity is not a number.');
        }
        if ($_POST['quantity'] > 10) {
            throw new Exception('Quantity only can be max to 10, illegal modify!');
        }
        return true;
    }

    private function checkLoginStatus()
    {
        if (!parent::loginStatus()) {
            throw new Exception('User are not login.');
        }
        return true;
    }

    private function checkProductExist()
    {
        if (!$this->model->productExist($_POST['productId'])) {
            throw new Exception('This product does not exist.');
        }
        return true;
    }

    # important! this method if match data from db should return true
    # and tell js users already add this item into the cart
    private function checkProductAlreadyInCart()
    {
        if ($this->model->productInCart($_POST['productId'])) {
            throw new Exception('This product already in cart.');
        }
        return true;
    }

    private function checkProductExistInCart()
    {
        if (!$this->model->productInCart($_POST['productId'])) {
            throw new Exception('This product does not exist.');
        }
        return true;
    }

    private function compareProductInStore()
    {
        $cart = $this->model->getUserCart();

        foreach ($cart as $product) {
            if ($product['quantity'] > $product['total_quantity']) {
                throw new Exception('Transaction fail, some product in your cart is out of stock! Please retry angain.');
            }
        }
        return true;
    }

    private function addToCart()
    {
        if (!$this->model->addCart($_POST['productId'])) {
            throw new Exception('Item add to cart unsuccess.');
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

    private function deleteProduct()
    {
        if (!$this->model->deleteFromCart($_POST['productId'])) {
            throw new Exception('Remove product from cart unsuccess.');
        }
        return true;
    }

    private function billing()
    {
        if (!$this->model->bill()) {
            throw new Exception('Billing unsuccess.');
        }
        return true;
    }
}
