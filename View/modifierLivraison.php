<link rel="stylesheet" href="back.css" type="text/css" media="all" />
<?php
 include_once '../Controller/livraisonC.php';
 include_once '../Controller/livreurC.php';
 
 $co = new livraisonC();
 $livreurC = new livreurC();
 $listeL =  $livreurC->afficherLivreur();
 if(isset($_GET['id'])){
   $livraisonC = new livraisonC();
   $listeC = $livraisonC->afficherLivraisonDetail($_GET['id']);
 
 foreach($listeC as $livraison){
 ?>
 <body>


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              
            <p> 
                <label>nom  </label>
                <input type="string" class="field size1" name="nomprd" value=<?php echo $livraison['nomprd'];?> />
              </p>
              <p> 
                <label>quantite </label>
                <input type="number" class="field size1" name="quantite" value=<?php echo $livraison['quantite'];?> />
              </p>
              <p> 
                <label>DateL </label>
                <input type="date" class="field size1" name="dateL" value=<?php echo $livraison['dateL'];?> />
              </p>


              <p> 
                <label>Prix </label>
                <input type="number" class="field size1" name="prix" value=<?php echo $livraison['prix'];}?> />
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
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 <?php
 // create event
 $livraison = null;

 // create an instance of the controller

 $livraisonC = new livraisonC();
 if (
  isset($_POST["nomprd"]) && 
  isset($_POST["quantite"]) && 

      isset($_POST["dateL"]) && 
     isset($_POST["prix"])
 ) {
     if (
      !empty($_POST["nomprd"]) && 
      !empty($_POST["quantite"]) && 

         !empty($_POST["dateL"]) && 
         !empty($_POST["prix"]) 
     ) {
         $livraison = new livraison(

                       $_POST['nomprd'],
                       $_POST['quantite'],
             $_POST['dateL'],
             $_POST['prix'],
             $_POST['livreur']
         );
        $livraisonC->modifierLivraison($_GET['id'],$livraison);
         
      header('Location:backLivraison.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>