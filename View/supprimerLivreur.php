<?php
 include_once '../Controller/livreurC.php';
 $co = new livreurC();
 if(isset($_GET['id'])){
     $co->supprimerLivreur($_GET['id']);
 
    header('Location:backLivreur.php');
    }

 ?>