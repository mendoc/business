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
        $this->form_validation->set_rules('email', 'adresse mail', 'required|is_unique[eb_candidat.email]|valid_emails|regex_match[#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#]', array(
            'required' => 'Le champ %s est obligatoire',
            'valid_emails' => 'Le champ %s n\'est pas valide',
            'regex_match' => 'Le champ %s n\'est pas valide',
            'is_unique' => '%s éxiste déja'
        ));
        $this->form_validation->set_rules('telephone', 'telephone', 'required|regex_match[/^0(62|74|77|65|66|11)\d{6}$/]', array(
            'required' => 'Le champ %s est obligatoire',
            'regex_match' => 'Le format du %s n\'est pas valide'
        ));
        $this->form_validation->set_rules('numero-whatsapp', 'numero-whatsapp', 'required|regex_match[/^0(62|74|77|65|66)\d{6}$/]', array(
            'required' => 'Le champ %s est obligatoire',
            'regex_match' => 'Le format du %s n\'est pas valide'
        ));
        // si condition ok   
        if ($this->form_validation->run()) {
            // On récupère les infos du formulaire
            $nom         = $this->input->post('nom');
            $prenom      = $this->input->post('prenom');
            $email       = $this->input->post('email');
            $jour       = $this->input->post('jour');
            $mois       = $this->input->post('mois');
            $ans       = $this->input->post('ans');
            $sexe        = $this->input->post('sexe');
            $num_tel     = $this->input->post('telephone');
            $num_what    = $this->input->post('num_what');
            $domaine_act = $this->input->post('domaine_act');
            $horaire     = $this->input->post('horaire');
            $type_cours     = $this->input->post('type_cours');
            $attentes    = $this->input->post('attentes');
            $hash        = $this->input->post('hash');

            // On crée un candidat
            $candidat = new Candidat_model();

            $candidat->nom_prenom  = $nom . ' ' . $prenom;
            $candidat->num_tel     = $num_tel;
            $candidat->num_what    = $num_what;
            $candidat->email       = $email;
            $candidat->sexe        = $sexe;
            $candidat->date_n      = $ans . '/' . $mois . '/' . $jour;
            $candidat->domaine_act = $domaine_act;
            $candidat->type_cours   = $type_cours;
            $candidat->attentes    = $attentes;
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

                redirect('candidat/inscription_reussi');
            } else {
                redirect('candidat');
            }
        }

        $this->load->view('front/candidat/inscription_candidat');
    }

    /* la fonction qui réupere les donnees du formulaire
    public function traitement_enregistrement()
    {

    }*/

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
