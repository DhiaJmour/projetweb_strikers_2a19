<?php
class Categorie{
    private $id;
    private $marketName;
    private $marketLogo;
    function __construct($marketName,$marketLogo){
        $this->marketName=$marketName;
        $this->marketLogo=$marketLogo;
       
    
    }
    // getter 
    
    function getId(){
        return $this->id;
    }
    function getMarketName(){
        return $this->marketName;
    }
    function getMarketLogo(){
        return $this->marketLogo;
    }
   
    // setter 

function setId($id){
    $this->id=$id;
}
function setMarketName($marketName){
    $this->marketName=$marketName;
}
function setmarketLogo($marketLogo){
    $this->marketLogo=$marketLogo;
}


}
?>