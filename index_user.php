

<?php include('./inc/header_user.html') ?>
<?php
	require_once('connection.php');
	session_start();  
	if(isset($_SESSION['User'])){
		$user = $_SESSION['User'];
		$queryName = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user'");
		$row = mysqli_fetch_array($queryName);
		$name = $row['name'];
		echo '<h1 style="text-align:center;">'.'Wellcome '.$name.'</h1>'.'<br>';

	}
	else{
		header('Location: login.php');
	}
?>
	
<?php echo '<h1 style="text-align:center;">'.'Online Examination Rules'.'</h1>' ?>

<div class="table">
	<table>
		<tr>
			<td>1. </td>
			<td>Exam will based on multiple choice Q & A</td>
		</tr>
		<tr>
			<td>2. </td>
			<td>Per Question have 1 point</td>
		</tr>
		<tr>
			<td>3. </td>
			<td>There is no negative mark for wrong answer </td>
		</tr>
		<tr>
			<td>4. </td>
			<td>Every Question containing 10s to answer </td>
		</tr>
		<tr>
			<td>5. </td>
			<td>You can pass any question by pressing pass button </td>
		</tr>
		<tr>
			<td>6. </td>
			<td>Each Course exam containing 10 question </td>
		</tr>
		<tr>
			<td>7. </td>
			<td>Getting 9 out of 10 will be Grade of A+ </td>
		</tr>
		<tr>
			<td>8. </td>
			<td>Getting less than 3 will be Grade of F </td>
		</tr>
		
	</table>
</div>

<?php include('./inc/footer.html') ?>

