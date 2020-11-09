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
		// $message = $this->load->view('email/candidat/enregistrement', '', TRUE);
        $this->load->view('front/commercial/connexion');
		// $cles    = array('{NOM}', '{LIEN}', '{EMAIL}', '{PASS}');
		// $valeurs = array('Dimitri ONGOUA', site_url('gestionnaire'), 'ongouadimitri5@gmail.com', '7842');

		// $message = str_replace($cles, $valeurs, $message);

		// echo $message;
	}
}
