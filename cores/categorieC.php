<?PHP
include "../../config.php";
ob_start();

class categorieC
{
 
	function ajoutercategorie($categorie)
	{
		 $sql = "INSERT INTO categorie (marketName,marketLogo) values (:marketName,:marketLogo) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':marketName', $categorie->getMarketName());
            $req->bindValue(':marketLogo', $categorie->getMarketLogo());

            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
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
	
}
