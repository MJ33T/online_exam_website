<?php
	require_once('connection.php');
	session_start();

	if(isset($_POST['login_b'])){
		//echo 'Working';
		if(empty($_POST['email']) || empty($_POST['password'])){

		}
		else{
			$query1 = mysqli_query($conn, "SELECT email FROM admin");
			$admin_emails = mysqli_fetch_all($query1, MYSQLI_ASSOC);
			foreach ($admin_emails as $admin_email) {
				while($_POST['email'] == $admin_email['email']){
					$admin = "SELECT * FROM admin WHERE email = '".$_POST['email']."'AND password = '".$_POST['password']."'";
					$result1 = mysqli_query($conn, $admin);
					if(mysqli_fetch_assoc($result1)){
						$_SESSION['User'] = $_POST['email'];
						header('Location: index.php');	
					}
					else{
						header('Location: login.php?invalid=Enter Correct Email and Password');
					}
				}
				
				$query = "SELECT * FROM users WHERE email = '".$_POST['email']."'AND password = '".$_POST['password']."'";
				$result = mysqli_query($conn, $query);
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User'] = $_POST['email'];
					header('Location: index_user.php');
				}
				else{
					header('Location: login.php?invalid=Enter Correct Email and Password');
				}
			
			}
			
		}
	}
	else{
			//echo 'Not Working';
	}
?>






<!DOCTYPE html>
<html>
<head>
	<title>Online Exam</title>
	<link rel="stylesheet" type="text/css" href="./css/login_style.php">
</head>
<body>
	<h1>Online Examination</h1>
	<h2>Login</h2>

	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div>
			<label>Email</label><br>
			<input type="email" name="email" placeholder="Email" required="required" >
		</div>
		<div>
			<label>Password</label><br>
			<input type="password" name="password" placeholder="Password" required="required">
		</div>
		<button type="submit" name="login_b">Login</button><br><br><br>
		<a href="register.php">Register</a>
		
	</form>
	
	<?php if(@$_GET['invalid']==true): ?>
            	<div><?php echo $_GET['invalid']; ?></div>
            <?php endif; ?>

            <?php if(@$_GET['value']==true): ?>
                <div><?php echo $_GET['value']; ?></div>
            <?php endif; ?>
	<?php include('./inc/footer.html') ?>
</body>
</html>