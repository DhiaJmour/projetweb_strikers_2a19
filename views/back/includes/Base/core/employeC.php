<?PHP

  class config {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }

class AdminC {
/*function afficherEmploye ($employe){
		echo "Cin: ".$employe->getCin()."<br>";
		echo "Nom: ".$employe->getNom()."<br>";
		echo "Prénom: ".$employe->getPrenom()."<br>";
		echo "tarif heure: ".$employe->getTarifHoraire()."<br>";
		echo "nb heures: ".$employe->getNbHeures()."<br>";
	}
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}*/
	function ajouterAdmin($admin)
	{
		$sql="insert into admin (Username,Email,Password) values (:User,:Email,:Pass)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $user=$admin->getUser();
        $email=$admin->getEmail();
        $pass=$admin->getPass();
        
       
		$req->bindValue(':User',$user);
		$req->bindValue(':Email',$email);
		$req->bindValue(':Pass',$pass);
		
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function supprimerAdmin($user){
		$sql="DELETE FROM admin where Username = :user";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':user',$user);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
function modifierAdmin($employe,$cin){
		$sql="UPDATE admin SET Username=:cinn, Email=:nom,Password=:prenom WHERE Username=:cin";
		
		$db =Config::getConnexion() ;
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  try{		
        $req=$db->prepare($sql);
		$cinn=$employe->getUser();
        $nom=$employe->getEmail();
        $prenom=$employe->getPass();
		$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
/*function recupererEmploye($user){
		$sql="SELECT * from admin where Username=$user";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}
?>