<?php 
	require_once('connection.php');
	session_start();
	if (isset($_SESSION['User'])) {
		$name = mysqli_real_escape_string($conn,$_GET['id']);
		$query = mysqli_query($conn, "SELECT * FROM result WHERE user = '$name'");

		$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
	}
 ?>

<?php include('./inc/header.html'); ?>

<h1 style="text-align: center;">Result</h1>
<h1 style="text-align: center;">Detail of <?php echo $name; ?></h1>
<div class="detail_result">
	<table>
		<tr>
			<th>Exam No</th>
			<th>Exam Name</th>
			<th>Right Answer</th>
			<th>Wrong Answer</th>
			<th>Mark</th>
		</tr>
		<?php foreach($results as $result): ?>
		<tr>
			<td><?php echo $result['examNo'] ?></td>
			<td><?php echo $result['examName'] ?></td>	
			<td><?php echo $result['rightAns'] ?></td>
			<td><?php echo $result['wrongAns'] ?></td>
			<td><?php echo $result['Mark'] ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	
</div>

<?php include('./inc/footer.html'); ?>
