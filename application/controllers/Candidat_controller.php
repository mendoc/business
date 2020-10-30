<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat_controller  extends CI_Controller
{


	//La fonction qui affiche la vue candidat
	public function index()
	{
		$this->load->view('front/candidat/inscription_candidat');
	}
	public function inscription_reussi()
	{
		$this->load->view('front/candidat/message_inscription');
	}

	// la fonction qui réupere les donnees du formulaire

	public function recuperation_donnees_candidat()
	{
		// Récupération des donnees
		$nom_complet = $this->input->post('nom') . ' ' . $this->input->post('prenom');
		$params = [
			'nom_prenom'   => $nom_complet,
			'num_tel'      => $this->input->post('telephone'),
			'num_what'     => $this->input->post('numero-whatsapp'),
			'email'        => $this->input->post('email'),
			'sexe'         => $this->input->post('sexe'),
			'date_n'       => $this->input->post('date'),
			'domaine_act'  => $this->input->post('domaine'),
			'type_serv' => $this->input->post('service'),
			'attentes'      => $this->input->post('attentes'),
			'horaire'      => $this->input->post('horaire')
		];
		// validation des données du formulaire

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nom', 'nom', 'required');
		$this->form_validation->set_rules('prenom', 'prenom', 'required');
		$this->form_validation->set_rules('telephone', 'telephone', 'required');
		$this->form_validation->set_rules('numero-whatsapp', 'numero-whatsapp', 'required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('sexe', 'sexe', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('domaine', 'domaine', 'required');
		$this->form_validation->set_rules('service', 'service', 'required');
		$this->form_validation->set_rules('attentes', 'attentes', 'required');
		$this->form_validation->set_rules('horaire', 'horaire', 'required');



		if ($this->form_validation->run() == FALSE) {
			$this->load->view('candidat_controller/index');
		} else {
			// Chargement du modele
		$this->load->model('candidat');

		// Insertion d'informations
		$success = $this->candidat->ajouter_candidat($params);

			if ($success) {
				// Redirection vers la page d'accueil
		
			redirect('candidat_controller/inscription_reussi');
				mail('christadinsi@gmail.com', 'messsage de confirmation', 'Feliciatation pour votre enrégistrement');
			} else {
				// Redirection vers le formulaire
				redirect('candidat_controller/inscrription');
			}
			//$this->load->view('candidat_controller/inscription_reussi');
		}



		
	}
}
