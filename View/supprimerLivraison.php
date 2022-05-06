<?php
 include_once '../Controller/livraisonC.php';
 $co = new livraisonC();
 if(isset($_GET['id'])){
     $co->supprimerLivraison($_GET['id']);
 
    header('Location:backLivraison.php');
    }

 ?>