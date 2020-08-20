<?php 
	require_once('connection.php');
	session_start();
	if(isset($_SESSION['User'])){
		$query = mysqli_query($conn, "SELECT DISTINCT user FROM result");
		$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
	}
 ?>

<?php include('./inc/header.html') ?>

<?php echo '<h1 style="text-align: center;">'.'Result'.'</h1>' ?>


<div class="detail_result">
	<table>
		<tr>
			<th>Users</th>
			<th>Details</th>

		</tr>
		<?php foreach($results as $result): ?>
		<tr>		
			<td><?php echo $result['user']; ?></td>
			<td><a type="submit" href="result_details.php?id=<?php echo $result['user']; ?>">Detail</a></td>
		</tr>
		<?php endforeach; ?>	
	</table>		
</div>


<?php include('./inc/footer.html') ?>