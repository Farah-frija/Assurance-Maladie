<?php
include ('config/dbConnection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filter = '';
if(!strstr($_SERVER['REQUEST_URI'], 'list_customers.php') && !empty($_GET['id'])) {
	$filter = " where id = '". $_GET['id'] ."'";
}






// query to retrieve customer data
$cust_sql = "SELECT * FROM assuré $filter ORDER BY id DESC";

if (!empty($_GET['id']))
$cust_sql1 = "SELECT bulletin.idbulletin, cause, bulletin.idintervenant, assuré.id , contrat.numcontrat, lien, nomintervenant, prenomintervenant, dateacte, nomacte, mp FROM bulletin, intervenant, acte_medical, contrat, assuré WHERE assuré.id= '" . $_GET['id'] . "' and bulletin.idintervenant = intervenant.idintervenant AND acte_medical.idacte = intervenant.id_act AND acte_medical.idcontrat = contrat.numcontrat AND assuré.id = bulletin.id";
else
$cust_sql1 = "SELECT bulletin.idbulletin, cause, bulletin.idintervenant, assuré.id , contrat.numcontrat, lien, nomintervenant, prenomintervenant, dateacte, nomacte, mp FROM bulletin, intervenant, acte_medical, contrat, assuré WHERE  bulletin.idintervenant = intervenant.idintervenant AND acte_medical.idacte = intervenant.id_act AND acte_medical.idcontrat = contrat.numcontrat AND assuré.id = bulletin.id";
$cust_res = mysqli_query($con, $cust_sql);
$cust_res1 = mysqli_query($con, $cust_sql1);

$result = array();
if(strstr($_SERVER['REQUEST_URI'], 'list_customers.php')) {
	while ($row = mysqli_fetch_assoc($cust_res)) {
	    $result[] = $row;
	}
} else {
	$result = mysqli_fetch_assoc($cust_res);
}


$result1 = array();
if (strstr($_SERVER['REQUEST_URI'], 'list_customers.php')) {
	// Code to be executed if the current page is 'list_customers
  
	while ($row1 = mysqli_fetch_assoc($cust_res1)) {
		$result1[] = $row1;
	}
} else {
	$result1 = mysqli_fetch_assoc($cust_res1);
}

