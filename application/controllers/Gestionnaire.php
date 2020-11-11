<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Controller
{
	public function index()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		
		$this->load->model('retrait_model');
		$this->load->model('commercial_model');
		$this->load->model('statistique_model');
		$this->load->model('paiement_model');
		
		
		// Recuperation des stats
		$result = $this->statistique_model->nombre_commerciaux();
		$nombre_commerciaux = $result->nombre_commerciaux;
		
		$result = $this->statistique_model->nombre_apprenant_presentiel();
		
		$result = $this->paiement_model->chiffre_affaire();
		$chiffre_affaire = $result->montant;
		
		$result = $this->retrait_model->total_retrait();
		$total_retrait = $result->montant_retrait;
		
		// Recuperation des informations
		$retraits = $this->retrait_model->tout();
		$gestionnaire = $this->gestionnaire_model->par_email($this->session->userdata('email_gest'));
		
		// traitement																																																																																																																														
		foreach ($retraits as $retrait) {
			$commercial = $this->commercial_model->recuperer_un($retrait->id_com);
			$retrait->property = $commercial->nom_prenom;
		}
		
		$retraits = array_filter($retraits, function ($retrait) {
			return empty($retrait->date_fin);
		});
		
		// Traitement des informations du candidats
		$candidats = $this->candidat_model->tout();
		$nb_candidats = count($candidats);
		$nb_apprenants = 0;
		foreach($candidats as $candidat)
		{
			$montant_candidat = $this->paiement_model->recuperer_tout_le_montant($candidat->id_can);
			if ($montant_candidat == 155000) {
				$nb_apprenants++;
			}
		}

		// traitements des paiements du candidat
		$paiements = $this->paiement_model->tous();
		foreach ($paiements as $paiement)
		{
			$nom_candidat = $this->candidat_model->recuperer($paiement->id_can)->nom_prenom;
			$paiement->nom_candidat = $nom_candidat;
		}

		$data = array(
			"retraits" => $retraits,
			"email_utilisateur" => $gestionnaire->email_gest,
			"nb_candidats" => ($nb_candidats - $nb_apprenants),
			"nb_apprenants" => $nb_apprenants,
			"nombre_commerciaux" => $nombre_commerciaux,
			"chiffre_affaire" => (int)($chiffre_affaire),
			"total_retrait" => (int)$total_retrait,
			"paiements" => $paiements
		);

		afficher('back/gestionnaire/statistiques', $data);
	}

	public function connexion()
	{
		$this->session->sess_destroy();
		$this->load->view('back/gestionnaire/connexion');
	}

	public function deconnexion()
	{
		$this->session->sess_destroy();
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
		if (!$this->est_connecte()) {
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
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$data['candidats'] =  $this->candidat_model->tout();

		$this->load->model('paiement_model');

		// On boucle sur tous les candidats et on verifie s'ils ont payé 
		foreach ($data['candidats'] as $candidat) {
			$candidat->montant = $this->paiement_model->recuperer_tout_le_montant($candidat->id_can);
			if ($candidat->id_com) {
				$commercial = $this->commercial_model->recuperer_un($candidat->id_com);
				$candidat->nom_com = $commercial->nom_prenom;
			}
		}

		afficher('back/gestionnaire/candidats', $data);
	}

	public function gestionnaires()
	{
		if (!$this->est_connecte()) {
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
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		// Générer un mot de passe
		$mot_passe  = rand(1000, 9999);

		$gestionnaire = new Gestionnaire_model();
		$gestionnaire->nom_prenom = $this->input->post('nom');
		$gestionnaire->email_gest = $this->input->post('email');
		$gestionnaire->mot_passe  = password_hash($mot_passe, PASSWORD_BCRYPT);

		//Récupération de tous les gestionnaires
		$succes = $gestionnaire->creer();

		if ($succes) {
			$this->session->set_flashdata('message', 'Compte gestionnaire créé avec succès');

			// On charge la vue du mail
			$message = $this->load->view('email/gestionnaire/inscription', '', TRUE);

			$cles    = array('{NOM}', '{LIEN}', '{EMAIL}', '{PASS}');
			$valeurs = array($gestionnaire->nom_prenom, site_url('gestionnaire'), $gestionnaire->email_gest, $mot_passe);

			$message = str_replace($cles, $valeurs, $message);

			// On envoie un mail au gestionnaire
			mail($gestionnaire->email_gest, 'Ecole 241 Business - Création de compte gestionnaire', $message);
		} else {
			$this->session->set_flashdata('message', "Une erreur s'est produite lors de la création du compte");
		}
		redirect('gestionnaire/gestionnaires');
	}

	public function finaliser_un_retrait($id)
	{
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

		if ($retrait->modifier($id)) {
			redirect('gestionnaire');
		}
	}

	public function prendre_un_retrait($id)
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('gestionnaire_model');
		$this->load->model('retrait_model');

		// Recuperation des informations 
		$gestionnaire = $this->gestionnaire_model->par_email($this->session->userdata('email_gest'));
		$_retrait     = $this->retrait_model->un($id);
		$retrait      = new Retrait_model();
		$retrait->montant_retrait = $_retrait->montant_retrait;
		$retrait->id_com          = $_retrait->id_com;
		$retrait->num_ret         = $_retrait->num_ret;

		// modification des informations 2020-11-02 13:31:19
		$retrait->id_gest = $gestionnaire->id_gest;
		$retrait->date_debut = date('Y-m-d H:i:s');

		$retrait->modifier($id);

		redirect('gestionnaire');
		// var_dump($_retrait);
	}

	public function ressources()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de toutes les ressources
		$this->load->model('ressource_model');

		$tuples = $this->ressource_model->tout();

		$data = array(
			"ressources" => $tuples
		);

		//Affichage de la vue de listing des ressources
		afficher("back/gestionnaire/ressources", $data);
	}

	public function supprimer_ressource($id)
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('ressource_model');

		if ($this->ressource_model->supprimer($id)) {
			$this->session->set_flashdata('message', 'Ressource supprimée');
			redirect('gestionnaire/ressources');
		}
	}

	public function nouvelle_ressource()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		//Récupération de toutes les ressources
		$this->load->model('thematique_model');

		$tuples = $this->thematique_model->tout();

		$data = array(
			"thematiques" => $tuples
		);

		afficher("back/gestionnaire/nouvelle_ressource", $data);
	}

	public function detail_ressource($id)
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('ressource_model');
		$this->load->model('ressource_partage_model');
		$this->load->model('thematique_model');

		$ressource = $this->ressource_model->recuperer($id);

		$thematique = $this->thematique_model->recuperer($ressource->id_them);
		$gestionnaire = $this->gestionnaire_model->recuperer_un_gestionnaire($ressource->id_gest);

		$ressource->thematique = $thematique->titre;
		$ressource->gest = $gestionnaire->nom_prenom;

		$ressource->num_partage = $this->ressource_partage_model->par_res($ressource->id_res);
		$ressource->nbr_visite = 3;


		$data['ressource'] = $ressource;

		// var_dump($ressource);
		afficher('back/gestionnaire/detail_ressource', $data);
	}

	public function traitement_nouvelle_ressource()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$config['upload_path'] = './ressources/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|mp4';

		$this->load->library('upload', $config);

		$fichier = '';

		if (!$this->upload->do_upload('fichier_res')) {
			$error = array('error' => $this->upload->display_errors());

			$this->session->set_flashdata('message', $error['error']);

			if (empty($this->input->post('lien'))) {
				redirect('gestionnaire/nouvelle_ressource');
			}
		} else {
			$data = array('upload_data' => $this->upload->data());
			$fichier = $data['upload_data']['file_name'];
		}

		$gestionnaire = $this->gestionnaire_model->par_email($this->session->email_gest);

		$this->load->model('ressource_model');

		$ressource = new Ressource_model();
		$ressource->nom_res  = $this->input->post('nom_res');
		$ressource->type_res = $this->input->post('type_res');
		$ressource->lien     = $this->input->post('lien');
		$ressource->fichier  = $fichier;
		$ressource->id_gest  = $gestionnaire->id_gest;

		$succes = $ressource->inserer();

		if ($succes) {
			//Affichage de la vue de listing des ressources
			redirect('gestionnaire/ressources');
		} else {
			// Retour au formulaire
			redirect('gestionnaire/nouvelle_ressource');
		}
	}

	public function transactions_candidats()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		$this->load->model('paiement_model');


		//Récupération de tous les transactions
		if ($paiements = $this->paiement_model->tous()) {
			foreach ($paiements as $paiement) {
				$candidat = $this->candidat_model->recuperer($paiement->id_can);
				$gestionnaire = $this->gestionnaire_model->recuperer_un_gestionnaire($paiement->id_gest);
				$paiement->nom_candidat = $candidat->nom_prenom;
				$paiement->type = $candidat->type_cours;
				$paiement->gestionnaire = $gestionnaire->nom_prenom;
			}
		}


		$data = array(
			"paiements" => $paiements
		);

		//Affichage de la vue de listing de transactions
		afficher("back/gestionnaire/transactions", $data);
	}

	public function transactions_commercial()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		$this->load->model('retrait_model');

		$_retraits = $this->retrait_model->tout();

		$retraits = array_filter($_retraits, function ($retrait) {
			return !empty($retrait->date_fin);
		});

		if (!empty($retraits)) {
			foreach ($retraits as $retrait) {
				$commercial = $this->commercial_model->recuperer_un($retrait->id_com);
				$gestionnaire = $this->gestionnaire_model->recuperer_un_gestionnaire($retrait->id_gest);
				$retrait->nom_com = $commercial->nom_prenom;
				$retrait->nom_gest = $gestionnaire->nom_prenom;
			}
		}

		$data['retraits'] = $retraits;

		// var_dump($retraits);
		afficher('back/gestionnaire/transactions_commercial', $data);
	}

	// Vue detail d'un candidat
	public function detail_candidat($id)
	{
		if (!$this->est_connecte()) {
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
		if (!$this->est_connecte()) {
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
			'id_can' => $id_can,
			'justificatif' => $this->input->post('justificatif'),
			'moyen_paie' => $this->input->post('moyen_paiement'),
			'num_trans' => $this->input->post('num_trans')
		);


		if ($this->paiement_model->inserer($paiement)) {
			$candidat = $this->candidat_model->recuperer($id_can);
			mail($candidat->email,  'Ecole 241 Business - Confirmation du Paiement', "Tout s'est bien passe");
			redirect('gestionnaire/detail_candidat/' . $id_can);
		}
	}

	public function thematiques()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		// On charge modele des thématiques
		$this->load->model('thematique_model');

		// Récupération de toutes les transactions
		$tuples = $this->thematique_model->tout();

		$data = array(
			"thematiques" => $tuples
		);

		// Affichage de la vue de listing de transactions
		afficher("back/gestionnaire/thematiques", $data);
	}

	public function traitement_nouvelle_thematique()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		// On charge modèle des thématiques
		$this->load->model('thematique_model');

		// On crée le modèle
		$thematique = new Thematique_model();

		$thematique->titre = $this->input->post('titre');
		$thematique->description = 'Thématique standard';

		// Récupération de toutes les transactions
		$succes = $thematique->creer();

		// if ($succes) {

		// } else {

		// }

		redirect('gestionnaire/thematiques');
	}

	private function est_connecte()
	{
		$CI = &get_instance();

		$CI->load->library('session');

		$token_gest = $CI->session->userdata('token_gest');

		return $token_gest != null;
	}

	public function hashing_com()
	{
		$commerciaux = $this->commercial_model->tout();
		
		echo 'Pour les commerciaux <br />';
		foreach($commerciaux as $commercial)
		{
			$commercial->mot_passe = password_hash($commercial->mot_passe, PASSWORD_BCRYPT);
			if ($this->commercial_model->save_infos($commercial, $commercial->id_com)) {
				echo 'Mot de passe mis a jour pour ' . $commercial->nom_prenom . '<br />';
			}
		}
		
	}

	public function hashing_gest()
	{
		// Recuperation des gestionnaires
		$gestionnaires = $this->gestionnaire_model->tout();

		// Hashing des mots de passe 
		foreach($gestionnaires as $gestionnaire)
		{
			$gestionnaire->mot_passe = password_hash($gestionnaire->mot_passe, PASSWORD_BCRYPT);
			
			$_gestionnaire = new Gestionnaire_model();

			$_gestionnaire->nom_prenom = $gestionnaire->nom_prenom;
			$_gestionnaire->email_gest = $gestionnaire->email_gest;
			$_gestionnaire->mot_passe = $gestionnaire->mot_passe;

			if ($_gestionnaire->modifier_gestionnaire($gestionnaire->id_gest)) {
				echo 'Mot de passe mis a jour pour ' . $gestionnaire->nom_prenom;
			}

		}
	}
}
