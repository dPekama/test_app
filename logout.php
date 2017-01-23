<?php
include_once 'server/include.php';
session_unset();
session_destroy();
header("location:login.php");
exit();
?>