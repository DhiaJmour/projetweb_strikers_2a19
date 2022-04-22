<script> 

   function ok()
  {
alert("Votre produit a été ajouté avec succès!");
  }

      
  function surligne(myForm, erreur)
{
   if(erreur)
      myForm.style.backgroundColor = "#fba";
   else
      myForm.style.backgroundColor = "";
}

  function verifNB(myForm)
{
   var  NB= parseInt(myForm.value);
   if(isNaN(NB) || NB < 0 )
   {
      surligne(myForm, true);
      return false;
   }
   else
   {
      surligne(myForm, false);
      return true;
   }
}

   function verifReff(myForm)
{  
  if(myForm.value.length==0)
   {
      surligne(myForm, true);
      return false;
   }
   else
   {
      surligne(myForm, false);
      return true;
   }

}



      
function verifform(f)
{
  
   var NBOk = verifqteP(f.NB);
    var refOk = verifReff(f.ref);
   
   if(NBOk && refOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
</script>
<?php 
include('includes/header.php');
include('includes/navbar.php');
include "../../config.php";

$req="select * from categorie";
$db=config::getConnexion();
$listC=$db->query($req) ;

if (isset($_POST['valider']))
{
  $req="insert INTO products(ref,categ,name,price,carac,image,quantity) values ('".$_POST['ref']."','".$_POST['categ']."','".$_POST['name']."',".$_POST['price'].",'".$_POST['carac']."','".$_POST['image']."','".$_POST['quantity']."')";
   
  $db=config::getConnexion();  
  $sql=$db->prepare($req); 
  $sql->execute(); 
 echo "<script> ok(); </script>" ;
 
}
/*

include "../../entities/produit.php";
include "../../cores/produitC.php";
include "../../entities/categorie.php";
include "../../cores/categorieC.php";
$cat = new categorieC();
$listC = $cat->affichercategorie();

if (isset($_POST['ref']) and isset($_POST['categ'])   and isset($_POST['name']) and isset($_POST['price']) and isset($_POST['carac']) and isset($_POST['quantity'])) {
	$prod = new product($_POST['ref'], $_POST['categ'], "image", $_POST['name'], $_POST['price'], $_POST['carac'],"image", $_POST['quantity']);


	// upload file
	$target_dir = "../uploads/";
	//$imageUniqueName = md5(uniqid(rand(), true)) . $_FILES["image"]["tmp_name"];
	$uploadOk = 1;

	$target_file = $target_dir . $_FILES["image"]["name"];

	var_dump($_FILES["image"]);
	var_dump($target_file);

	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	$prod->setimage("http://localhost/zanimo/uploads/" . $_FILES["image"]["name"]);


	$prodC = new productsC();
	$prodC->ajouterproducts($prod);
	header('Location:  afficherVeterinaire.php');
} else {
	echo "ajout failed";
}
*/

?>
<html>
<head>
<title> Ajouter des produits </title>
<meta charset="utf-8">
</head>
</br>
</br>
<body>
              <div class="card mb-3">
             <div class="card-header">
            <i class="fas fa-table"></i>
            Ajouter un nouveau produit
             </div>
                  <div class="card-body">
            <div class="table-responsive">
  
<form id="myForm" method="POST" onsubmit="return verifform(this)" > 


<label style="font-weight: bold"> Réference </label> 
<input type="text" class="form-control" name="ref" placeholder="Réference du produit" value="" onblur="verifReff(this)" style="width:200px"> </br>

     <label style="font-weight: bold"> Catégorie </label> 

     <select name="categ"> 
      <option>Choisissez une catégorie</option>
      <?php
foreach ($listC as $cat) 
{
  echo('<option> '.$cat['marketName'].' </option>'); 
}

?>


</select> 
</br> 
<label style="font-weight: bold"> Nom du produit </label> 
<input type="text" class="form-control" name="name" placeholder="Nom du produit" value="" onblur="verifReff(this)" style="width:500px"> </br>
<label style="font-weight: bold"> Prix vente en gros </label>
<label style="font-weight: bold"> Prix vente en ligne </label> 
 <input type="number" class="form-control" name="price" placeholder="Prix en Dt"value=""  onblur="verifNB(this)"  style="width:200px"><a style="font-weight: bold">Dt </a> </br> 

<label style="font-weight: bold"> Caractéristiques </label> 
<textarea type="text"  style="width:500px" name="carac"  > </textarea> </br>

<label style="font-weight: bold">Ajouter une photo</label>
<input type="file" class="form-control" name="image" > </br>
<label style="font-weight: bold">quantity</label>
<input type="number" class="form-control" name="quantity">
<input type="submit" value="valider" name="valider" action="produitmail.php"> 
<input type="reset" value="Reset"> 

</form>

</div>
</div>
   <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>  
</body>
</html>