
<?php  
	require_once('connection.php');
	session_start();
	if(isset($_SESSION['User'])) {

		//$count = 0;
		//$right = 0;
		//$wrong = 0;
		$user = $_SESSION['User'];
		$queryName = mysqli_query($conn, "SELECT * FROM users WHERE email = '$user'");
		$nameRow = mysqli_fetch_array($queryName);
		$name = $nameRow['name'];
		
		
		$query = mysqli_query($conn, "SELECT * FROM select_user_ans WHERE userName = '$name'");
		$array = mysqli_fetch_all($query, MYSQLI_ASSOC);
		foreach ($array as $ex) {
			
			$examNo = $ex['examNo'];
			$questionNo = $ex['questionNo'];
			$query1 = mysqli_query($conn, "SELECT * FROM options WHERE examNo = '$examNo' AND questionNo = '$questionNo'");
			$array1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);

			$examQuery = mysqli_query($conn, "SELECT * FROM exam WHERE examNo = '$examNo'");
			$examFetch = mysqli_fetch_array($examQuery);
			$exams =mysqli_fetch_all($examQuery, MYSQLI_ASSOC);
			$exName = $examFetch['examName'];
			foreach ($array1 as $ex1) {
				if($ex1['rightAns'] == $ex['select_ans']){
					$updateAns = mysqli_query($conn, "UPDATE select_user_ans SET right_wrong = 1 WHERE examNo = '$examNo' AND questionNo = '$questionNo' AND userName = '$name'");
					$count1 = mysqli_query($conn, "SELECT count(right_wrong) AS count1 FROM select_user_ans WHERE right_wrong = 1 AND userName = '$name' AND examNo = '$examNo'");
					$right = $count1->fetch_object()->count1;
				}
				else{	
					$updateAns = mysqli_query($conn, "UPDATE select_user_ans SET right_wrong = 0 WHERE examNo = '$examNo' AND questionNo = '$questionNo' AND userName = '$name'");	
					
				}
				$count2 = mysqli_query($conn, "SELECT count(right_wrong) AS count2 FROM select_user_ans WHERE right_wrong = 0 AND userName = '$name' AND examNo = '$examNo'");
				$wrong = $count2->fetch_object()->count2;
			}
			
					//echo $right;
			
			$qry=mysqli_query($conn,"SELECT * FROM result WHERE examNo = '$examNo' AND examName = '$exName' AND user = '$name'");
			$rowCheck=mysqli_num_rows($qry);
			if ($rowCheck>0) {
		        //$qry2=mysqli_query($con,"UPDATE result SET rightAns = '$right', wrongAns = '$wrong', Mark='$right', user = '$name', examNo = '$examNo', examName = '$exName'");  
		    }
		    else{
		        $qry=mysqli_query($conn, "INSERT INTO result(user,examName,examNo,rightAns,wrongAns,Mark) VALUES ('$name', '$exName', '$examNo', '$right', '$wrong', '$right')");
		    }	
		    
			
		}
		$queryResult = mysqli_query($conn, "SELECT * FROM result WHERE user = '$name'");
		$results = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
		
		
		//$qry2=mysqli_query($conn, "INSERT INTO result(user,examName,examNo,rightAns,wrongAns,Mark) VALUES('$name','$exName','$examNo','$right','$wrong','$right')");
		
	    
			
	}
	

?>
<?php include('./inc/header_user.html') ?>
<div class="exam_list">
	
	<table>
		<tr>
			<th style="width: 7%">Exam No</th>
			<th>Exam Name</th>
			<th>Right Answer</th>
			<th>Wrong Answer</th>
			<th>Mark</th>
			
			

		</tr>
		
		<?php foreach ($results as $result): ?>	
		<tr>
			<td><?php echo $result['examNo']; ?></td>
			<td><?php echo $result['examName']; ?></td>
			<td><?php echo $result['rightAns']; ?></td>
			<td><?php echo $result['wrongAns']; ?></td>
			<td><?php echo $result['Mark']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>



<?php include('./inc/footer.html') ?>