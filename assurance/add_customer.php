<?php
	include 'config/dbConnection.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	ini_set('post_max_size', '64M');
	ini_set('upload_max_filesize', '64M');

	$targetFolder = 'uploads/customer_photo/'; // Relative to the root

	if(!empty($_FILES['customer_photo']['name'])) {
		$tempFile = $_FILES['customer_photo']['tmp_name'];
    	$oldFileName = $_FILES['customer_photo']['name'];

    	$path_info = pathinfo($_FILES['customer_photo']['name']);
    	$file = time() . "." . $path_info['extension'];
    	$targetFile = $targetFolder . $file;

    	if( !@move_uploaded_file($tempFile, $targetFile) ) {
    		$customerPhotoErr = "Error while file uploading, please try again";
           	$isError = 1;
           	return;
    	}
	}

	// query to insert customer data
	$query = "insert into assuré (lien, id_contrat, name, prenom, gender, dob, customer_photo) values ('$number', '$contrat', '$name', '$name1', '$gender',  '$dob', '$file')";
	
		
	//echo $query;
	$success = mysqli_query($con, $query);
    //echo mysql_insert_id();exit;

	/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

	if($success) {
		$extra = 'list_customers.php?msg=Record inserted successfully';
	} else {
		$err_msg = 'MySQL Insert Error: ' . mysqli_error($con);
		echo $err_msg;
		exit;
		//$extra = 'new_customer.php?msg='.$err_msg;
	}
	header("Location: http://$host$uri/$extra");
	exit();
?>
