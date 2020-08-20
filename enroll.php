

<?php 
	require_once('connection.php');
	session_start();

	if(isset($_SESSION['User'])){
		$user = $_SESSION['User'];
		$queryName = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user'");
		$row = mysqli_fetch_array($queryName);
		$name = $row['name'];

		$examid = mysqli_real_escape_string($conn, $_GET['id']);

		$query = "SELECT * FROM questions WHERE examNo = '$examid'";

		$result = mysqli_query($conn, $query);

		$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		
	}

 ?>

 <?php include('inc/header_user.html') ?>

<?php 
	$query2 = "SELECT * FROM exam WHERE examNo = '$examid'";

	$result2 = mysqli_query($conn, $query2);

	$row = mysqli_fetch_array($result2);

	$id1 = $row['examName'];
 ?>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	<br>
	<h1 style="text-align: center;"><?php echo $id1 ?></h1>
	<br>
	<h2 style="text-align: center;">Select The Right Answer</h2>
	
	<div class="exam_question_list">
		<?php foreach ($questions as $question): ?>
			<h1><?php echo $question['questionNo'].'. '.$question['question'] ?></h1>
			<?php
				$ques = $question['questionNo'];
				$ex = $question['examNo'];

				$query1 = "SELECT * FROM options WHERE questionNo = '$ques' AND examNo = '$ex'";

				$result1 = mysqli_query($conn, $query1);

				$options = mysqli_fetch_all($result1, MYSQLI_ASSOC);
			 ?>

			<?php foreach ($options as $option): ?>
				<?php $id = $option['questionNo'] ?>
				<div class="inline_option">
					<div>
						<h2><input type="radio" value="<?php echo $option['optionA'] ?>"  required="required" name="<?php echo $id ?>"><?php echo ' '.$option['optionA'] ?></h2>
					</div>
					<div>
						<h2><input type="radio" value="<?php echo $option['optionB'] ?>" required="required" name="<?php echo $id ?>"><?php echo ' '.$option['optionB'] ?></h2>
					</div>
					
				</div>
				<div class="inline_option">
					<div>
						<h2><input type="radio" value="<?php echo $option['optionC'] ?>" required="required" name="<?php echo $id ?>"><?php echo ' '.$option['optionC'] ?></h2>
					</div>
					<div>
						<h2><input type="radio" value="<?php echo $option['optionD'] ?>" required="required" name="<?php echo $id ?>"><?php echo ' '.$option['optionD'] ?></h2>
					</div>
				</div>
				<?php 
					if(isset($_POST['done'])){
						$selected_ans = $_POST[$id];
						$qry=mysqli_query($conn,"SELECT * FROM select_user_ans WHERE userName = '$name' AND examNo = '$ex' AND questionNo ='$id' ");
						$rowCheck=mysqli_num_rows($qry);
						if ($rowCheck>0) {
					        //$qry=mysqli_query($con,"UPDATE select_user_ans SET select_ans='$selected_ans' WHERE userName = '$name' ");  
					    }
					    else{
					        $qry=mysqli_query($conn, "INSERT INTO select_user_ans(select_ans,userName,examNo,questionNo) VALUES ('$selected_ans', '$name', '$ex', '$id')");
					    }		

						//$optionA =mysqli_query($conn, "INSERT INTO select_user_ans(select_ans,userName,examNo,questionNo) VALUES ('$selected_ans', '$name', '$ex', '$id') ON DUPLICATE KEY UPDATE userName = VALUES(userName)");
						header('Location: result_user.php');
							
					}
				 ?>

			<?php endforeach; ?>
	 	<?php endforeach; ?>
	 	<br>
	 	<br>
	 	<div style="text-align: center;">
	 		<button style="width: 30%; padding: 20px 0px;" class="done" type="submit" name="done">Done</button>
	 		<br>
	 		<br>
	 		<button><a href="exam_user.php">Back</a></button>
	 	</div>
	 </div>
</form>


<?php include('inc/footer.html') ?>