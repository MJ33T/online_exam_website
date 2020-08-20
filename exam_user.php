<?php
	require_once('connection.php');
	session_start();  
	if(isset($_SESSION['User'])){
		//$user = $_SESSION['User'];
		//$examNo = mysqli_real_escape_string($conn, $_GET['examNo']);
		

		$query = "SELECT * FROM exam ORDER BY examNo";

		$result = mysqli_query($conn, $query);

		$exams =mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);

		
		mysqli_close($conn);
	}
	else{
		header('Location: login.php');
	}
?>


<?php include('./inc/header_user.html') ?>



<?php echo '<h1 style="text-align:center;">'.'Current List of Exam'.'</h1>' ?>


<div class="exam_list">
	<table>
		<tr>
			<th style="width: 7%;">Exam No</th>
			<th>Exam Name</th>
			<th>Subject</th>
			<th style="width: 15%;">Enroll</th>
			
		</tr>

		<?php foreach ($exams as $exam) : ?>
			<?php if($exam['active'] === '1'): ?>
				<tr>
					<td><?php echo $exam['examNo']; ?></td>
					<td><?php echo $exam['examName']; ?></td>
					<td><?php echo $exam['subject']; ?></td>
					<form method="POST">
						<td><button><a class="enroll" type="submit" href="enroll.php?id=<?php echo $exam['examNo']; ?>">Enroll</a></button></td>
					</form>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>
<?php include('./inc/footer.html') ?>