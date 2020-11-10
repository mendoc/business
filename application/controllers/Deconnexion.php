<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deconnexion extends CI_Controller {

	public function index()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		
		$gest = est_un_gestionnaire();

		$this->session->unset_userdata('token');
		$this->session->unset_userdata('gestionnaire');
		$this->session->unset_userdata('nom');
		redirect('gestionnaire/connexion');
	}
}
