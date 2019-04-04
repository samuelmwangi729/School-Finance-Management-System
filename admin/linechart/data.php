<?php
error_reporting(0);
	$conn = new mysqli("localhost", "root", "", "school2");
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//set timezone
	//date_default_timezone_set('Asia/Manila');
	$year = date('Y');
	$total=array();
	for ($class = 1; $class <= 4; $class ++){
		$sql="select *, sum(balance) as total from student where class='$class'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();

		$total[]=$row['total'];
	}

	$tjan = $total[0];
	$tfeb = $total[1];
	$tmar = $total[2];
	$tapr = $total[3];
	
	
	
?>