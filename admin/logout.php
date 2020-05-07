<?php
require_once("include/header.php");
?>
<?php
$session->logout();
redirect('login.php');
?>