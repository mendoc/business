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
		$commerciaux = $this->commercial_model->tout();
		
		// traitement																																																																																																																														
		foreach ($retraits as $retrait) {
			$commercial = $this->commercial_model->recuperer_un($retrait->id_com);
			$retrait->property = $commercial->nom_prenom;
		}

		$commerciaux_visite = $this->statistique_model->nombre_viste_total();
		$commerciaux = array_slice($this->statistique_model->nombre_visite_commercial() ,0 ,15);
		$commerciaux_candidats = array_slice($this->statistique_model->nombre_candidat_commercial(), 0, 15);
		
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

			if ($candidat->type_cours == 'P') {
				if ($montant_candidat > 0) {
					$nb_apprenants++;
				}
			} else {
				if($montant_candidat == PRIX_EN_LIGNE){
					$nb_apprenants++;
				} 
			}
		}

		$paiements = $this->paiement_model->tous();

		foreach ($paiements as $paiement)
		{
			$nom_candidat = $this->candidat_model->recuperer($paiement->id_can)->nom_prenom;
			$paiement->nom_candidat = $nom_candidat;
		}

		$inscrit_par_jour = array_slice($this->statistique_model->nb_inscrit_jour(), 0, 15);

		
		$data = array(
			"retraits" => $retraits,
			"email_utilisateur" => $gestionnaire->email_gest,
			"nb_candidats" => ($nb_candidats - $nb_apprenants),
			"nb_apprenants" => $nb_apprenants,
			"nombre_commerciaux" => $nombre_commerciaux,
			"chiffre_affaire" => (int)($chiffre_affaire),
			"total_retrait" => (int)$total_retrait,
			"paiements" => $paiements,
			"visites_total" => $commerciaux_visite->nbr_visite,
			"commerciaux" => $commerciaux,
			"best_commerciaux" => $commerciaux_candidats,
			"inscrits_jour" => $inscrit_par_jour
		);

		afficher('back/gestionnaire/statistiques', $data);
	}

	public function connexion()
	{

		if (est_connecte()) {
			$this->session->sess_destroy();
			redirect('gestionnaire');
		} else {
			$this->session->sess_destroy();
			$this->load->view('back/gestionnaire/connexion');
		}
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
			if ($this->input->post('souvenir')) {
				$this->session->set_tempdata('token_gest', md5(time()), 2678400);
				$this->session->set_tempdata('nom_gest', $gestionnaire->nom_prenom, 2678400);
				$this->session->set_tempdata('email_gest', $gestionnaire->email_gest, 2678400);
			} else {
				$this->session->set_userdata('token_gest', md5(time()));
				$this->session->set_userdata('nom_gest', $gestionnaire->nom_prenom);
				$this->session->set_userdata('email_gest', $gestionnaire->email_gest);
			}
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
			$candidat->max_montant = $candidat->type_cours == 'P' ? PRIX_PRESENTIEL : PRIX_EN_LIGNE ;
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

			$cles    = array('{NOM}', '{EMAIL}', '{MOT_DE_PASSE}');
			$valeurs = array($gestionnaire->nom_prenom, $gestionnaire->email_gest, $mot_passe);

			$message = str_replace($cles, $valeurs, $message);

			$headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

			// On envoie un mail au gestionnaire
			mail($gestionnaire->email_gest, 'Ecole 241 Business - Création de compte gestionnaire', $message, $headers);
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
		
		if ($ressource = $this->ressource_model->recuperer($id)) {
			
			$fichier = realpath('ressources') . '/' . $ressource->fichier;
			
			if (file_exists($fichier)) {
				if (unlink($fichier)) {
					if ($this->ressource_model->supprimer($id)) {
						$this->session->set_flashdata('message', 'Ressource supprimée');
						redirect('gestionnaire/ressources');
					}
				}
			}
		}



	}

	public function nouvelle_ressource()
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		afficher("back/gestionnaire/nouvelle_ressource");
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
				$paiement->max_montant = $candidat->type_cours == 'P' ? PRIX_PRESENTIEL : PRIX_EN_LIGNE;
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

		$candidat = $this->candidat_model->recuperer($id);
		$montant_candidat = $this->paiement_model->recuperer_tout_le_montant($id);
		$max_montant = $candidat->type_cours == 'P' ? PRIX_PRESENTIEL : PRIX_EN_LIGNE;

		$est_apprenant = $max_montant == $montant_candidat ;

		// Recuperation du candidat 
		$data = array(
			"candidat" => $this->candidat_model->recuperer($id),
			"paiements" => $this->paiement_model->recuperer($id),
			"est_apprenant" => $est_apprenant
		);

		
		afficher('back/gestionnaire/details_candidat', $data);
	}

	// Vue detail d'un commercial
	public function detail_commercial($id)
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}

		// Chargement des models
		$this->load->model('statistique_model');
		$this->load->model('retrait_model');

		$gestionnaire = $this->gestionnaire_model->par_email($this->session->userdata('email_gest'));

		if($commercial = $this->commercial_model->recuperer_un($id)){
			$result_aff_ligne = $this->statistique_model->affilies_com_ligne($id);
			$result_aff_presentiel = $this->statistique_model->affilies_com_presentiel($id);
			$result_candidats_ligne = $this->statistique_model->candidats_com_ligne($id);
			$result_candidats_presentiel = $this->statistique_model->candidats_com_presentiel($id);
			$result_visites = $this->statistique_model->visites_par_commercial($id);

			$somme_retrait = $this->retrait_model->pour_commercial($id);
			$retraits = $this->retrait_model->demande_retraits_commercial($id);

			$nb_aff_ligne = isset($result_aff_ligne) ? $result_aff_ligne->nb_affilies_com_ligne : 0;
			$nb_aff_presentiel = isset($result_aff_presentiel) ? $result_aff_presentiel->nb_affilies_com_presentiel : 0;

			$commission_ligne = $nb_aff_ligne * (COUT_EN_LIGNE * POURCENTAGE_LIGNE);
			$commission_presentiel = $nb_aff_presentiel * (COUT_PRESENTIEL * POURCENTAGE_PRE);

			$commission_total = $commission_ligne + $commission_presentiel;
			
			$bonus_ligne = 0;
			$bonus_presentiel = 0;

			// Calcul des bonus 
			for ($i=10; $i < $nb_aff_ligne; $i+=10) { 
				$bonus_ligne += 1;
			}

			for ($i=10; $i < $nb_aff_presentiel; $i+=10) { 
				$bonus_presentiel += 1;
			}

			$commission_total += ($bonus_ligne * 20000) + ($bonus_presentiel * 20000);
			
			
			foreach ($retraits as $retrait) {
				$commercial = $this->commercial_model->recuperer_un($retrait->id_com);
				$retrait->property = $commercial->nom_prenom;
			}
			
			$retraits = array_filter($retraits, function ($retrait) {
				return empty($retrait->date_fin);
			});
			
			$data = [
				"retraits" => $retraits,
				"email_utilisateur" => $gestionnaire->email_gest,
				"commercial" => $commercial,
				"nb_aff_ligne" => isset($result_aff_ligne) ? $result_aff_ligne->nb_affilies_com_ligne : 0,
				"nb_aff_presentiel" => isset($result_aff_presentiel) ? $result_aff_presentiel->nb_affilies_com_presentiel : 0,
				"inscrits_ligne" => $result_candidats_ligne,
				"inscrits_presentiel" => $result_candidats_presentiel,
				"montant_retrait" => isset($somme_retrait->montant_retrait) ? $somme_retrait->montant_retrait : 0,
				"commission_total" => $commission_total
			];

			afficher('back/gestionnaire/details_commercial', $data);

		} else {
			echo '404';
		}


	}

	// Vue pour confirmer une inscription ( ajouter le montant )
	public function inscription_candidat($id_can)
	{
		if (!$this->est_connecte()) {
			redirect('gestionnaire/connexion');
		}
		$this->load->model('paiement_model');
		$this->load->model('candidat_model');
		$email_gest = $this->session->userdata('email_gest');
		$gestionnaire = $this->gestionnaire_model->par_email($email_gest);

		$montant = $this->input->post('montant');

		// Recuperation des informations pour le traitement
		if ($candidat = $this->candidat_model->recuperer($id_can)) {
			$montant_candidat = $this->paiement_model->recuperer_tout_le_montant($id_can);
			$max_montant = $candidat->type_cours == 'P' ? PRIX_PRESENTIEL : PRIX_EN_LIGNE;

			if ($montant_candidat == $max_montant) {
				redirect('gestionnaire/detail_candidat/' . $id_can);
			} else {
				// Creation du paiement 
				$paiement = array(
					'montant' => (int)$montant,
					'motif' => $this->input->post('motif'),
					'id_gest' => $gestionnaire->id_gest,
					'id_can' => $id_can,
					'justificatif' => $this->input->post('justificatif'),
					'moyen_paie' => $this->input->post('moyen_paiement'),
					'num_trans' => $this->input->post('num_trans')
				);

				// Si l'insertion se passe bien 
				if ($paiement = $this->paiement_model->inserer($paiement)) {
					// On charge la vue email
					$message = $this->load->view('email/candidat/payement', '', TRUE);

					$cles    = array('{NOM}', '{TYPE_COURS}', '{MONTANT}', '{MONTANT_RESTANT}');
					$valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M.'), $candidat->nom_prenom, $candidat->sexe, $candidat->date_n, $candidat->email, $candidat->num_tel, $candidat->num_what, $candidat->horaire, $candidat->domaine_act, $candidat->type_serv, $candidat->attentes);
					$valeurs = array($candidat->nom_prenom, $candidat->type_cours, $paiement->montant, ($max_montant - $paiement->montant));
					$message = str_replace($cles, $valeurs, $message);
	
					// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
					//$headers[] = 'MIME-Version: 1.0';
					//$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

					mail($candidat->email,  'Ecole 241 Business - Confirmation du Paiement', $message, $headers);
					redirect('gestionnaire/detail_candidat/' . $id_can);
				}
				
			}
			
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
