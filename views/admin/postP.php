<?php


include "../../entities/produit.php";
include "../../cores/produitC.php";


if (isset($_POST['refC']) and isset($_POST['categ'])  and isset($_POST['name']) and isset($_POST['price']) and isset($_POST['carac']) and isset($_POST['quantity'])) {
	$prod = new product($_POST['refC'], $_POST['categ'], $_POST['name'], $_POST['price'], $_POST['carac'],"image", $_POST['quantity']);

	// upload file
   // $allowedExtensions = array(".zip", ".jar", ".png");
	//$imageUniqueName = md5(uniqid(rand(), true)) . $_FILES["image"]["tmp_name"];
	$uploadOk = 1;

	$filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"]; 
	$target_dir = "../../uploads/".$filename;



	if (move_uploaded_file($tempname, $target_dir)) {
		echo "The file  has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	$prod->setimage("http://localhost/projetweb/uploads/" . $_FILES["image"]["name"]);


	$prodC = new productsC();
	$prodC->ajouterproducts($prod);
	header('Location:  afficherP.php');
} else {
	echo "ajout failed";
}

?>