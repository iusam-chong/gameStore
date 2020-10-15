<?php

class Bootstrap
{
    public function __construct()
    {
        ini_set('display_errors', 'off');
        # 關閉錯誤輸出
        ini_set('display_errors', 'on');
        # 開啟錯誤輸出
        error_reporting(E_ALL & ~E_NOTICE);

        ob_start();

        $url = (isset($_GET['url'])) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $url = $this->requireContr($url);

        $this->runContrMethod($url);

        ob_end_flush();
    }

    public function requireContr($url)
    {
        $file = 'controllers/' . $url[0] . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            header('location: http://localhost:8888/gameStore/index');
            return false;
            //require_once('controllers/index.php');
            // unset($url);
            // $url = array('index');
        }

        return $url;
    }

    public function runContrMethod($url)
    {
        $controller = new $url[0]($url[0]);

        if (isset($url[1])) {

            if (!method_exists($controller, $url[1])) {
                //echo '(for develop only) method not found in controller.';
                header('location: http://localhost:8888/gameStore/' . $url[0]);
                return false;
            }

            if (isset($url[2])) {
                if (!$controller->{$url[1]}($url[2])) {
                    header('location: http://localhost:8888/gameStore/' . $url[0]);
                }
            } else {
                if (!$controller->{$url[1]}()) {
                    header('location: http://localhost:8888/gameStore/' . $url[0]);
                }
            }
        }
    }
}
