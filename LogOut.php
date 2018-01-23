<?php
 session_start();
 session_unset();
 unset($_SESSION["email"]);
 unset($_SESSION["password"]);
 session_destroy();
 require('firstPage.php');

?>