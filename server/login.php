<?php
include_once 'include.php';

if(isset($_POST['login'])){
	
	$username = $_POST['username'];
	$password = $_POST["password"];
	
	$response = array();
	$error = false;
	
	if(empty($username)){
		$error = true;
		$response["username"] = "invalid";
	}
	
	if(empty($password)){
		$error = true;
		$response["password"] = "invalid";
	}
	
	if($error == false){
		$pass = md5(md5($password));
		
		if(user_exists($conn, $username,$pass)){
			$_SESSION['test_app_login_session'] = "test_app_login_session";
			$response["status"] = "ok";
		}else{
			$response["status"] = "error";
		}
	}else {
		$response["error"] = 'error';
	}

	echo json_encode($response);
}