<?php
$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// always disable emulated prepared statement when using the MySQL driver
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>
