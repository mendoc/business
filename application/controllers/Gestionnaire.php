<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Controller
{
	public function index()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		afficher('back/gestionnaire/statistiques');
	}

	public function connexion()
	{
		$this->load->view('back/gestionnaire/connexion');
	}

	public function deconnexion()
	{
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('gestionnaire');
		$this->session->unset_userdata('nom');
		redirect('gestionnaire/connexion');
	}

	public function traitement_connexion()
	{
		// On récupère les informations venant du formulaire
		$email     = $this->input->post('email');
		$mot_passe = $this->input->post('password');

		// On valide les données

		// On teste la connexion
		$gestionnaire = $this->gestionnaire_model->connexion($email, $mot_passe);

		if ($gestionnaire) {
			$this->session->set_userdata('token', md5(time()));
			$this->session->set_userdata('gestionnaire', true);
			$this->session->set_userdata('nom', $gestionnaire->nom_prenom);
			redirect('gestionnaire');
		} else {
			$this->session->set_flashdata('message', 'Adresse e-mail ou mot de passe incorrect');
			$this->session->set_flashdata('email', $email);
			redirect('gestionnaire/connexion');
		}
	}

	public function commerciaux()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de tous les commerciaux
		$tuples = $this->commercial_model->tout();

		$data = array(
			"commerciaux" => $tuples
		);

		//Affichage de la vue de listing de commerciaux
		afficher("back/gestionnaire/commerciaux", $data);
	}

	public function candidats()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$data['candidats'] =  $this->candidat_model->tout();

		$this->load->model('paiement_model');

		// On boucle sur tous les candidats et on verifie s'ils ont payé 
		foreach ($data['candidats'] as $candidat) {
			$candidat->est_apprenant = $this->paiement_model->est_un_apprenant($candidat->id_can);
		}

		afficher('back/gestionnaire/candidats', $data);
	}

	public function gestionnaires()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de tous les gestionnaires
		$tuples = $this->gestionnaire_model->tout();

		$data = array(
			"gestionnaires" => $tuples
		);

		//Affichage de la vue de listing de gestionnaires
		afficher("back/gestionnaire/gestionnaires", $data);
	}

	public function ressources()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de toutes les ressources
		//$tuples = $this->gestionnaire_model->tout();
		$tuples = array();

		$data = array(
			"ressources" => $tuples
		);

		//Affichage de la vue de listing des ressources
		afficher("back/gestionnaire/ressources", $data);
	}

	public function transactions()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de tous les transactions
		$tuples = $this->gestionnaire_model->transactions();

		$data = array(
			"transactions" => $tuples
		);

		//Affichage de la vue de listing de transactions
		afficher("back/gestionnaire/transactions", $data);
	}
}
