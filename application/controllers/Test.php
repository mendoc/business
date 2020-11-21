<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

	/**
	 * Page de test pour vos travaux
	 *
	 * URL pour visualiser sur le navigateur
	 * 		http://localhost/business/index.php/test
	 */
	public function index()
	{
		// On charge le modele
		$this->load->view('front/candidat/nouveau_formulaire_candidat');
	}
}
