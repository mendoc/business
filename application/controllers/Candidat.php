<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Controller
{
	//La fonction qui affiche la vue candidat
	public function index()
	{
		$this->load->view('front/candidat/inscription');
	}

<<<<<<< HEAD
	// la fonction qui réupere les donnees du formulaire
	public function traitement_enregistrement()
	{
		// On récupère les infos du formulaire
		$nom         = $this->input->post('nom');
		$prenom      = $this->input->post('prenom');
		$sexe        = $this->input->post('sexe');
		$date_n      = $this->input->post('date');
		$email       = $this->input->post('email');
		$num_tel     = $this->input->post('telephone');
		$num_what    = $this->input->post('numero-whatsapp');
		$horaire     = $this->input->post('horaire');
		$domaine_act = $this->input->post('domaine');
		$type_serv   = $this->input->post('service');
		$attentes    = $this->input->post('attentes');
=======
    // la fonction qui réupere les donnees du formulaire
    public function traitement_enregistrement()
    {
        // On récupère les infos du formulaire
        $nom         = $this->input->post('nom');
        $prenom      = $this->input->post('prenom');
        $sexe        = $this->input->post('sexe');
        $date_n      = $this->input->post('date');
        $email       = $this->input->post('email');
        $num_tel     = $this->input->post('telephone');
        $num_what    = $this->input->post('num_what');
        $horaire     = $this->input->post('horaire');
        $domaine_act = $this->input->post('domaine');
        $type_serv   = $this->input->post('service');
        $attentes    = $this->input->post('attentes');
        $hash        = $this->input->post('hash');
>>>>>>> 46c56cab0b3e77f7298592344079989710e387d3

		// On valide les informations

		$this->form_validation->set_rules('nom', 'Nom', 'required|min_length[3]');
		$this->form_validation->set_rules('prenom', 'Prenom', 'required');
		$this->form_validation->set_rules('num_tel', 'Telephone', 'required');
		$this->form_validation->set_rules('num_what', 'Numero-whatsapp', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
		$this->form_validation->set_rules('sexe', 'Sexe', 'required');
		$this->form_validation->set_rules('date_n', 'Date', 'required');
		$this->form_validation->set_rules('domaine_act', 'Domaine', 'required');
		$this->form_validation->set_rules('type_serv', 'Service', 'required');
		$this->form_validation->set_rules('attentes', 'Attentes', 'required');
		$this->form_validation->set_rules('horaire', 'Horaire', 'required');


<<<<<<< HEAD

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'veillez remplir tous les champs');
			$this->session->set_flashdata('nom_erreur', 'Veillez renseignez votre nom');
			$this->session->set_flashdata('prenom_erreur', 'Veillez renseignez votre Prenom');
			$this->session->set_flashdata('tel_erreur', 'Veillez renseignez votre numero de téléphone');
			$this->session->set_flashdata('telWhat_erreur', 'Veillez renseignez votre numero de téléphone whatsapp');
			redirect('candidat');
		} else {
			$this->session->set_flashdata('message', 'non');
			
			redirect('candidat/inscription_reussi');
			 
		}
		die();

		// On crée un candidat
		/* $candidat = new Candidat_model();

		$candidat->nom_prenom  = $nom . ' ' . $prenom;
		$candidat->num_tel     = $num_tel;
		$candidat->num_what    = $num_what;
		$candidat->email       = $email;
		$candidat->sexe        = $sexe;
		$candidat->date_n      = $date_n;
		$candidat->domaine_act = $domaine_act;
		$candidat->type_serv   = $type_serv;
		$candidat->attentes    = $attentes;
		$candidat->horaire     = $horaire;

		// On enregistre le candidat dans la base de données
		$succes = $candidat->s_enregistrer();

		// On le redirige en fonction du résultat de la requete
		if ($succes) {
			$message = "Bonjour " . ($sexe = 'M' ? 'M.' : 'Mme.') . " " . $candidat->nom_prenom . ", \n\nNous avons bien recu votre inscrion au programme de formation Ecole 241 Business destiné aux commerçants et artisants.
            \n\nCi-dessous, les informations que vous avez fourni lors de votre enregistrement.\n\nMerci pour la confiance accordée, nous vous disons à bientôt.\n\n L'équipe Ecole 241 Business.";

			// On envoie un mail au candidat
			mail($email, 'Ecole 241 Business - Inscription', $message);
=======
        if (isset($hash) and !empty($hash)) {
            $this->load->model('commercial_model');

            $commercial = $this->commercial_model->par_hash($hash);
            if ($commercial) {
                $candidat->id_com = $commercial->id_com;
            }
        }

        // On enregistre le candidat dans la base de données
        $succes = $candidat->s_enregistrer();

        // On le redirige en fonction du résultat de la requete
        if ($succes) {

            $this->session->unset_userdata('hash');

            // On charge la vue du mail
            $message = $this->load->view('email/candidat/enregistrement', '', TRUE);

            $cles    = array('{GENRE}', '{NOM}', '{SEXE}', '{DATE}', '{EMAIL}', '{TEL}', '{WHATSAPP}', '{HEURE}', '{DOMAINE}', '{SERVICE}', '{ATTENNTES}');
            $valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M.'), $candidat->nom_prenom, $candidat->sexe, $candidat->date_n, $candidat->email, $candidat->num_tel, $candidat->num_what, $candidat->horaire, $candidat->domaine_act, $candidat->type_serv, $candidat->attentes);

            $message = str_replace($cles, $valeurs, $message);

            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            //$headers[] = 'MIME-Version: 1.0';
            //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

            // On envoie un mail au candidat
            mail($candidat->email, 'Ecole 241 Business - Inscription', $message, $headers);
>>>>>>> 46c56cab0b3e77f7298592344079989710e387d3

			redirect('candidat/inscription_reussi');
		} else {
			redirect('candidat');
		}*/
	}

<<<<<<< HEAD
	public function inscription_reussi()
	{
		$this->load->view('front/candidat/message_inscription');
	}}
=======
    function mailing()
    {
        $candidat = new Candidat_model();

        $candidat->nom_prenom  = "ONGOUA Dimitri";
        $candidat->num_tel     = "074213803";
        $candidat->num_what    = "";
        $candidat->email       = "ongouadimitri5@gmail.com";
        $candidat->sexe        = "H";
        $candidat->date_n      = "22/03/1995";
        $candidat->domaine_act = "Aucun";
        $candidat->type_serv   = "Manioc";
        $candidat->attentes    = "Cool";
        $candidat->horaire     = "Matin";

        // On charge la vue du mail
        $message = $this->load->view('email/candidat/enregistrement', '', TRUE);

        $cles    = array('{GENRE}', '{NOM}', '{SEXE}', '{DATE}', '{EMAIL}', '{TEL}', '{WHATSAPP}', '{HEURE}', '{DOMAINE}', '{SERVICE}', '{ATTENNTES}');
        $valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M'), $candidat->nom_prenom, $candidat->sexe, $candidat->date_n, $candidat->email, $candidat->num_tel, $candidat->num_what, $candidat->horaire, $candidat->domaine_act, $candidat->type_serv, $candidat->attentes);

        $message = str_replace($cles, $valeurs, $message);

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        //$headers[] = 'MIME-Version: 1.0';
        //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

        // On envoie un mail au candidat
        mail($candidat->email, 'Ecole 241 Business - Inscription', $message, $headers);
    }

    public function inscription_reussi()
    {
        $this->load->view('front/candidat/message_inscription');
    }
}
>>>>>>> 46c56cab0b3e77f7298592344079989710e387d3
