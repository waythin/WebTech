<?php
session_start();
session_destroy();
setcookie('email', time()-10000);

header('Location: http://localhost/webtechProject/index.php');