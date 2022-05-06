
<?php

include_once '../Model/livreur.php';
include_once '../Controller/livreurC.php';
$livreurC = new livreurC();
$listeC = $livreurC->afficherLivreur();


if (
    isset($_POST["nom"]) && 
     isset($_POST["type"]) && 
    isset($_POST["numtel"])&& 
    isset($_POST["adresse"])

) {
    if (
        !empty($_POST["nom"]) && 
        !empty($_POST["type"]) && 
        !empty($_POST["numtel"]) && 
        !empty($_POST["adresse"]) 

    ) {
        if(!(strlen($_POST['numtel'])!=8 || strlen($_POST['nom'])>15 || strlen($_POST['type'])>15))
        {
            
        
        
        $livreur = new livreur(
            $_POST['nom'],
            $_POST['type'],
            $_POST['numtel'],
            $_POST['adresse']

        );
        $livreurC->ajouterLivreur($livreur);
        
        header('Location:backLivreur.php');
    }
    }
    else
        $error = "Missing information";
}
?>


<link rel="stylesheet" href="back.css" type="text/css" media="all" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<script src="js/saisie.js"></script>
<body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Strikers admin dashboard</a></h1>
      <div id="top-navigation"><a href="logout.php">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
    <ul>
        <li><a href="backLivraison.php" class="active"><span>Gestion panier</span></a></li>
        <li><a href="backLivreur.php" class="active"><span>Gestion commande</span></a></li>
      
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
    
    <!-- End Message OK -->
    <!-- Message Error -->
    
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
       
          <!-- Box Head -->
      <!--     <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
             <form method="POST" action="backLivreur.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="det"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
             
              <option value="id">ID</option>
    <option value="nom">Nom</option>
    <option value="type">Type</option>
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div> -->
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>id</th>
                <th>Nom</th>
            
                <th>Type</th>
                <th>Numtel</th>
                <th>adresse</th>

                
              
               
              </tr>

              

              <?php
    foreach($listeC as $livreur){
        ?>


              <tr>
                <td><?php echo $livreur['id']; ?></td>
                <td><?php echo $livreur['nom']; ?></td>
                 
                <td><?php echo $livreur['type']; ?></td>
                <td><?php echo $livreur['numtel']; ?></td>
                <td><?php echo $livreur['adresse']; ?></td>

               
               
                <td><a href="supprimerLivreur.php?id=<?php echo $livreur['id']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierLivreur.php?id=<?php echo $livreur['id']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>
              
              
              
              
              
              
            
           
            </table>
            </table>
<form method="post">
<label>Rechercher </label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>
</body>
</html>
<?php

$con = new PDO("mysql:host=localhost;dbname=projet",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `livreur` WHERE id = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>                <th>id</th>

				<th>Nom</th>
                <th>type</th>
                <th>numtel</th>
                <th>adresse</th>

			</tr>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->nom;?></td>
				<td><?php echo $row->type;?></td>
				<td><?php echo $row->numtel;?></td>
                <td><?php echo $row->adresse;?></td>


            </tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>

            <!-- End Pagging -->

          </div>
          <!-- Table -->
      
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Product</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom et prenom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              <p> 
                <label>type </label>
                <input type="text" class="field size1" name="type" id="type"/>
              </p>


              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" id="numtel" />
              </p>
              <p> 
                <label>adresse </label>
                <input type="text" class="field size1" name="adresse" id="adresse" />
              </p>
          
              

            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();"/>
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label>select all</label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <!-- <div class="sort">
              <form method="POST"><label>Sort by</label>
              <select name="tri" class="field" >
              
                <option value="id">ID</option>
                <option value="nom">Nom</option>
                <option value="type">Type</option>
                
              </select><input type="submit"  value="trier"></form>
              
            </div> -->
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <div id="piechart"> </div>
    <!-- Main -->
  </div>
</div>



<!-- End Container -->
<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->




</body>
</html>

<script>
    function verif() {

var nom=document.getElementById('nom').value;
var type=document.getElementById('type').value;
var numtel=document.getElementById('numtel').value;
var numtel=document.getElementById('adresse').value;



if (nom.length === 0 || type.length === 0 || numtel.length===0) {
    alert("Vérifier vos donneés ");
}
else {
if (nom.length >15)
{
    alert("Votre nom doit avoir une longueur inférieur à 15 caractères");
}
else {

if (type.length >15)
{
    alert("Votre type doit avoir une longueur inférieur à 15 caractères");
}

else{

if (numtel.length!=8)
{
    alert("Votre numero de telephone  doit s'ecrire sur 8 chiffres");
}


}
}
}














}
</script>