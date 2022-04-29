<script> 
   
      
  function surligne(myform, erreur)
{
   if(erreur)
      myform.style.backgroundColor = "#fba";
   else
      myform.style.backgroundColor = "";
}

  function verifqteP(myform)
{
   var  qteP= parseInt(myform.value);
   if(isNaN(qteP) || qteP < 0 )
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }
}



 
  function verifRef(myform)
{  
  if(myform.value.length==0)
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }

}

function verifForm(f)
{
  
   var qtePOk = verifqteP(f.qteP);
    var refCOk = verifRef(f.refC);
  
   if(qtePOk && refCOk )
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les myforms");
      return false;
   }
}
 function ok()
  {
alert("Votre catégorie a été ajoutée avec succès!");
}
  </script>


<?php 
include('includes/header.php');
include('includes/navbar.php');
include "../../config.php";


 if (isset($_GET['id'])){
    
$req="select * from categorie where id='".$_GET['id']."'";
$db=config::getConnexion();
$result=$db->query($req) ;
   
 
	foreach($result as $row){
		$nom=$row['marketName'];
        $prenom=$row['marketLogo'];
        $image=$row['id'];
    
?>

<html>
<head>
<title> Ajouter CATEGORIE </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link href="cat.css" rel="stylesheet">
</head>
</br>
</br>
<head>
<body>
	 <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une nouvelle catégorie </div>
            
          <div class="card-body">
            <div class="table-responsive">

<fieldset align="center">
<form id="myform" method="POST" onsubmit="return verifForm(this)" > 
<label> Réference: </label>
<input type="text" class="form-control" value="<?PHP echo $image ?>" name="refC" placeholder="Saisir la réference" value="" onblur="verifRef(this)" style="width:500px">  </br>  

  
<label> Nom de la catégorie </label> 
<input type="text" class="form-control" value="<?PHP echo $nom ?>" name="marketName" placeholder="Saisir le nom" value="" style="width:500px"> </br>



<label> logo </label>

 <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">MARKET LOGO</label>
                        <input required name="marketLogo" type="file" class="form-control" id="exampleInputPassword1">
                    </div>







</h4>

<button type="submit" name="modifier" value="modifier" class="btn btn-common mr-3">modifier</button>

<input type="reset" value="Reset"> 
</form>

</fieldset>

<?php
   }
}

if (isset($_POST['modifier'])){
   $req="update  categorie SET marketName='".$_POST['marketName']."',marketLogo='".$_POST['marketLogo']."' where id='".$_GET['id']."'";
   $db=config::getConnexion(); 
  $sql=$db->prepare($req); 
  $sql->execute(); 
  echo "<script> ok(); </script>" ;


}
?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</br>
</br>
</br>
</br>

</body>
</html>
   <?php 
include('includes/scripts.php');
include('includes/footer.php');
?> 
 