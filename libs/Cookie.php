<?php

class Cookie
{
    public static function init($id)
    {
        # Set user identifier, this will use like user.id but in cookie
        $identifier = $id;

        # Hash user id to make indentifier
        $hashIdentifier = password_hash($identifier, PASSWORD_DEFAULT);

        # Call method to create a newToken
        $token = self::newToken();

        # Store information to DB
        $sql = "INSERT INTO `auth` (`user_id`, `identifier`, `token`) VALUES (? ,? ,?)";
        $param = array($id, $hashIdentifier, $token);

        $model = new Model();
        if (!$model->specialInsert($sql, $param)) {
            return false;
        }
        
        # Set cookie
        return self::set($hashIdentifier, $token) ? true : false;
    }

    public static function renew()
    {
        if (!isset($_COOKIE['auth'])) {
            return false;
        }

        # Split cookie to get identifier and token
        list($identifier, $token) = explode(":", $_COOKIE['auth']);

        # IMPORTANT! interval value is allow user static during time in this site
        # Search user token and get result form db
        $sql = "SELECT * FROM `auth`, `users` WHERE users.enabled = 1 AND users.id = auth.user_id AND (token = ?) AND (login_time >= (NOW() - INTERVAL 60 MINUTE))";
        $param = array($token);
        $model = new Model();
        $result = $model->specialSelect($sql, $param);
        if (!$result) {
            self::destroy();
            return false;
        }
        
        # Match current user identifier 
        if (strcmp($identifier, $result['identifier'])) {
            return false;
        }

        # Get a new token
        $token = self::newToken();

        # Insert a new token to db
        $sql = "UPDATE `auth` SET `token` = ? WHERE `identifier` = ?";
        $param = array($token, $identifier);
        if (!$model->specialInsert($sql, $param)) {
            return false;
        }

        # renew cookie
        return self::set($identifier, $token) ? true : false;
    }

    # This method will let model to get user infomation from identifier
    public static function getIdentifier()
    {
        list($identifier, $token) = explode(":", $_COOKIE['auth']);

        return $identifier;
    }

    public static function destroy()
    {
        return setcookie('auth', null, time() - 3600, '/');
    }

    # Method to create and return a token
    private static function newToken()
    {
        mt_srand((double) microtime() * 10000);
        $token = md5(uniqid(rand(), true));

        return $token;
    }

    # Set cookie, we can check new token here(use echo $auth)
    private static function set($identifier, $token)
    {
        $auth = $identifier . ':' . $token;
        $timeout = time() + 60 * 60;

        return setcookie('auth', $auth, $timeout, '/');
    }
}
