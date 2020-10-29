<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * Page de test pour vos travaux
	 *
	 * URL pour visualiser sur le navigateur
	 * 		http://localhost/business/index.php/test
	 */
	public function index()
	{
		// On charge le modele
		$this->load->model('candidat');

		// On recupere les enregistrements
		$tuples = $this->candidat->tous_les_candidats();

		var_dump($tuples);
	}
}
