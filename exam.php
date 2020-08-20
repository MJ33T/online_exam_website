<?php
	require_once('connection.php');
	session_start();  
	if(isset($_SESSION['User'])){
		//$user = $_SESSION['User'];
		//$examNo = mysqli_real_escape_string($conn, $_GET['examNo']);
		if(isset($_POST['enroll'])){
			$true = 1;
			$false = 0;
			$enroll_id = mysqli_real_escape_string($conn, $_POST['enroll_id']);
			$query = "SELECT * FROM exam WHERE examNo = {$enroll_id}";

			$result = mysqli_query($conn, $query);

			$exam_array = mysqli_fetch_array($result);
			$active = $exam_array['active'];

			$exams =mysqli_fetch_all($result, MYSQLI_ASSOC);

			mysqli_free_result($result);
			if($active == 0){
				$query1 = "UPDATE exam SET active = '$true' WHERE examNo = '$enroll_id'";
				$result1 = mysqli_query($conn, $query1);
			}
			else{
				$query2 = "UPDATE exam SET active = '$false' WHERE examNo = '$enroll_id'";
				$result2 = mysqli_query($conn, $query2);	
			}
		
		}	
		if(isset($_POST['delete'])){
			$delete_id = mysqli_real_escape_string($conn, $_POST['enroll_id']);
			$query = "DELETE FROM exam WHERE examNo = '$delete_id'";

			$result = mysqli_query($conn, $query);
		}

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


<?php include('./inc/header.html') ?>



<?php echo '<h1 style="text-align:center;">'.'Current List of Exam'.'</h1>' ?>

<div style="text-align: center; margin-top: 20px">
	<a id="cr_cou" href="create_exam.php"><button>Create New Course</button></a>
</div>

<div class="exam_list">
	<table>
		<tr>
			<th style="width: 7%;">Exam No</th>
			<th>Exam Name</th>
			<th>Subject</th>
			<th style="width: 7%;">Activated</th>
			<th>Active/Deactive</th>
			<th>Delete</th>
		</tr>

		<?php foreach ($exams as $exam) : ?>
			<tr>
				<td><?php echo $exam['examNo']; ?></td>
				<td><?php echo $exam['examName']; ?></td>
				<td><?php echo $exam['subject']; ?></td>
				<td>
					<?php 

						if($exam['active'] == 1){
							echo '<img src="img/right.png">';
							
						}else{
							echo '<img src="img/wrong.jpg">';

						}
					?>
				</td>
				<form method="POST">
					<input type="hidden" name="enroll_id" value="<?php echo $exam['examNo'] ?>">
					<td><button type="submit" name="enroll"><?php echo ($exam['active'] == 1)?'Deactive' : 'Active' ?></button></td>
					<td><button type="submit" name="delete">Delete</button></td>
				</form>
				
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php include('./inc/footer.html') ?>