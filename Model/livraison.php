<?php
class livraison{
    private const nomprd = null;
    private const quantite= null;

    private const idL = null;
    private const dateL = null;
    private const prix = null;
    
    private const livreur = null;
    function __construct(string $nomprd,int $quantite ,string $dateL,float $prix,string $livreur)
    {
        $this->nomprd=$nomprd; 
        $this->quantite=$quantite;
        $this->dateL=$dateL;
        $this->prix=$prix;
        $this->livreur=$livreur;
    }
    function getnomprd(): string{
        return $this->nomprd;
    }function getquantite(): int{
        return $this->quantite;
    }
    function getIdL(): int{
        return $this->idL;
    }
    
    function getDateL(): string{
        return $this->dateL;
    }
    
    function getPrix(): float{
        return $this->prix;
    }

   function getLivreur(): string{
        return $this->livreur;
    }
    
    function setnomprd(string $nomprd): void{
        $this->nomprd=$nomprd;

    }function setquantite(string $quantite): void{
        $this->quantite=$quantite;
    }
    
    function setDateL(string $dateL): void{
        $this->dateL=$dateL;
    }
    function setPrix(float $prix): void{
        $this->prix=$prix;
    }
   
}
?>