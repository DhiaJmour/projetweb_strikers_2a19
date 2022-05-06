<html>
<?php
include "../../cores/produitC.php" ;
include "../../entities/produit.php" ;
  //require 'connect.php';
  $livraisonC = new PDO('mysql:host=localhost;dbname=web', 'root', '');
  $livraison1C = $livraisonC->prepare('SELECT ref,categ,name,price,carac,image,quantity FROM products  ');
  $executeIsOK = $livraison1C->execute();
  $listelivraison= $livraison1C->fetchAll();

 ?>
 <body  onload="window.print();" >
     
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <br>
          <i class="fa fa-globe"></i> Liste des voitures
          <small class="pull-right"></small>
        </h2>
      </div>
</section>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col"> ref</th>
      <th scope="col">categ</th>
      <th scope="col">nom</th>
      <th scope="col">prix</th>
      <th scope="col">carac</th>
      <th scope="col">quantity</th>
   

    </tr>
  </thead>
  <tbody>
          <?PHP
foreach($listelivraison as $com)
  ?>
  <tr>
  <td><?PHP echo $com['ref']; ?></td>
  <td><?PHP echo $com['categ']; ?></td>
  <td><?PHP echo $com['name']; ?></td>
  <td><?PHP echo $com['price']; ?></td>
  <td><?PHP echo $com['carac']; ?></td>
  <td><?PHP echo $com['quantity']; ?></td>

  <td> 
  </td>
                
  </tr>

    </tbody>
</table>
</body>
</html>