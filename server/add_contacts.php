<?php
include_once 'include.php';

if(isset($_POST['add_contact'])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];

	$error = false;
	$ajax = array();

	if(empty($name)){
		$error = true;
		$ajax['name'] = 'error';
	}
	
	if(check_existance($conn, "contacts", "name", $name) ){
		$error = true;
		$ajax['name'] = 'Exists! ';
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		$ajax['email'] = 'Error! ';
	}
	
	if(check_existance($conn, "contacts", "email", $email)){
		$error = true;
		$ajax['email'] = 'Exists! ';
	}

	if( empty($phone) || strlen($phone) < 10 || check_existance($conn, "contacts", "phone", $phone) ){
		$error = true;
		$ajax['phone'] = 'Error! ';
	}
	if(check_existance($conn, "contacts", "phone", $phone) ){
		$error = true;
		$ajax['phone'] = 'Exists! ';
	}

	if($error == false){
		$table = 'contacts';
		$data = array("name"=>$name, "email"=>$email,  "phone"=>$phone);
		if(insert($table,$data,$conn)){
			$ajax['status'] = 'ok';
		}else{
			$ajax['status'] = 'Error! ';
		}
	}else{
		$ajax['error'] = 'error';
	}

	echo json_encode($ajax);
}

