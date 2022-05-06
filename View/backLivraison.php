<?php

include_once '../Model/livraison.php';
include_once '../Controller/livraisonC.php';
include_once '../Controller/livreurC.php';
$livraisonC = new livraisonC();
$livreurC = new livreurC();
$listeC = $livraisonC->afficherLivraison();
$listeL =  $livreurC->afficherLivreur();

 function afficherLivraisonRech(string $rech1,string $selon)
    {
        $sql="select * from livraison where $selon like '".$rech1."%'";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

if (
    isset($_POST["adresse"]) && 
     isset($_POST["dateL"]) && 
    isset($_POST["prix"]) &&
    isset($_POST["livreur"]) 
) {
    if (
        !empty($_POST["adresse"]) && 
        !empty($_POST["dateL"]) && 
        !empty($_POST["prix"]) &&
        !empty($_POST["livreur"]) 
    ) {
        if(intval($_POST['prix'])<0)
        {
            echo "<script>alert('Le prix doit etre positif')</script>";
        }
        $livraison = new livraison(
            $_POST['adresse'],
            $_POST['dateL'],
            $_POST['prix'],
            $_POST['livreur']
        );
        $livraisonC->ajouterLivraison($livraison);
        
        header('Location:backLivraison.php');
    }
    else
        $error = "Missing information";
}
if (isset($_POST["tri"]))
{
    $listeC = $livraisonC->afficherLivraisonTri($_POST["tri"]);
}

if (isset($_POST["join"]))
{
    $listeC = $livraisonC->afficherLivraisonJoin();
}

if (isset($_POST["rech"]))
{
    $listeC = afficherLivraisonRech($_POST["rech"],$_POST["selon"]);
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
      <h1><a href="#">STRIKERS DASHBOARD</a></h1>
      <div id="top-navigation"><a href="logout.php">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
    <ul>
        <li><a href="backLivraison.php" class="active"><span>Gestion livraisons</span></a></li>
        <li><a href="backLivreur.php" class="active"><span>Gestion livreurs</span></a></li>
      
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
          <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
             <form method="POST" action="backLivraison.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="join"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
             
              <option value="idL">ID</option>
                <option value="livreur">nom</option>
                <option value="adresse">adresse</option>
                <option value="dateL">date</option>
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>idL</th>
                <th>Adresse</th>
            
                <th>dateL</th>
                <th>prix</th>
                <th>livreur</th>
                <?php if (isset($_POST["join"]))
{
echo "<th>idLivreur</th>";
echo "<th>typeLivreur</th>";
echo "<th>NumtelLivreur</th>";
} ?>
              
               
              </tr>

              

              <?php
    foreach($listeC as $livraison){
        ?>


              <tr>
                <td><?php echo $livraison['idL']; ?></td>
                <td><?php echo $livraison['adresse']; ?></td>
                 
                <td><?php echo $livraison['dateL']; ?></td>
                <td><?php echo $livraison['prix']; ?></td>
                <td><?php echo $livraison['livreur']; ?></td>
                <?php if (isset($_POST["join"]))
{
echo "<td>";echo $livraison['idL'];echo"</td>";
echo "<td>";echo $livraison['adresse'];echo"</td>";
echo "<td>";echo $livraison['prix'];echo"</td>";
echo "<td>";echo $livraison['dateL'];echo"</td>";
} ?>
               
                <td><a href="supprimerLivraison.php?id=<?php echo $livraison['idL']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierLivraison.php?id=<?php echo $livraison['idL']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>
              
              
              
              
              
              
            
           
            </table>
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
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" id="adresse"/>
              </p>
              <p> 
                <label>dateL </label>
                <input type="date" class="field size1" name="dateL" id="dateL"/>
              </p>


              <p> 
                <label>Prix </label>
                <input type="number" class="field size1" name="prix" id="prix" />
              </p>
          
              <label for="livreur-select">Livreur</label>

<select name="livreur" id="livreur-select">
    <?php foreach($listeL as $livraison){ ?>
    <option value="<?php echo  $livraison['nom'];?>"><?php echo  $livraison['nom'];?></option>
    <?php } ?>
</select>

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
            <h2></h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span></span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label></label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <form method="POST"><label>Sort by</label>
              <select name="tri" class="field" >
              <option value="idL">ID</option>
                <option value="livreur">nom</option>
                <option value="adresse">adresse</option>
                <option value="dateL">date</option>
                
              </select><input type="submit"  value="trier"></form>
            </br>

              <div class="btn-toolbar" role="toolbar" aria-label="Programmatic control">
        <div class="btn-group btn-group-sm" aria-label="Set Select2 option">
            <form>
                <input id="impression" class="btn nf" name="impression" type="button" onclick="imprimer_page()" value="Imprimer cette page" />
            </form>
        </div>
    </div>


              
            </div>
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
<script type="text/javascript">
        function imprimer_page(){
          NF = document.getElementsByClassName("nf");
            for (i = 0; i < NF.length; i++) {
                NF[i].style.display = "none";
            }
            window.print();
            for (i = 0; i < NF.length; i++) {
                NF[i].style.display = "block";
            }
        }
    </script>
