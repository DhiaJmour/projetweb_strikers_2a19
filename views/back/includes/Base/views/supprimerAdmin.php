<?PHP
include "../core/employeC.php";
$AdminC=new AdminC();
if(isset($_POST['Supp_btn']))
	$AdminC->supprimerAdmin($_POST['Supp_user']);
	header('Location: ../../../register.php');


?>