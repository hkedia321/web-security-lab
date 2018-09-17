<?php
require('functions.php');
make_connection();
$errors=[];
if (isset($_COOKIE['user']) && $_COOKIE['user'] !="") {
	header("location: products.php");
}
if(isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(check_user($username, $password))
	{
		setcookie("user", $username, time() + (86400 * 30), "/");
		header("Location: products.php");
	}
	else
	{
		$errors["login"]="wrong username/password";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My App</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<br/><br/>
		<h2 class="text-center">My App</h2>
		<br/><br/>
		<div class="col-sm-6 col-sm-offset-4">
				<form action="#" method="post">
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="username">Username</label>
							<div class="col-sm-7">
								<input type="text" required id="username" name="username" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="password">Password</label>
							<div class="col-sm-7">
								<input type="text" required id="password" name="password" class="form-control">
							</div>
						</div>
					</div>
					<br/>
					<button type="submit" class="btn btn-primary col-sm-9 col-xs-12" id="submit" name="submit">
						Log in
					</button>
					<div class="row">
						<span class="error col-md-12"><?php if(isset($errors["login"])) echo $errors["login"];?></span>
					</div>
					<div class="row">
						<span class="error col-md-12">
							<?php
							if(isset($_SESSION['errors']))
							{
								echo $_SESSION['errors'];
							}
							?>
						</span>
					</div>
				</form>
			</div>
	</div>

</body>
</html>