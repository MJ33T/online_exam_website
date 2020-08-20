
<?php include('./inc/header.html'); ?>

<?php
	require_once('connection.php');
	session_start();  
	if(isset($_SESSION['User'])){
		//$user = $_SESSION['User'];
		if(isset($_POST['insert_b'])){
			//echo 'Working';
			$examNo = mysqli_real_escape_string($conn, $_POST['examNo']);
			$examName = mysqli_real_escape_string($conn, $_POST['examName']);
			$subject = mysqli_real_escape_string($conn, $_POST['subject']);

			

			$questionNoOne = mysqli_real_escape_string($conn, $_POST['questionNoOne']);
			$questionOne = mysqli_real_escape_string($conn, $_POST['questionOne']);
				$optionAone = mysqli_real_escape_string($conn, $_POST['optionAone']);
				$optionBone = mysqli_real_escape_string($conn, $_POST['optionBone']);
				$optionCone = mysqli_real_escape_string($conn, $_POST['optionCone']);
				$optionDone = mysqli_real_escape_string($conn, $_POST['optionDone']);
				$rightAnsone = mysqli_real_escape_string($conn, $_POST['rightAnsone']);

			$questionNoTwo = mysqli_real_escape_string($conn, $_POST['questionNoTwo']);
			$questionTwo = mysqli_real_escape_string($conn, $_POST['questionTwo']);
				$optionAtwo = mysqli_real_escape_string($conn, $_POST['optionAtwo']);
				$optionBtwo = mysqli_real_escape_string($conn, $_POST['optionBtwo']);
				$optionCtwo = mysqli_real_escape_string($conn, $_POST['optionCtwo']);
				$optionDtwo = mysqli_real_escape_string($conn, $_POST['optionDtwo']);
				$rightAnstwo = mysqli_real_escape_string($conn, $_POST['rightAnstwo']);

			$questionNoThree = mysqli_real_escape_string($conn, $_POST['questionNoThree']);
			$questionThree = mysqli_real_escape_string($conn, $_POST['questionThree']);
				$optionAthree = mysqli_real_escape_string($conn, $_POST['optionAthree']);
				$optionBthree = mysqli_real_escape_string($conn, $_POST['optionBthree']);
				$optionCthree = mysqli_real_escape_string($conn, $_POST['optionCthree']);
				$optionDthree = mysqli_real_escape_string($conn, $_POST['optionDthree']);
				$rightAnsthree = mysqli_real_escape_string($conn, $_POST['rightAnsthree']);

			$questionNoFour = mysqli_real_escape_string($conn, $_POST['questionNoFour']);
			$questionFour = mysqli_real_escape_string($conn, $_POST['questionFour']);
				$optionAfour = mysqli_real_escape_string($conn, $_POST['optionAfour']);
				$optionBfour = mysqli_real_escape_string($conn, $_POST['optionBfour']);
				$optionCfour = mysqli_real_escape_string($conn, $_POST['optionCfour']);
				$optionDfour = mysqli_real_escape_string($conn, $_POST['optionDfour']);
				$rightAnsfour = mysqli_real_escape_string($conn, $_POST['rightAnsfour']);

			$questionNoFive = mysqli_real_escape_string($conn, $_POST['questionNoFive']);
			$questionFive = mysqli_real_escape_string($conn, $_POST['questionFive']);
				$optionAfive = mysqli_real_escape_string($conn, $_POST['optionAfive']);
				$optionBfive = mysqli_real_escape_string($conn, $_POST['optionBfive']);
				$optionCfive = mysqli_real_escape_string($conn, $_POST['optionCfive']);
				$optionDfive = mysqli_real_escape_string($conn, $_POST['optionDfive']);
				$rightAnsfive = mysqli_real_escape_string($conn, $_POST['rightAnsfive']);


			$query = "INSERT INTO exam(examNo, examName, subject) VALUES ('$examNo', '$examName', '$subject')";


			$queryQ = "INSERT INTO questions(questionNo, question, examNo) VALUES ('$questionNoOne', '$questionOne', '$examNo'),('$questionNoTwo', '$questionTwo', '$examNo'),('$questionNoThree', '$questionThree', '$examNo'),('$questionNoFour', '$questionFour', '$examNo'),('$questionNoFive', '$questionFive', '$examNo') "; 

			$queryOp = "INSERT INTO options(examNo, questionNo, optionA, optionB, optionC, optionD, rightAns) VALUES 
			('$examNo', '$questionNoOne', '$optionAone', '$optionBone', '$optionCone', '$optionDone', '$rightAnsone'), 
			('$examNo', '$questionNoTwo', '$optionAtwo', '$optionBtwo', '$optionCtwo', '$optionDtwo', '$rightAnstwo'), 
			('$examNo', '$questionNoThree', '$optionAthree', '$optionBthree', '$optionCthree', '$optionDthree', '$rightAnsthree'), 
			('$examNo', '$questionNoFour', '$optionAfour', '$optionBfour', '$optionCfour', '$optionDfour', '$rightAnsfour'), 
			('$examNo', '$questionNoFive', '$optionAfive', '$optionBfive', '$optionCfive', '$optionDfive', '$rightAnsfive'),";

			mysqli_query($conn, $query);
			mysqli_query($conn, $queryQ);
			mysqli_query($conn, $queryOp);
			header('Location: exam.php');

		}

	}
	else{
		header('Location: login.php');
	}
?>


	<form class="create_form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<h1 style="text-align
		: center;">Insert The Exam Data</h1>
		<br>
		<div class="inline">
			<div>
				<lable>Exam No: </lable>
		
				<input type="text" name="examNo" placeholder="ExamNo" required="required">
			</d
			iv>
			<di
			v>
				<label>Exam Name: </label>
				<input type="text" name="examName" placeholder="Exam Name" required="required">
			</div>
			<div>
				<label>Subject: </label>
				<input type="text" name="subject" placeholder="Subject" required="required">
			</div>
		</div>
		<br>
		<div class="inline">
			<div id="qN">
				<label for="questionNo">Question No: </label>
				<select id="questionNo" name="questionNoOne">
					<option value="1" selected="selected">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div id="qn">
				<label>Question: </label>
				<input type="text" name="questionOne" placeholder="Question" >
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option A: </label>
				<input type="text" name="optionAone" placeholder="Option A">
			</div>
			<div>
				<label>Option B: </label>
				<input type="text" name="optionBone" placeholder="Option B">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option C: </label>
				<input type="text" name="optionCone" placeholder="Option C">
			</div>
			<div>
				<label>Option D: </label>
				<input type="text" name="optionDone" placeholder="Option D">
			</div>
		</div>
		<div class="inline">
			<label>Right Anwser: </label>
			<input type="text" name="rightAnsone" placeholder="Right Answer">
		</div>
		<br>

		<div class="inline">
			<div id="qN">
				<label for="questionNo">Question No: </label>
				<select id="questionNo" name="questionNoTwo">
					<option value="1">1</option>
					<option value="2" selected="selected">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div id="qn">
				<label>Question: </label>
				<input type="text" name="questionTwo" placeholder="Question">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option A: </label>
				<input type="text" name="optionAtwo" placeholder="Option A">
			</div>
			<div>
				<label>Option B: </label>
				<input type="text" name="optionBtwo" placeholder="Option B">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option C: </label>
				<input type="text" name="optionCtwo" placeholder="Option C">
			</div>
			<div>
				<label>Option D: </label>
				<input type="text" name="optionDtwo" placeholder="Option D">
			</div>
		</div>
		<div class="inline">
			<label>Right Anwser: </label>
			<input type="text" name="rightAnstwo" placeholder="Right Answer">
		</div>
		<br>
		
		<div class="inline">
			<div id="qN">
				<label for="questionNo">Question No: </label>
				<select id="questionNo" name="questionNoThree">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3" selected="selected">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div id="qn">
				<label>Question: </label>
				<input type="text" name="questionThree" placeholder="Question">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option A: </label>
				<input type="text" name="optionAthree" placeholder="Option A">
			</div>
			<div>
				<label>Option B: </label>
				<input type="text" name="optionBthree" placeholder="Option B">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option C: </label>
				<input type="text" name="optionCthree" placeholder="Option C">
			</div>
			<div>
				<label>Option D: </label>
				<input type="text" name="optionDthree" placeholder="Option D">
			</div>
		</div>
		<div class="inline">
			<label>Right Anwser: </label>
			<input type="text" name="rightAnsthree" placeholder="Right Answer">
		</div>
		<br>
		
		<div class="inline">
			<div id="qN">
				<label for="questionNo">Question No: </label>
				<select id="questionNo" name="questionNoFour">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4" selected="selected">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div id="qn">
				<label>Question: </label>
				<input type="text" name="questionFour" placeholder="Question">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option A: </label>
				<input type="text" name="optionAfour" placeholder="Option A">
			</div>
			<div>
				<label>Option B: </label>
				<input type="text" name="optionBfour" placeholder="Option B">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option C: </label>
				<input type="text" name="optionCfour" placeholder="Option C">
			</div>
			<div>
				<label>Option D: </label>
				<input type="text" name="optionDfour" placeholder="Option D">
			</div>
		</div>
		<div class="inline">
			<label>Right Anwser: </label>
			<input type="text" name="rightAnsfour" placeholder="Right Answer">
		</div>

		<br>
		
		<div class="inline">
			<div id="qN">
				<label for="questionNo">Question No: </label>
				<select id="questionNo" name="questionNoFive">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5" selected="selected">5</option>
				</select>
			</div>
			<div id="qn">
				<label>Question: </label>
				<input type="text" name="questionFive" placeholder="Question">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option A: </label>
				<input type="text" name="optionAfive" placeholder="Option A">
			</div>
			<div>
				<label>Option B: </label>
				<input type="text" name="optionBfive" placeholder="Option B">
			</div>
		</div>
		<div class="inline">
			<div>
				<label>Option C: </label>
				<input type="text" name="optionCfive" placeholder="Option C">
			</div>
			<div>
				<label>Option D: </label>
				<input type="text" name="optionDfive" placeholder="Option D">
			</div>
		</div>
		<div class="inline">
			<label>Right Anwser: </label>
			<input type="text" name="rightAnsfive" placeholder="Right Answer">
		</div>
		<div class="submit_b">
			<button type="submit" name="insert_b">Submit</button>
		</div>
	</form>
	<br>
		
	



<?php include('./inc/footer.html') ?>
