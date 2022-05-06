<link rel="stylesheet" href="back.css" type="text/css" media="all" />
<?php
 include_once '../Controller/livreurC.php';
 
 
 if(isset($_GET['id'])){
   $livreurC = new livreurC();
   $listeC = $livreurC->afficherLivreurDetail($_GET['id']);
 
 foreach($listeC as $livreur){
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
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value="<?php echo $livreur['nom'];?>" />
              </p>
              <p> 
                <label>Type </label>
                <input type="text" class="field size1" name="type" value=<?php echo $livreur['type'];?> />
              </p>


              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" value=<?php echo $livreur['numtel'];}?> />
              </p>
              <p> 
                <label>adresse </label>
                <input type="text" class="field size1" name="adresse" value=<?php echo $livreur['adresse'];}?> />
              </p>
            

             

             
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
 $livreur = null;

 // create an instance of the controller

 $livreurC = new livreurC();
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
         $livreur = new livreur(
             $_POST['nom'],
             $_POST['type'],
             $_POST['numtel'],
             $_POST['adresse']


         );
        $livreurC->modifierLivreur($_GET['id'],$livreur);
         
      header('Location:backLivreur.php');
     }
     else
         $error = "Missing information";
 }

 


?>