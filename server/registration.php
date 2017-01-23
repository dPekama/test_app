<?php
include_once 'include.php';

if(isset($_POST['register'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	
	$error = false;
	$ajax = array();
	
	if(empty($name)){
		$error = true;
		$ajax['name'] = 'error';
	}
	
	if( empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$ajax['email'] = 'error';
	}
	
	if( empty($phone) || strlen($phone) < 10 ){
		$error = true;
		$ajax['phone'] = 'error';
	}
	
	if(empty($username) || user_username($conn, $username)){
		$error = true;
		$ajax['username'] = 'error';
	}
	
	if(empty($password)){
		$error = true;
		$ajax['password'] = 'error';
	}
	
	if(empty($confirm)){
		$error = true;
		$ajax['confirm'] = 'error';
	}
	
	if($password !== $confirm){
		$error = true;
		$ajax['confirm'] = 'error';
	}
	
	if($error == false){
		$table = 'admin';
		$pass = md5(md5($password));
		$data = array("name"=>$name, "email"=>$email, "password"=>$pass, "phone"=>$phone,"username"=>$username);
		if(insert($table,$data,$conn)){
			$ajax['status'] = 'ok';
		}else{
			$ajax['status'] = 'error';
		}
	}else{
		$ajax['error'] = 'error';
	}
	
	echo json_encode($ajax);	
}

