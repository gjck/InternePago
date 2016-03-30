<?php
include_once("Partenaire.class.php");

class ComiteEntreprise extends Partenaire
{
	public function __construct($idMembre,$bdd)
	{
 		parent::__construct($idMembre,$bdd); 
	}
	
	/* -- Gestion BDD -- */
	public function initializeComiteEntreprise()
	{
		$req = $this->bdd->prepare('SELECT nom, statut FROM ComiteEntreprise WHERE id= :id');
		$req ->execute(array(
				'id'=> $this->idPartenaire
				));
		while($donnees=$req->fetch())
		{
			$this->nom = $donnees['nom'];
			$this->statut = $donnees['statut'];
		}
		$req->closeCursor();
	}
	
	public function insertNewComiteEntreprise()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('INSERT INTO ComiteEntreprise(nom, idUser, statut, cree_le) 
							  VALUES(:nom, :id_user, :statut, :cree_le)');
		$req->execute(array(
	   		 'nom' => $this->nom,
	   		 'id_user' => $this->id_user,
	   		 'statut' => $this->statut,
	   		 'cree_le' => $date
	   		 ));
	   		 
	   	$req->closeCursor();	
	}
	
	public function updateComiteEntreprise()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('UPDATE ComiteEntreprise SET nom= :nom, idUser= :id_user, statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
    		'nom' => $this->nom,
	   		'id_user' => $this->id_user,
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));
   		 
   		 $req->closeCursor();
	}
	
	public function updateStatutComiteEntreprise()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('UPDATE ComiteEntreprise SET statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));
   		 
   		 $req->closeCursor();
	}
}
