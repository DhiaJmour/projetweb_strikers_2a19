<?PHP

include "../../config.php";


class productsC
{
	function ajouterproducts($products)
	{
	
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
	function rechercheprod($key)
	{
		$sql = "SELECT * FROM products WHERE name LIKE '%$key%' OR categ LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
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
	function recuperer($ref)
	{
		$sql = "SELECT * from products where ref= $ref";
		$db = config::getConnexion();

		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierproduit($products, $ref)
	{
		$sql = "UPDATE products SET ref= :ref,categ= :categ,name= :name,price= :price,carac= :carac,quantity= :quantity WHERE ref= $ref";
        $db = config::getConnexion();
		try {
            $req = $db->prepare($sql);
			$datas = array(':ref' => $products->getref(), ':categ' => $products->getcateg(), ':name' => $products->getname(), ':price' => $products->getprice(), ':carac' =>  $products->getcarac(), ':quantity' =>  $products->getquantity());
			$req->bindValue(':ref', $ref);
			$req->bindValue(':categ', $categ);
			$req->bindValue(':name', $name);
			$req->bindValue(':price', $price);
			$req->bindValue(':carac', $carac);
			$req->bindValue(':quantity', $quantity);
		

			$s = $req->execute();
		} catch (Exception $e) {
			echo " Erreur ! " . $e->getMessage();
			echo " Les datas : ";
			print_r($datas);
		}
	}

	
}
