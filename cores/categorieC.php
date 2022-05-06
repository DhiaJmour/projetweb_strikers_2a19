<?PHP
include "../../config.php";
ob_start();

class categorieC
{
 
	function ajoutercategorie($n,$l)
	{
		 $sql = "INSERT INTO categorie (marketName,marketLogo) values (:marketName,:marketLogo) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':marketName', $n);
            $req->bindValue(':marketLogo', $l);

            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}

	function rechercheCateg($key)
	{
		$sql = "SELECT * FROM categorie WHERE marketName LIKE '%$key%' " ;
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function affichercategorie()
	{
		$sql = " SELECT * FROM categorie ";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimercategorie($id)
	{
		$sql = "DELETE FROM categorie where id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function recuperer($id)
	{
		$sql = "SELECT * from categorie where id=$id";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}
