<?php
	$conn = mysqli_connect('localhost', 'root', '', 'onlineExam');

	if(!$conn){
		die('Please Check Your Internet'.mysqli_error($conn));
	}
?>