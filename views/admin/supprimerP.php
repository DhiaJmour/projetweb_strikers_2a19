<?PHP
include "../../cores/produitC.php";
$produitC =new productsC();
if (isset($_POST["ref"])){
	$produitC->supprimerproducts($_POST["ref"]);
	header('Location: afficherP.php');
}else{echo"failed";}

?>