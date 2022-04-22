<?php
$instance = NULL;

     function getConnexion() {
      if (!isset($instance)) {
		try{
        $instance = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
		$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return $instance;
    }
        $sql="SElECT * From admin";
		$db = getConnexion();
		try{
		$liste=$db->query($sql);}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
?>