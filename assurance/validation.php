<?php
	// define variables and set to empty values
     $nameErr = $emailErr = $genderErr = $numberErr = $addressErr = $cityErr = $pincodeErr = $ownedVehicleErr = $dobErr = $customerPhotoErr = ""; 
     $name = $email = $gender = $number = $address = $city = $pincode = $ownedVehicle = $detailsGiven = $dob = $customerPhoto = "";

     $isError = 0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//print_r($_POST);
		if (empty($_POST["name"])) {
           $nameErr = "le nom est obligatoire";
           $isError = 1;
        } else {
           $name = $_POST["name"];
        }
        if (empty($_POST["name1"])) {
         $nameErr = "le prenom est obligatoire";
         $isError = 1;
      } else {
         $name1 = $_POST["name1"];
      }
 

        if (empty($_POST["gender"])) {
           $genderErr = "Gender is required";
           $isError = 1;
        } else {
           $gender = $_POST["gender"];
        }

        if (empty($_POST["mobile_number"])) {
           $numberErr = "lien parenté obligatoire";
           $isError = 1;
        } else {
           $number = $_POST["mobile_number"];
        }
        if (empty($_POST["contrat"])) {
         $contraterr = "Num du contrat obligatoire";
         $isError = 1;
      } else {
         $contrat = $_POST["contrat"];
      }


        if (empty($_POST["dob"])) {
           $dobErr = "DOB is required";
           $isError = 1;
        } else {
           $dob = $_POST["dob"];
        }

        if ( empty($_FILES['customer_photo']['name']) ) {
       
     
             $customer_photo = $_FILES['customer_photo']['name'];

        	$img_type = $_FILES['customer_photo']['type'];
        	$ext = strtolower(substr(strrchr($_FILES['customer_photo']['name'], "."), 1));
           	
        }
	}


    function validateDate($date) {
	    $d = DateTime::createFromFormat('d-m-Y', $date);
	    return $d && $d->format('d-m-Y') === $date;
	}

	function validateImage($type, $ext) {
		$mime = array(
				  'image/gif' => 'gif',
                  'image/jpeg' => 'jpeg',
                  'image/png' => 'png',
                  //'application/x-shockwave-flash' => 'swf',
                  //'image/psd' => 'psd',
                  'image/bmp' => 'bmp',
                  //'image/tiff' => 'tiff',
                  //'image/tiff' => 'tiff',
                  //'image/jp2' => 'jp2',
                  //'image/iff' => 'iff',
                  //'image/vnd.wap.wbmp' => 'bmp',
                  //'image/xbm' => 'xbm',
                  //'image/vnd.microsoft.icon' => 'ico'
                  );
		$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
		if( !key_exists($type, $mime) || !in_array($ext, $image_extensions_allowed) ) {
			return false;
		} else {
			return true;
		}
	}
?>