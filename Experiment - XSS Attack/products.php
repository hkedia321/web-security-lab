<?php
require('functions.php');
header('X-XSS-Protection:0');
make_connection();


if (!$_COOKIE['user'] || $_COOKIE['user'] =="")
 header("Location: index.php");
if (isset($_POST['submit'])) {
	create_post($_POST['post']);
}
$all_products = get_products();
$all_posts = get_posts();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $_COOKIE['user'] ?>!</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1 class="text-center">You are successfully logged in as: <?php echo $_COOKIE['user'] ?></h1>

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

	<br/>
	<h2>Open form..</h2>
	<?php
	while($row=mysqli_fetch_assoc($all_posts)) {
		echo "<p>".htmlspecialchars($row["post"])."</p>";
	}
	?>
	<form action="products.php" method="post">
		<textarea name="post" class="form-control" placeholder="enter your text here..."></textarea>
		<button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>
</html>