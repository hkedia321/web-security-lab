<?php
function make_connection(){
	global $connection;
	
	$dbhost="localhost";
	$dbuser="vit";
	$dbpass="";
	$dbname="vit_windows8";
	
	$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(mysqli_connect_errno()){
		die("Database connection failed:"
			);
	}
}

function check_user($emp_id, $password){
	global $connection;
	$password2 = mysqli_real_escape_string($connection, $password);
	$query="SELECT * from employee_list WHERE emp_id='{$emp_id}' AND password='{$password2}'";
	// 1' or '1' = '1
	$result=mysqli_query($connection,$query);
	$rowcount=mysqli_num_rows($result);
	if($rowcount>0)
		return true;
	else
		return false;
}

function get_products() {
	global $connection;
	$query = "SELECT * FROM products";
	$result=mysqli_query($connection,$query);
	return $result;
}

function get_profile($emp_id) {
	global $connection;
	$query = "SELECT * FROM employee_list WHERE emp_id='{$emp_id}'";
	$result=mysqli_query($connection,$query);
	return $result;
}

function update_profile($emp_id,$name,$age,$desig,$exp_yrs,$dept,$sal,$mgr_id) {
	global $connection;
	$query = "UPDATE employee_list SET name='{$name}',age='{$age}',desig='{$desig}', exp_yrs='{$exp_yrs}',dept='{$dept}',sal='{$sal}',mgr_id='{$mgr_id}' WHERE emp_id='{$emp_id}'";
	$result=mysqli_query($connection,$query);
	return $result;
}
?>