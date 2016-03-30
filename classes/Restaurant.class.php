<?php
include_once("Partenaire.class.php");

class Restaurant extends Partenaire
{
	public function __construct($idMembre,$bdd)
	{
 		parent::__construct($idMembre,$bdd);
	}

	/* -- Gestion BDD -- */
	public function initializeRestaurant()
	{
		$req = $this->bdd->prepare('SELECT nom, statut, type FROM Restaurant WHERE id= :id');
		$req ->execute(array(
				'id'=> $this->idPartenaire
				));
		while($donnees=$req->fetch())
		{
			$this->nom = $donnees['nom'];
			$this->statut = $donnees['statut'];
			$this->type = $donnees['type'];
		}
		$req->closeCursor();
	}

	public function insertNewRestaurant()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('INSERT INTO Restaurant(nom, idUser, statut, type, cree_le)
							  VALUES(:nom, :id_user, :statut, :type, :cree_le)');
		$req->execute(array(
	   		 'nom' => $this->nom,
	   		 'id_user' => $this->id_user,
				 'type'=>$this->type,
	   		 'statut' => $this->statut,
	   		 'cree_le' => $date
	   		 ));

	   	$req->closeCursor();
	}

	public function updateRestaurant()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE Restaurant SET nom= :nom, idUser= :id_user, statut= :statut, modifie_le= :modifie_le, type= :type WHERE id = :id');
		$req->execute(array(
    		'nom' => $this->nom,
	   		'id_user' => $this->id_user,
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date,
				'type' => $this->type
   		 ));

   		 $req->closeCursor();
	}

	public function updateStatutRestaurant()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE Restaurant SET statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));

   		 $req->closeCursor();
	}

	public function updateTypeRestaurant()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE Restaurant SET type= :type, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'type' => $this->type,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));

   		 $req->closeCursor();
	}
}
