<?PHP
//include '../config.php';
//include("../config.php");
//include("../config.php");
//include("/cores/config.php");
include "../../config.php";

//include ("../views/config.php");

class productsC
{
	function ajouterproducts($products)
	{
		include "../config.php";
		require_once('../Model/produit.php');
		 $sql = "INSERT INTO products (ref,categ,name,price,carac,image,quantity) values (:ref, :categ, :name, :price, :carac,:image,:quantity) ";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':ref', $products->getref());
            $req->bindValue(':categ', $products->getcateg());
            $req->bindValue(':name', $products->getname());
			$req->bindValue(':price', $products->getprice());
			$req->bindValue(':carac', $products->getcarac());
			$req->bindValue(':image', $products->getimage());
			$req->bindValue(':quantity', $products->getquantity());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	

	function afficherproducts()
	{
		$sql = "SELECT * FROM products";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerproducts($ref)
	{
		include "../config.php";
		$sql = "DELETE FROM products where ref= :ref";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':ref', $ref);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function recuperer($id)
	{
		$sql = "SELECT * from categorie where ref=$id";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
