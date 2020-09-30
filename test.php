<?php

// echo setcookie('test', "cookie is set", $timeout, '/');
// echo '<br/>';
// if (setcookie('test', "cookie is set", $timeout, '/')) {
//     echo "is set";
// } else {
//     echo "no set";
// }

$str = "admin";
$hash = hash("sha256", $str);