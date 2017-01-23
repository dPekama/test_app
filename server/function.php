<?php


function insert($table, $data,$conn) {
	$keys = array_keys($data);
	$sql = "INSERT INTO $table (".implode(", ",$keys).") \n";
	$sql .= "VALUES ( :".implode(", :",$keys).")";
	$q = $conn->prepare($sql);
	if($q->execute($data)){
		return true;
	}else{
		return false;
	}
	//return $q->execute($a);
}

function login_check(){
	if(isset($_SESSION['test_app_login_session'])){
		return true;
	}else{
		return false;
	}
}

function user_exists($db, $username,$password)
{
	$userQuery = "SELECT * FROM admin u WHERE u.username=:user AND u.password=:password;";
	$stmt = $db->prepare($userQuery);
	$stmt->execute(array(':user' => $username, ':password'=>$password));
	return !!$stmt->fetch(PDO::FETCH_ASSOC);
}

function check_existance($db, $table, $field, $value)
{
	$userQuery = "SELECT * FROM $table WHERE $field =:value;";
	$stmt = $db->prepare($userQuery);
	$stmt->execute(array(':value' => $value));
	return !!$stmt->fetch(PDO::FETCH_ASSOC);
}

function get_users($conn)
{
	$stmt = $conn->prepare("SELECT * FROM `contacts`");
	$stmt->execute(); /* EXECUTE THE QUERY */
	while($row = $stmt->fetch()){ /* FETCH ALL RESULTS */
		$name_arr[] = $row['name']; /* STORE EACH RESULT TO THIS VARIABLE IN ARRAY */
	} /* END OF WHILE LOOP */
	
	echo json_encode($name_arr);
}

function get_nos($conn,$value){
	$variable = buildSql($value);
	$stmt = $conn->prepare("SELECT * FROM `contacts` WHERE name $variable");
	$stmt->execute(); /* EXECUTE THE QUERY */
	while($row = $stmt->fetch()){ /* FETCH ALL RESULTS */
		$name_arr[] = $row['phone']; /* STORE EACH RESULT TO THIS VARIABLE IN ARRAY */
	} /* END OF WHILE LOOP */
	
	return $name_arr;
}

function buildSql($value)
{
	return "in ('" . str_replace(",", "','", $value) . "') ";
}

