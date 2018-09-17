<?php
require('functions.php');
make_connection();
session_start();


if (!$_SESSION['user'])
 header("Location: index.php");

$all_products = get_products();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $_SESSION['user'] ?>!</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1 class="text-center">You are successfully logged in as: <?php echo $_SESSION['user'] ?></h1>

	<div class="text-right">
		<a href="logout.php"><button class="btn btn-primary">Logout</button></a>
	</div>
	<br/>
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Category</th>
			<th>Price</th>
		</thead>
		<tbody>
			<?php
				while($row=mysqli_fetch_assoc($all_products)) {
					echo "<tr>";
					echo "<td>".$row["id"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["category"]."</td>";
					echo "<td>".$row["price"]."</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>