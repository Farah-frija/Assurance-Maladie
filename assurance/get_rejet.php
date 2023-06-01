<?php
include ('config/dbConnection.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);// Récupérer les données de la table CauseRejet


if (!empty($_POST['cause'])) {
	$selectedCause = $_POST['cause'];
	$libellé = '';

	foreach ($resultCauseRejet as $row3) {
		if ($row3['code'] == $selectedCause) {
			$libellé = $row3['libellé'];
			break;
		}
	}

	if (!empty($libellé)) {
		// Update the "cause" column in the "bulletin" table
		
        $id1 = $result2['idbulletin'];
		
        $updateQuery = "UPDATE bulletin SET cause = '" . $libellé . "' WHERE idbulletin = " . $id1;

		if (mysqli_query($con, $updateQuery)) {
            // Query executed successfully
            echo "Update query executed successfully.";
        } else {
            // Error occurred during query execution
            echo "Error: " . mysqli_error($con);
        }
	}
	else
	echo ".$libellé";
}