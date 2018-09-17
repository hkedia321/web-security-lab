<?php
require('functions.php');
make_connection();
session_start();


if (!$_SESSION['emp_id'])
 header("Location: index.php");

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$desig = $_POST['desig'];
	$exp_yrs = $_POST['exp_yrs'];
	$dept = $_POST['dept'];
	$sal = $_POST['sal'];
	$mgr_id = $_POST['mgr_id'];
	
	$suc = update_profile($_SESSION['emp_id'],$name,$age,$desig,$exp_yrs,$dept,$sal,$mgr_id);
	if ($suc) {
		echo "<script>alert('sucessfully updated');</script>";
	}
}

$profile = get_profile($_SESSION['emp_id']);
$row=mysqli_fetch_assoc($profile);
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Profile | Welcome Employee <?php echo $_SESSION['emp_id'] ?>!</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<br/>
	<div class="text-right">
		<a href="logout.php"><button class="btn btn-primary">Logout</button></a>
	</div>
	<br/>
	<form action="#" method="POST">
		<table class="table">
			<tr>
				<th>Employee id</th>
				<td><?php echo $row['emp_id'];?></td>
			</tr>
			<tr>
				<th>Employee Name</th>
				<td><input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"></td>
			</tr>
			<tr>
				<th>Employee Age</th>
				<td><input type="number" class="form-control" name="age" value="<?php echo $row['age'];?>"></td>
			</tr>
			<tr>
				<th>Employee Designation</th>
				<td><input type="text" class="form-control" name="desig" value="<?php echo $row['desig'];?>"></td>
			</tr>
			<tr>
				<th>Employee Exp. years</th>
				<td><input type="number" class="form-control" name="exp_yrs" value="<?php echo $row['exp_yrs'];?>"></td>
			</tr>
			<tr>
				<th>Employee department</th>
				<td><input type="text" class="form-control" name="dept" value="<?php echo $row['dept'];?>"></td>
			</tr>
			<tr>
				<th>Employee salary</th>
				<td><input type="text" class="form-control" name="sal" value="<?php echo $row['sal'];?>"></td>
			</tr>
			<tr>
				<th>Employee mgr id</th>
				<td><input type="text" class="form-control" name="mgr_id" value="<?php echo $row['mgr_id'];?>"></td>
			</tr>
		</table>
		<div class="text-center">
		<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
		</div>
	</form>
</div>
</body>
</html>