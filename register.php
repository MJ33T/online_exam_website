<?php 
	require_once('connection.php');
	if (isset($_POST['reg_b'])) {
		//echo 'Working';
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['password'])){

		}
		else{
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$contact = mysqli_real_escape_string($conn, $_POST['contact']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			$query = "INSERT INTO users(name,email,password,contact) VALUES ('$name', '$email','$password','$contact')";

			if(mysqli_query($conn, $query)){
				header('Location: login.php?value=Registration Successfully! Please Login.');
			}
			else{
				echo 'Error: '.mysqli_error($conn);
			}
		}
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Online Exam</title>
	<link rel="stylesheet" type="text/css" href="./css/reg_style.php">
	
</head>
<body>
	<h1>Online Examination</h1>
	<h2>Register</h2>

	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div>
			<label>Name</label><br>
			<input type="text" name="name" placeholder="Name" required="required" >
		</div>
		<div>
			<label>Email</label><br>
			<input type="email" name="email" placeholder="Email" required="required" >
		</div>
		<div>
			<label>Contact</label><br>
			<input type="text" name="contact" placeholder="Contact" required="required" >
		</div>
		<div>
			<label>Password</label><br>
			<input type="password" name="password" placeholder="Password" required="required">
		</div>
		<button type="submit" name="reg_b">Register</button><br><br><br>
		<a href="login.php">Login</a>
	</form>
	<br>
	<br>
	<?php include('./inc/footer.html') ?>
</body>
</html>