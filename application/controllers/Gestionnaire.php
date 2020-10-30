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

}
