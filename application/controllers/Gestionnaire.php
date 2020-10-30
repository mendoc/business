<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestionnaire extends CI_Controller {




	public function index()
	{
		afficher('back/gestionnaire/candidats');
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
