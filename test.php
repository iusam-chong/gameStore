<?php
if (isset($_POST['textUserName'])) {
    echo $_POST['textUserName'];
} else {
    echo 'no variable set';
}

echo "<pre>";
print_r($_POST);
echo "</pre>";
