<?php

class Cookie
{
    public static function init($id)
    {
        # Set user identifier, this will use like user.id but in cookie
        $identifier = hash('sha256', $id);

        # Set sand rand seed, and set token
        mt_srand((double) microtime() * 10000);
        $token = md5(uniqid(rand(), true));

        # Store to Db
        $hashIdentifier = password_hash($identifier, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `auth` (`user_id`, `identifier`, `token`) VALUES (? ,? ,?)";
        $param = array($id, $hashIdentifier, $token);

        $model = new Model();
        if (!$model->specialInsert($sql, $param)) {
            return false;
        }

        # Set cookie
        $auth = $identifier . ':' . $token;
        $timeout = time() + 60 * 60;
        setcookie('auth', $auth, $timeout, '/');

        return (isset($_COOKIE['auth'])) ? true : false;
    }

    public static function renew()
    {
        if (!isset($_COOKIE['auth'])) {
            return false;
        }

        list($identifier, $token) = explode(":", $_COOKIE['auth']);

        $hashIdentifier = password_hash($identifier, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM `auth` WHERE (identifier = ?) AND (token = ?) AND (login_time >= (NOW() - INTERVAL 30 MINUTE))";
        $param = array($hashIdentifier, $token);
        $model = new Model();
        if (!$model->specialSelect($sql, $param)) {
            self::destroy();
            return false;
        }

        mt_srand((double) microtime() * 10000);
        $token = md5(uniqid(rand(), true));

        $auth = $identifier . ':' . $token;
        $timeout = time() + 60 * 60;
        setcookie('auth', $auth, $timeout);

        return (isset($_COOKIE['auth'])) ? true : false;
    }

    public static function destroy()
    {
        setcookie('auth', null, time() - 3600);
    }
}
