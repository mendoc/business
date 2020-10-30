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
			'num_tel'      => $this->input->post('numero'),
			'num_what'     => $this->input->post('num_what'),
			'email'        => $this->input->post('mail'),
			'sexe'         => $this->input->post('sexe'),
			'date_n'       => $this->input->post('date'),
			'domaine_act'  => $this->input->post('domain'),
			'type_serv' => $this->input->post('service'),
			'attentes'      => $this->input->post('attentes'),
			'horaire'      => $this->input->post('horaire')
		];
		
		  // Chargement du modele
		  $this->load->model('candidat');

		  // Insertion d'informations
		  $success = $this->candidat->ajouter_candidat($params);
  
		  if ($success) {
			  // Redirection vers la vue message d'inscription
			  mail('christadinsi@gmail.com','mesage de validation','Felicitationpour votre enregistrement ');
			  redirect('/Candidat_controller/inscription_reussi');
			  
		  } else {
			  // Redirection vers le formulaire
			  redirect('/Candidat_controller/inscription_candidat');
		  }


		}
	
}
