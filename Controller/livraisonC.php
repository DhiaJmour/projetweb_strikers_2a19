<?php
include "../config.php";
	require_once '../model/livraison.php';
class livraisonC
{
    function afficherLivraison(){
        $sql="select * from livraison";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
public function ajouterLivraison($livraison){
    $sql="insert into livraison(nomprd,quantite,dateL,prix,livreur) values(:nomprd,:quantite,:dateL,:prix,:livreur)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        
            'nomprd'=>$livraison->getnomprd(),
            'quantite'=>$livraison->getquantite(),
        'dateL'=>$livraison->getDateL(),
        'prix'=>$livraison->getPrix(),

        'livreur'=>$livraison->getLivreur()
       
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}




public function afficherLivraisonDetail(int $rech1)
    {
        $sql="select * from livraison where idL=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerLivraison($id)
{
    $sql = "DELETE FROM livraison WHERE idL=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function afficherLivraisonJoin(){
    $sql="select * from livraison inner join livreur on livraison.livreur=livreur.nom";
        
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function modifierLivraison($id,$livraison) {
    $sql="UPDATE livraison set nomprd=:nomprd,quantite=:quantite, dateL=:dateL,prix=:prix,livreur=:livreur where idL=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nomprd' => $livraison->getnomprd(),
            'quantite' => $livraison->getquantite(),

            'dateL' => $livraison->getDateL(),
            'prix' => $livraison->getPrix(),
            'livreur'=>$livraison->getLivreur()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
}

?>