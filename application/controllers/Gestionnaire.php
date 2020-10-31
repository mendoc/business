<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestionnaire extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		if(!$this->session->userdata('id'))
		{
			redirect('gestionnaire/connexion');
		}
		afficher('back/gestionnaire/statistique');
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
		$this->load->helper('form');
		$this->load->view('/back/gestionnaire/connexion_du_gestion');
	}

	public function traitement_connexion()
	{
		$this->load->model('gestionnaire_model');

		$email = $this->input->post('email');
		$mot_de_passe = $this->input->post('password');

		$data = [
			'email_gest' => $email,
			'mot_passe' => $mot_de_passe
		];

		$est_connecte = $this->gestionnaire_model->connexion($data) ? true : false;

		if ($est_connecte) {
			$gestionnaire = $this->gestionnaire_model->connexion($data);
			$this->session->set_userdata('id', $gestionnaire->id_gest);
			redirect('gestionnaire');
		} else {
			$this->session->set_flashdata('message', 'Incorrect !!');
			redirect('gestionnaire/connexion');
		}
		
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
