<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestionnaire extends CI_Controller {


	public function __construct(){
		parent::__construct();
	}


	public function candidats()
	{
		$this->load->model('candidat');
		$this->load->model('paiement');
		$data['candidats'] =  $this->candidat->tous_les_candidats();

		// On boucle sur tout les candidats et on verifie si ils ont payes 
		foreach ($data['candidats'] as $candidat) {
			$candidat->est_apprenant = $this->paiement->est_un_apprenant($candidat->id_can);
		}

		afficher('back/gestionnaire/candidats', $data);
	}

	public function connexion()
	{

	}

	public function listing_commercial()
	{
		//Chargement du modele
		$this->load->model("commercial");

		//Récupération de tous les commerciaux
		$tuples = $this->commercial->tous_les_commerciaux();

		$data = array(
			"commerciaux" => $tuples
		);

		//Affichage de la vue de listing de commerciaux
		afficher("back/gestionnaire/commerciaux", $data);
		//var_dump($data);
	}

}
