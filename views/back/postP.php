<?php


include "../../entities/produit.php";
include "../../cores/produitC.php";


if (isset($_POST['ref']) and isset($_POST['categ'])   and isset($_POST['name']) and isset($_POST['price']) and isset($_POST['carac']) and isset($_POST['quantity'])) {
	$prod = new product($_POST['ref'], $_POST['categ'], $_POST['name'], $_POST['price'], $_POST['carac'],"image", $_POST['quantity']);


	// upload file
	$target_dir = "../../uploads/";
   // $allowedExtensions = array(".zip", ".jar", ".png");
	//$imageUniqueName = md5(uniqid(rand(), true)) . $_FILES["image"]["tmp_name"];
	$uploadOk = 1;

	$target_file = $target_dir . $_FILES["image"]["name"];

	var_dump($_FILES["image"]);
	var_dump($target_file);

	if (move_uploaded_file($_FILES["image"]["name"], $target_file)) {
		echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
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