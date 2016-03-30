<?php
// Ces fichiers sont la propriété de Gauthier JENCZAK */
// 													  */
// Informations : 									  */
// Concernant le statut d'un partenaire, le code sui- */
// vant a été choisi :    							  */
// 1 : Signé										  */
// 2 : Reprogrammé    							      */
// 3 : Non Rencontré 								  */
// 4 : Refus de signature 							  */
// 5 : En attente de réponse 							  */

class Partenaire
{
	protected $bdd;
	protected $id_user;

	// Déclaration des valeurs intrinsèques au restaurant
	protected $nom;
	protected $statut=0;
	protected $idPartenaire=-1;
	protected $type=0;

	public function __construct($idMembre,$bdd)
    {
    	$this->id_user=$idMembre;
    	$this->bdd=$bdd;
    }

	/* -- Setters -- */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	public function setStatut($statut)
	{
		if($statut=="signe")
		{
			$this->statut=1;
		}
		else if($statut=="reprogramme")
		{
			$this->statut=2;
		}
		else if($statut=="nonRencontre")
		{
			$this->statut=3;
		}
		else if($statut=="refus")
		{
			$this->statut=4;
		}
		else if($statut=="attenteReponse")
		{
			$this->statut=5;
		}
		else
		{
			echo "Attention, mauvais entrée, le statut n'a pas été mis à jour";
			exit();
		}
	}

	public function setType($type)
	{
		$this->type=$type;
	}

	public function setIdPartenaire($idPartenaire)
	{
		$this->idPartenaire = $idPartenaire;
	}

	/* -- Getters -- */
	public function getNom()
	{
		return $this->nom;
	}
}
