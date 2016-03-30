<?php
include_once("Partenaire.class.php");

class Publicite extends Partenaire
{
	public function __construct($idMembre,$bdd)
	{
 		parent::__construct($idMembre,$bdd); 
	}
	
	/* -- Gestion BDD -- */
	public function initializePublicite()
	{
		$req = $this->bdd->prepare('SELECT nom, statut FROM Publicite WHERE id= :id');
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
	
	public function insertNewPublicite()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('INSERT INTO Publicite(nom, idUser, statut, cree_le) 
							  VALUES(:nom, :id_user, :statut, :cree_le)');
		$req->execute(array(
	   		 'nom' => $this->nom,
	   		 'id_user' => $this->id_user,
	   		 'statut' => $this->statut,
	   		 'cree_le' => $date
	   		 ));
	   		 
	   	$req->closeCursor();	
	}
	
	public function updatePublicite()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('UPDATE Publicite SET nom= :nom, idUser= :id_user, statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
    		'nom' => $this->nom,
	   		'id_user' => $this->id_user,
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));
   		 
   		 $req->closeCursor();
	}
	
	public function updateStatutPublicite()
	{
		$date=getTheDate();
		
		$req = $this->bdd->prepare('UPDATE Publicite SET statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));
   		 
   		 $req->closeCursor();
	}
}
