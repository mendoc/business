<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Controller
{
	public function index()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('retrait_model');
		$this->load->model('commercial_model');

		// Recuperation des informations
		$retraits = $this->retrait_model->tout();
		$gestionnaire = $this->gestionnaire_model->par_email($this->session->userdata('email_gest'));

		// traitement
		foreach($retraits as $retrait)
		{
			$commercial = $this->commercial_model->recuperer_un($retrait->id_com);
			$retrait->property = $commercial->nom_prenom;
		}

		$retraits = array_filter($retraits, function($retrait){
			return empty($retrait->date_fin);
		});

		$data = array(
			"retraits" => $retraits,
			"email_utilisateur" => $gestionnaire->email_gest
		);

		afficher('back/gestionnaire/statistiques', $data);
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
			$this->session->set_userdata('email_gest', $gestionnaire->email_gest);
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
			$candidat->montant = $this->paiement_model->recuperer_tout_le_montant($candidat->id_can);
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

	public function finaliser_un_retrait($id)
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		
		$this->load->model('retrait_model');

		// recuperation des informations
		$_retrait = $this->retrait_model->un($id);
		$retrait = new Retrait_model();
		$retrait->montant_retrait = $_retrait->montant_retrait;
		$retrait->id_com = $_retrait->id_com;
		$retrait->date_debut = $_retrait->date_debut;
		$retrait->id_gest = $_retrait->id_gest;
		$retrait->num_ret = $_retrait->num_ret;


		// Finalisation du retrait
		$retrait->date_fin = date('Y-m-d H:i:s');

		if($retrait->modifier($id))
		{
			redirect('gestionnaire');
		}

	}

	public function prendre_un_retrait($id)
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('gestionnaire_model');
		$this->load->model('retrait_model');

		// Recuperation des informations 
		$gestionnaire = $this->gestionnaire_model->par_email($this->session->userdata('email'));
		$_retrait = $this->retrait_model->un($id);
		$retrait = new Retrait_model();
		$retrait->montant_retrait = $_retrait->montant_retrait;
		$retrait->id_com = $_retrait->id_com;
		$retrait->num_ret = $_retrait->num_ret;

		// modification des informations 2020-11-02 13:31:19
		$retrait->id_gest = $gestionnaire->id_gest;
		$retrait->date_debut = date('Y-m-d H:i:s');

		$retrait->modifier($id);

		redirect('gestionnaire');

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

	// Vue detail d'un candidat
	public function detail_candidat($id)
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		$this->load->model('candidat_model');
		$this->load->model('paiement_model');
		
		// Recuperation du candidat 
		$data = array(
			"candidat" => $this->candidat_model->recuperer($id),
			"paiements" => $this->paiement_model->recuperer($id)
		);

		// Recuperation de l'id du gestionnaire pour le traitement et affichage dans le lien du formulaire

		
		afficher('back/gestionnaire/details_candidat', $data);
	}

	// Vue pour confirmer une inscription ( ajouter le montant )
	public function inscription_candidat($id_can)
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		$this->load->model('paiement_model');
		$this->load->model('candidat_model');
		
		$montant = $this->input->post('montant');

		// Creation du paiement 
		$paiement = array(
			'montant' => (int)$montant,
			'motif' => $this->input->post('motif'),
			'id_gest' => 1, 
			'id_can' => $id_can
		);

		if ($this->paiement_model->inserer($paiement)) {
			$candidat = $this->candidat_model->recuperer($id_can);
			mail($candidat->email,  'Ecole 241 Business - Confirmation du Paiement',"Tout s'est bien passe" );
			redirect('gestionnaire/detail_candidat/' . $id_can);
		}

	}


}
