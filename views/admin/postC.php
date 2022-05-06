<?php


include "../../entities/categorie.php";
include "../../cores/categorieC.php";


if ( isset($_POST['marketName']) ) {
	//$prod = new categorieC($_POST['marketName'], "marketLogo");

	// upload file
   // $allowedExtensions = array(".zip", ".jar", ".png");
	//$imageUniqueName = md5(uniqid(rand(), true)) . $_FILES["image"]["tmp_name"];
	$uploadOk = 1;

	$filename = $_FILES["marketLogo"]["name"];
    $tempname = $_FILES["marketLogo"]["tmp_name"]; 
	$target_dir = "../../uploads/".$filename;



	if (move_uploaded_file($tempname, $target_dir)) {
		echo "The file  has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	//$prod->setmarketLogo("http://localhost/projetweb/uploads/" . $_FILES["marketLogo"]["name"]);


	$prodC = new categorieC();
	$prodC->ajoutercategorie($_POST['marketName'], $_FILES["marketLogo"]["name"]);
	header('Location:  afficherC.php');
} else {
	echo "ajout failed";
}

?>