<?php
include_once 'include.php';
if (! login_check ()) {
	//header ( "location:login.php" );
}else{
	get_users($conn) ;
}
