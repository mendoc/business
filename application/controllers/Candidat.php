<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Controller
{

    //La fonction qui affiche la vue candidat
    public function index()
    {
        $aleat = random_int(1, 5);
        if ($aleat == 3) {
            $this->load->view('front/candidat/inscription_candidat');
        } elseif ($aleat > 3) {
            $this->load->view('front/candidat/nouveau_formulaire_candidat');
        } else {
            $this->load->view('front/candidat/formulaire_inscription_c');
        }
    }

    // la fonction qui réupere les donnees du formulaire
    public function traitement_enregistrement()
    {
        // On valide les informations
        $this->form_validation->set_rules('nom', 'nom', 'required', array(
            'required' => 'Le champ %s est obligatoire',

        ));


        $this->form_validation->set_rules('email', 'email', 'is_unique[eb_candidat.email]|required|valid_email', array(
            'required' => 'Le champ %s est obligatoire',
            'valid_email' => 'Le champ %s n\'est pas valide',
            'is_unique' => 'Cet %s existe déjà'
        ));

        $this->form_validation->set_rules('sexe', 'sexe', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        $this->form_validation->set_rules('telephone', 'telephone', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('annee', 'date de naissance', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('type_cours', 'type de cours', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        $this->form_validation->set_rules('horaire', 'horaire de formation', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));


        // $this->form_validation->set_rules('jour', 'jour de naissance', 'required', array(
        //     'required' => 'Veuillez choisir votre %s',

        // ));
        // $this->form_validation->set_rules('mois', 'mois de naissance', 'required', array(
        //     'required' => 'Veuillez choisir votre %s',

        // ));
        // $this->form_validation->set_rules('annee', 'année de naissance', 'required', array(
        //     'required' => 'Veuillez choisir votre %s',

        // ));
        //Si validation ok
        if ($this->form_validation->run() == true) {
            // On récupère les infos du formulaire
            $nom         = $this->input->post('nom');
            //$prenom      = $this->input->post('prenom');
            $sexe        = $this->input->post('sexe');
            $date_n      = $this->input->post('annee');
            $email       = $this->input->post('email');
            $num_tel     = $this->input->post('telephone');
            $num_what    = $this->input->post('num_what');
            $horaire     = $this->input->post('horaire');
            $domaine_act = $this->input->post('domaine');
            // $type_serv   = $this->input->post('service');
            $attentes    = $this->input->post('attentes');
            $type_cours  = $this->input->post('type_cours');
            $hash        = $this->input->post('hash');
            // On crée un candidat
            $candidat = new Candidat_model();

            $candidat->nom_prenom  = $nom;
            $candidat->num_tel     = $num_tel;
            $candidat->num_what    = $num_what;
            $candidat->email       = $email;
            $candidat->sexe        = $sexe;
            $candidat->date_n      = $date_n;
            $candidat->domaine_act = $domaine_act;
            //$candidat->type_serv   = $type_serv;
            $candidat->attentes    = $attentes;
            $candidat->type_cours  = $type_cours;
            $candidat->horaire     = $horaire;

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

                $cles    = array('{GENRE}', '{NOM}', '{SEXE}', '{DATE}', '{EMAIL}', '{TEL}', '{WHATSAPP}', '{HEURE}', '{SERVICE}', '{ATTENNTES}');
                $valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M.'), $candidat->nom_prenom, $candidat->sexe, $candidat->date_n, $candidat->email, $candidat->num_tel, $candidat->num_what, $candidat->horaire, $candidat->domaine_act, $candidat->attentes);

                $message = str_replace($cles, $valeurs, $message);

                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                //$headers[] = 'MIME-Version: 1.0';
                //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

                // On envoie un mail au candidat
                mail($candidat->email, 'Ecole 241 Business - Inscription', $message, $headers);
                // On redirige vers la page de confirmation
                redirect('candidat/inscription_reussi');
            } else {
                redirect('candidat');
            }
        }

        // On charge la vue inscription_candidat
        $this->load->view('front/candidat/inscription_candidat');
    }
    // ==================================== Traitement deuxième formulaire ===========================

    public function traitement_enregistrement_form2()
    {
        // On valide les informations
        $this->form_validation->set_rules('nom', 'nom', 'required', array(
            'required' => 'Le champ %s est obligatoire',
            'is_unique' => 'Cet %s éxiste déja'
        ));


        $this->form_validation->set_rules('email', 'email', 'is_unique[eb_candidat.email]|required|valid_email', array(
            'required' => 'Le champ %s est obligatoire',
            'valid_email' => 'Le champ %s n\'est pas valide',
            'is_unique' => 'cet %s existe déjà'
        ));

        $this->form_validation->set_rules('sexe', 'genre', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        $this->form_validation->set_rules('telephone', 'telephone', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('domaine', 'Votre activité', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('type_cours', 'type de cours', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        // //$this->form_validation->set_rules('modalite', 'Modalite de paiement', 'required', array(
        //     'required' => 'Veuillez choisir votre %s',
        // ));


        //Si validation ok
        if ($this->form_validation->run() == true) {
            // On récupère les infos du formulaire
            $nom         = $this->input->post('nom');
            $email       = $this->input->post('email');
            $sexe        = $this->input->post('sexe');
            $num_tel     = $this->input->post('telephone');
            $domaine_act = $this->input->post('domaine');
            $type_cours  = $this->input->post('type_cours');
            $modal_paiement = !empty($this->input->post('modalite')) ? $this->input->post('modalite') : 1;
            $date_n      = "";
            //$prenom      = $this->input->post('prenom');
            $num_what    = "";;
            $horaire     = "";;
            // $type_serv   = $this->input->post('service');
            $attentes    = "";;
            $hash        = $this->input->post('hash');
            // On crée un candidat
            $candidat = new Candidat_model();

            $candidat->nom_prenom  = $nom;
            $candidat->num_tel     = $num_tel;
            $candidat->num_what    = $num_what;
            $candidat->email       = $email;
            $candidat->sexe        = $sexe;
            $candidat->date_n      = $date_n;
            $candidat->domaine_act = $domaine_act;
            //$candidat->type_serv   = $type_serv;
            $candidat->attentes    = $attentes;
            $candidat->type_cours  = $type_cours;
            $candidat->horaire     = $horaire;
            $candidat->modal_paiement = $modal_paiement;

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

                $cles    = array('{GENRE}', '{NOM}', '{SEXE}', '{EMAIL}', '{TEL}', '{SERVICE}');
                $valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M.'), $candidat->nom_prenom, $candidat->sexe, $candidat->email, $candidat->num_tel, $candidat->domaine_act);

                $message = str_replace($cles, $valeurs, $message);

                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                //$headers[] = 'MIME-Version: 1.0';
                //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

                // On envoie un mail au candidat
                mail($candidat->email, 'Ecole 241 Business - Inscription', $message, $headers);
                // On redirige vers la page de confirmation
                redirect('candidat/inscription_reussi');
            } else {
                redirect('candidat');
            }
        }

        // On charge la vue inscription_candidat
        $this->load->view('front/candidat/nouveau_formulaire_candidat');
    }
    //================================= form c ======================================
    public function traitement_enregistrement_form3()
    {
        // On valide les informations
        $this->form_validation->set_rules('nom', 'nom', 'required', array(
            'required' => 'Le champ %s est obligatoire',
            'is_unique' => 'Cet %s éxiste déja'
        ));


        $this->form_validation->set_rules('email', 'email', 'is_unique[eb_candidat.email]|required|valid_email', array(
            'required' => 'Le champ %s est obligatoire',
            'valid_email' => 'Le champ %s n\'est pas valide',
            'is_unique' => 'cet %s existe déjà'
        ));

        $this->form_validation->set_rules('sexe', 'genre', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        $this->form_validation->set_rules('telephone', 'telephone', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('domaine', 'Votre activité', 'required', array(
            'required' => 'Le champ %s est obligatoire',
        ));

        $this->form_validation->set_rules('type_cours', 'type de cours', 'required', array(
            'required' => 'Veuillez choisir votre %s',
        ));

        // //$this->form_validation->set_rules('modalite', 'Modalite de paiement', 'required', array(
        //     'required' => 'Veuillez choisir votre %s',
        // ));


        //Si validation ok
        if ($this->form_validation->run() == true) {
            // On récupère les infos du formulaire
            $nom         = $this->input->post('nom');
            $email       = $this->input->post('email');
            $sexe        = $this->input->post('sexe');
            $num_tel     = $this->input->post('telephone');
            $domaine_act = $this->input->post('domaine');
            $type_cours  = $this->input->post('type_cours');
            $modal_paiement = !empty($this->input->post('modalite')) ? $this->input->post('modalite') : 1;
            $date_n      = "";
            //$prenom      = $this->input->post('prenom');
            $num_what    = "";;
            $horaire     = "";;
            // $type_serv   = $this->input->post('service');
            $attentes    = "";;
            $hash        = $this->input->post('hash');
            // On crée un candidat
            $candidat = new Candidat_model();

            $candidat->nom_prenom  = $nom;
            $candidat->num_tel     = $num_tel;
            $candidat->num_what    = $num_what;
            $candidat->email       = $email;
            $candidat->sexe        = $sexe;
            $candidat->date_n      = $date_n;
            $candidat->domaine_act = $domaine_act;
            //$candidat->type_serv   = $type_serv;
            $candidat->attentes    = $attentes;
            $candidat->type_cours  = $type_cours;
            $candidat->horaire     = $horaire;
            $candidat->modal_paiement = $modal_paiement;

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

                $cles    = array('{GENRE}', '{NOM}', '{SEXE}', '{EMAIL}', '{TEL}', '{SERVICE}');
                $valeurs = array(($candidat->sexe == 'F' ? 'Mme' : 'M.'), $candidat->nom_prenom, $candidat->sexe, $candidat->email, $candidat->num_tel, $candidat->domaine_act);

                $message = str_replace($cles, $valeurs, $message);

                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                //$headers[] = 'MIME-Version: 1.0';
                //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

                // On envoie un mail au candidat
                mail($candidat->email, 'Ecole 241 Business - Inscription', $message, $headers);
                // On redirige vers la page de confirmation
                redirect('candidat/inscription_reussi');
            } else {
                redirect('candidat');
            }
        }

        // On charge la vue inscription_candidat
        $this->load->view('front/candidat/formulaire_inscription_c');
    }
    // ================================ fonction test email =========================
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
        $this->load->view('front/candidat/messageinscription');
    }
}
