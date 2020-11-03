<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Controller
{
    //La fonction qui affiche la vue candidat
    public function index()
    {
        // On valide les informations
        $this->form_validation->set_rules('nom', 'Nom', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('sexe', 'Sexe', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('date', 'Date', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('email', 'email', 'required|valid_emails|regex_match[#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#]', array(
            'required' => 'Le champ %s est obligatoire',
            'valid_emails' => 'Le champ %s n\'est pas valide',
            'regex_match' => 'Le champ %s n\'est pas valide'
        ));
        $this->form_validation->set_rules('telephone', 'telephone', 'required|regex_match[/^0(62|74|77|65|66|11)\d{6}$/]', array(
            'required' => 'Le champ %s est obligatoire',
            'regex_match' => 'Le format du %s n\'est pas valide'
        ));
        $this->form_validation->set_rules('numero-whatsapp', 'numero-whatsapp', 'required|regex_match[/^0(62|74|77|65|66)\d{6}$/]', array(
            'required' => 'Le champ %s est obligatoire',
            'regex_match' => 'Le format du %s n\'est pas valide'
        ));
        $this->form_validation->set_rules('horaire', 'horaire', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('domaine', 'horaire', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('service', 'service', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        $this->form_validation->set_rules('attentes', 'attentes', 'required', array(
            'required' => 'Le champ %s est obligatoire'
        ));
        // si condition ok !
        if ($this->form_validation->run()) {
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
            // On crée un candidat
            $candidat = new Candidat_model();

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
                $message = "Bonjour " . ($sexe == 'F' ? 'Mme.' : 'M.') . " " . $candidat->nom_prenom . ", \n\nNous avons bien reçu votre inscription au programme de formation Ecole 241 Business destiné aux commerçants et artisants.
            \n\nCi-dessous, les informations que vous avez fournies lors de votre enregistrement.\n\nMerci pour la confiance accordée, nous vous disons à bientôt.\n\n L'équipe Ecole 241 Business.";

                // On envoie d'un mail au candidat
                mail($email, 'Ecole 241 Business - Inscription', $message);

                redirect('candidat/inscription_reussi');
                die();
            } else {
                redirect('candidat');
            }
        }

        $this->load->view('front/candidat/inscription');
    }

    /* la fonction qui réupere les données du formulaire
    public function traitement_enregistrement()
    {
        
    }*/

    public function inscription_reussi()
    {
        $this->load->view('front/candidat/message_inscription');
    }
}
