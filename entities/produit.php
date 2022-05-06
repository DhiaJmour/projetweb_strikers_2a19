<?PHP
class product
{
    public $ref;
    
    public $categ;
    public $name;
    public $price;
	public $carac;
    public $image;
	public $quantity;

    function __construct($ref,$categ,$name,$price,$carac,$image,$quantity)
    {   $this->ref = $ref; 
        $this->categ = $categ;
        $this->name = $name;
		$this->price = $price;
		$this->carac = $carac;
        $this->image = $image;
	 $this->quantity = $quantity ;
    }
    // getter 
    function getref()
    {
        return $this->ref;
    }
    function getcateg()
    {
        return $this->categ;
    }
    function getname()
    {
        return $this->name;
    }
   
    function getprice()
    {
        return $this->price;
    }
   
	function getcarac()
    {
        return $this->carac;
    }
    function getimage()
    {
        return $this->image;
    }
	function getquantity()
    {
        return $this->quantity;
    }
    // setter 
     function setref($ref)
    {
        return $this->ref= $ref;
    }
    function setname($name)
    {
        return $this->name= $name;
    }
        function setcateg($categ)
    {
        return $this->categ= $categ;
    }

    function setprice($price)
    {
        return $this->price= $price;
    }
 
	function setcarac($carac)
    {
        return $this->carac= $carac;
    }
    function setimage($image)
    {
        return $this->image= $image;
    }
	function setquantity($quantity)
    {
        return $this->quantity= $quantity;
    }
}
  ?>
