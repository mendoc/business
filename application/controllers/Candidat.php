<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidat extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    public function inscription()
	{
		afficher('back/commercial/statistiques');
    }
    
    public function traitement_inscription()
    {
        // On charge le modele
        $this->load->model('candidat');

        // On receupere les infos du formulaire
        $nom = $this->input->post('');
    }
}
