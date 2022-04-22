<?PHP
class Admin{
	private $Username;
	private $Email;
	private $Password;
	
	function __construct($Username,$Email,$password){
		$this->user=$Username;
		$this->email=$Email;
		$this->pass=$password;
		
		
	}
	
	function getUser(){
		return $this->user;
	}
	function getEmail(){
		return $this->email;
	}
	function getPass(){
		return $this->pass;
	}


	/*function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setNbHeures($nbHeures){
		$this->nbHeures=$nbHeures;
	}
	function setTarifHoraire($tarifHoraire){
		$this->tarifHoraire=$tarifHoraire;
	}
	*/
}

?>