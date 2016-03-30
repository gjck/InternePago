<?php
include_once("Partenaire.class.php");

class PointDeVente extends Partenaire
{
	public function __construct($idMembre,$bdd)
	{
 		parent::__construct($idMembre,$bdd);
	}

	/* -- Gestion BDD -- */
	public function initializePointDeVente()
	{
		$req = $this->bdd->prepare('SELECT nom, statut, type FROM PointDeVente WHERE id= :id');
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

	public function insertNewPointDeVente()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('INSERT INTO PointDeVente(nom, idUser, statut, type, cree_le)
							  VALUES(:nom, :id_user, :statut, :type, :cree_le)');
		$req->execute(array(
	   		 'nom' => $this->nom,
	   		 'id_user' => $this->id_user,
	   		 'statut' => $this->statut,
	   		 'cree_le' => $date,
				 'type' => $this->type
	   		 ));

	   	$req->closeCursor();
	}

	public function updatePointDeVente()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE PointDeVente SET nom= :nom, idUser= :id_user, statut= :statut, type= :type modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
    		'nom' => $this->nom,
	   		'id_user' => $this->id_user,
	   		'statut' => $this->statut,
				'type' => $this->type,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));

   		 $req->closeCursor();
	}

	public function updateStatutPointDeVente()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE PointDeVente SET statut= :statut, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'statut' => $this->statut,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));

   		 $req->closeCursor();
	}

	public function updateTypePointDeVente()
	{
		$date=getTheDate();

		$req = $this->bdd->prepare('UPDATE PointDeVente SET type= :type, modifie_le= :modifie_le WHERE id = :id');
		$req->execute(array(
	   		'type' => $this->type,
	   		'id' => $this->idPartenaire,
	   		'modifie_le' => $date
   		 ));

   		 $req->closeCursor();
	}
}
