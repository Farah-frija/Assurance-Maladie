<?php
include('config/config.php');
include('config/dbConnection.php');

//query to get total customer count for home page
	$cust_count = mysqli_query($con, "select count(1) as customer_count from assuré;");
	$result = mysqli_fetch_assoc($cust_count);
	$cust_count1 = mysqli_query($con, "SELECT COUNT(1) AS customer_count1 FROM bulletin WHERE cause != ''");
     $result1 = mysqli_fetch_assoc($cust_count1);

?>