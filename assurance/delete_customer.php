<?php
include('config/config.php');
include'config/dbConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userid = '';
$targetFolder = 'uploads/customer_photo/'; // Relative to the root

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// delete multiple customer data
	$userid = isset($_POST['id']) ? implode(',', $_POST['id']) : '';
} else {
	// delete single customer data
	$userid = $_GET['id'];
}

/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if(empty($userid)) {
	$extra = 'list_customers.php?msg=No record selected to delete';
} else {
	// query to get customer photo details
	$cust_data = mysqli_query($con,"select id, customer_photo from assuré where id in ($userid)");
	while ($row = mysqli_fetch_assoc($cust_data)) {
		$file = $row['customer_photo'];
		// remove customer photo
    	if( file_exists($targetFolder.$file) ) {
    		unlink($targetFolder.$file);
    	}
	}

	$delete_query1 = "DELETE FROM bulletin WHERE id IN ($userid)";
	$delete_query2 = "DELETE FROM assuré WHERE id IN ($userid)";
	
	// Execute the delete queries
	$success1 = mysqli_query($con, $delete_query1);
	$success2 = mysqli_query($con, $delete_query2);
	
	if ($success1 && $success2) {
		$extra = 'list_customers.php?msg=Record deleted successfully';
	} else {
		$extra = 'list_customers.php?msg=Failed to delete record';
	}
}
	header("Location: http://$host$uri/$extra");
exit();
?>