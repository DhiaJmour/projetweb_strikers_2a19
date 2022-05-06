<?php
include_once("C:\\xampp\\htdocs\\test\\config.php");
include_once("C:\\xampp\\htdocs\\test\\Model\\livreur.php");
class livreurC
{
    function afficherLivreur(){
        $sql="select * from livreur";
        $db = config::getConnexion(); 
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
public function ajouterLivreur($livreur){
    $sql="insert into livreur(nom,type,numtel,adresse) values(:nom,:type,:numtel,:adresse)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        
        'nom'=>$livreur->getNom(),
        'type'=>$livreur->getType(),
        'numtel'=>$livreur->getNumtel(),
        'adresse'=>$livreur->getadresse()

       
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}



public function afficherLivreurDetail(int $rech1)
    {
        $sql="select * from livreur where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
public function supprimerLivreur($id)
{
    $sql = "DELETE FROM livreur WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function modifierLivreur($id,$livreur) {
    $sql="UPDATE livreur set nom=:nom,type=:type,numtel=:numtel,adresse=:adresse where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $livreur->getNom(),
            'type' => $livreur->getType(),
            'numtel' => $livreur->getNumtel(),
            'adresse' => $livreur->getadresse()

        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }


}

?>