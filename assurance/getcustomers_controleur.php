<?php
include ('config/dbConnection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// query to retrieve customer data
if(!empty($_GET['idbull']))
$cust_sql2 ="select name,customer_photo,prenom,gender,dob,bulletin.idbulletin, cause, bulletin.idintervenant, assuré.id as id, contrat.numcontrat, lien, nomintervenant, prenomintervenant, dateacte, nomacte, mp FROM bulletin, intervenant, acte_medical, contrat, assuré WHERE idbulletin='" . $_GET['idbull'] . "'and  bulletin.idintervenant = intervenant.idintervenant AND acte_medical.idacte = intervenant.id_act AND acte_medical.idcontrat = contrat.numcontrat AND assuré.id = bulletin.id ";
else
$cust_sql2 ="select name,prenom,gender,dob,bulletin.idbulletin, cause, bulletin.idintervenant, assuré.id as id, contrat.numcontrat, lien, nomintervenant, prenomintervenant, dateacte, nomacte, mp FROM bulletin, intervenant, acte_medical, contrat, assuré WHERE   bulletin.idintervenant = intervenant.idintervenant AND acte_medical.idacte = intervenant.id_act AND acte_medical.idcontrat = contrat.numcontrat AND assuré.id = bulletin.id ";


$cust_res2 = mysqli_query($con, $cust_sql2);




$result2 = array();
if (strstr($_SERVER['REQUEST_URI'], 'list_customers.php' )) {
	// Code to be executed if the current page is 'list_customers'
	while ($row2 = mysqli_fetch_assoc($cust_res2)) {
		$result2[] = $row2;
	}
	
} else if (strstr($_SERVER['REQUEST_URI'], 'view_customer.php')) {
	// Code to be executed if the current page is 'bulletincontroleur.php'

	$result2 = mysqli_fetch_assoc($cust_res2);
	$result4=mysqli_fetch_assoc($cust_res2);
	
}

if (strstr($_SERVER['REQUEST_URI'], 'controleur.php' )) {
	// Code to be executed if the current page is 'list_customers'
	while ($row2 = mysqli_fetch_assoc($cust_res2)) {
		$result2[] = $row2;
	}
	
} else if (strstr($_SERVER['REQUEST_URI'], 'bulletin.php')) {
	// Code to be executed if the current page is 'bulletincontroleur.php'

	$result2 = mysqli_fetch_assoc($cust_res2);
	$result4=mysqli_fetch_assoc($cust_res2);
	
}
$sqlCauseRejet = "select code, libellé from causerejet";
$cust_res3 = mysqli_query($con, $sqlCauseRejet);
$resultCauseRejet = array();
if (strstr($_SERVER['REQUEST_URI'], 'bulletincontroleur.php')) {
	while ($row3 = mysqli_fetch_assoc($cust_res3)) {
		$resultCauseRejet[] = $row3;
	}
} else {
	$resultCauseRejet = mysqli_fetch_all($cust_res3, MYSQLI_ASSOC);
}

