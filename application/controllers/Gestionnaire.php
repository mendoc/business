<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Controller
{
	public function index()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$nb_candidats = count($this->candidat_model->tout());

		$data = array(
			'nb_candidats' => $nb_candidats
		);

		afficher('back/gestionnaire/statistiques', $data);
	}

	public function connexion()
	{
		$this->load->view('back/gestionnaire/connexion');
	}

	public function deconnexion()
	{
		$this->session->unset_userdata('token_gest');
		$this->session->unset_userdata('nom_gest');
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
			$this->session->set_userdata('token_gest', md5(time()));
			$this->session->set_userdata('nom_gest', $gestionnaire->nom_prenom);
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

	public function ajouter_gestionnaire()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		// Générer un mot de passe
		$mot_passe  = rand(1000, 9999);

		$gestionnaire = new Gestionnaire_model();
		$gestionnaire->nom_prenom = $this->input->post('nom');
		$gestionnaire->email_gest = $this->input->post('email');
		$gestionnaire->mot_passe  = $mot_passe;

		//Récupération de tous les gestionnaires
		$succes = $gestionnaire->creer();

		if ($succes) {
			$this->session->set_flashdata('message', 'Compte gestionnqire créé avec succès');

			$message = "Bonjour " . $gestionnaire->nom_prenom . ", \n\nVotre compte gestionnaire a bien été créé.
            \n\nCi-dessous, les informations pour vous connecter.\n\nLien de connexion : " . site_url('gestionnaire') . " \nAdresse e-mail : " . $gestionnaire->email_gest . "\nMot de passe: " . $gestionnaire->mot_passe . "\n\nL'équipe Ecole 241 Business.";

			// On envoie un mail au gestionnaire
			mail($gestionnaire->email_gest, 'Ecole 241 Business - Création de compte gestionnaire', $message);
		} else {
			$this->session->set_flashdata('message', "Une erreur s'est produite lors de la création du compte");
		}
		redirect('gestionnaire/gestionnaires');
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

	public function nouvelle_ressource()
	{
		afficher("back/gestionnaire/nouvelle_ressource");
	}

	public function traitement_nouvelle_ressource()
	{
		if (!est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$gestionnaire = $this->gestionnaire->par_email($this->session->email);

		$this->load->model('ressource_model');

		$ressource = new Ressource_model();
		$ressource->nom_res  = $this->input->post('nom');
		$ressource->type_res = $this->input->post('type_res');
		$ressource->id_them  = $this->input->post('id_them');
		$ressource->id_gest  = $gestionnaire->id_gest;

		//Affichage de la vue de listing des ressources
		redirect('gestionnaire/ressources');
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
			mail($candidat->email,  'Ecole 241 Business - Confirmation du Paiement', "Tout s'est bien passe");
			redirect('gestionnaire/detail_candidat/' . $id_can);
		}
	}
}
