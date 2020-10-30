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
			redirect('front/candidat/inscription_candidat.php');
		}
	}
}