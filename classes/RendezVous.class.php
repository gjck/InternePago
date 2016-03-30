<?php 

class RendezVous
{
	private $bdd;
	
	private $idPartenaire;
	private $dateRdv;
	
	public function __construct($bdd)
    {
    	$this->bdd=$bdd;
    }
    
    //Setter
    public function setIdPartenaire($idPartenaire)
   	{
   		$this->idPartenaire=$idPartenaire; 
   	}
   	
   	public function setDateRdv($dateRdv)
   	{
   		$this->dateRdv=$dateRdv;
   	} 
   	
   	//Getter 
   	
   	//Fonction màj BDD
   	public function setNewRdv($typePartenaire)
   	{
		$date=getTheDate();
		
		if(testExistenceRdv($typePartenaire,$this->idPartenaire,$this->dateRdv,$this->bdd))
		{
			$req = $this->bdd->prepare('INSERT INTO rdv'.$typePartenaire.'(idPartenaire,dateRdv,cree_le) 
							  		VALUES(:idPartenaire,:dateRdv,:cree_le)');
			$req->execute(array(
	   			 'idPartenaire' => $this->idPartenaire,
	   			 'dateRdv' => $this->dateRdv,
	   		 	'cree_le' => $date
	   		 	));
	   		 
	   		$req->closeCursor();
	   	}	
   	}   	  		 
}

?>