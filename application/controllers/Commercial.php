<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial extends CI_Controller
{
    public function index()
    {
        if (!$this->est_connecte()) {
            redirect('commercial/connexion');
        }

        $commercial = $this->commercial_model->par_email($this->session->userdata('email_com'));

        if (!$commercial) {
            redirect('commercial/connexion');
        }

        $this->load->helper('form');

        $this->load->model('statistique_model');
        $this->load->model('retrait_model');

        $result = $this->statistique_model->visites_par_commercial($commercial->id_com);
        // Nombre de visites du commercial
        //var_dump($result);
        //die;
        if ($result) $nb_visites_com = $result->nb_visites_com;
        else $nb_visites_com = 0;

        // Nombre de candidats en présentiel du commercial
        $result = $this->statistique_model->candidats_com_presentiel($commercial->id_com);
        if ($result) $nb_candidats_com_presentiel = $result->nb_candidats_com_presentiel;
        else $nb_candidats_com_presentiel = 0;

        // Nombre de candidats en ligne du commercial
        $result = $this->statistique_model->candidats_com_ligne($commercial->id_com);
        if ($result) $nb_candidats_com_ligne = $result->nb_candidats_com_ligne;
        else $nb_candidats_com_ligne = 0;

        // Nombre d'affiliés en présentiel du commercial
        $result = $this->statistique_model->affilies_com_presentiel($commercial->id_com);
        if ($result) $nb_affilies_com_presentiel = $result->nb_affilies_com_presentiel;
        else $nb_affilies_com_presentiel = 0;

        // Nombre d'affiliés en ligne du commercial
        $result = $this->statistique_model->affilies_com_ligne($commercial->id_com);
        if ($result) $nb_affilies_com_ligne = $result->nb_affilies_com_ligne;
        else $nb_affilies_com_ligne = 0;

        // Commission du commercial
        $commission = $nb_affilies_com_presentiel * POURCENTAGE_PRE * COUT_PRESENTIEL;
        $commission += $nb_affilies_com_ligne * POURCENTAGE_LIGNE * COUT_EN_LIGNE;

        // Bonus du commercial
        $bonus = 0;

        // Retrait du commercial
        $result = $this->retrait_model->pour_commercial($commercial->id_com);
        if ($result) $retrait = $result->montant_retrait;
        else $retrait = 0;

        // Solde du commercial
        $solde = $commission - $retrait;

        $data = array(
            'nb_visites_com' => $nb_visites_com,
            'nb_candidats_com_presentiel' => $nb_candidats_com_presentiel,
            'nb_candidats_com_ligne' => $nb_candidats_com_ligne,
            'nb_affilies_com_presentiel' => $nb_affilies_com_presentiel,
            'nb_affilies_com_ligne' => $nb_affilies_com_ligne,
            'commission' => $commission,
            'retrait' => $retrait,
            'solde' => $solde,
            'bonus' => $bonus,
        );

        afficher('back/commercial/statistiques', $data);
    }

    public function inscription()
    {
        $this->load->view('front/commercial/inscription');
    }

    public function connexion()
    {
        $this->session->sess_destroy();
        $this->load->view('front/commercial/connexion');
    }

    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('commercial/connexion');
    }

    public function traitement_inscription()
    {
        // récupération des données
        $nom_complet = $this->input->post('nom') . ' ' . $this->input->post('prenom');
        $nom_prenom  = $nom_complet;
        $num_tel     = $this->input->post('num_tel');
        $num_what    = $this->input->post('num_what');
        $email       = $this->input->post('email');
        $sexe        = $this->input->post('sexe');
        $date_n      = $this->input->post('date_n');
        $nom_util    = $this->input->post('nom_util');
        $mot_passe   = $this->input->post('mot_passe');

        // On valide les informations

        // On raccourcit le lien
        $this->load->helper('bitly');
        $hash = sha1(time());
        $raccourci = raccourcir_lien(site_url('partage/') . $hash);

        // On crée l'objet pour la requete
        $commercial = new Commercial_model();
        $commercial->nom_prenom = $nom_prenom;
        $commercial->num_tel    = $num_tel;
        $commercial->num_what   = $num_what;
        $commercial->email      = $email;
        $commercial->sexe       = $sexe;
        $commercial->date_n     = $date_n;
        $commercial->nom_util   = $nom_util;
        $commercial->mot_passe  = $mot_passe;
        $commercial->hash       = $hash;
        $commercial->raccourci  = $raccourci;

        // insertion des informations
        $inscrit = $commercial->creer();

        //redirection en fonction du résultat de la requete
        if ($inscrit) {
            $this->session->set_userdata('token_com', md5(time()));
            $this->session->set_userdata('nom_com', $commercial->nom_prenom);
            $this->session->set_userdata('email_com', $commercial->email);
            $this->session->set_userdata('hash', $commercial->hash);
            $this->session->set_userdata('raccourci', $commercial->raccourci);
            redirect('commercial');
        } else {
            redirect('commercial/inscription');
        }
    }

    public function traitement_connexion()
    {
        //récupération des données
        $nom_util   = $this->input->post('nom_util');
        $mot_passe  = $this->input->post('mot_passe');

        // Validation des données

        //insertion d'information
        $commercial = $this->commercial_model->connexion($nom_util, $mot_passe);

        if ($commercial) {

            $this->load->helper('bitly');

            if (!$commercial->hash) {
                $hash = sha1($commercial->id_com);
                $commercial->hash = $hash;

                // On génère le raccourci
                $raccourci = raccourcir_lien(site_url('partage/') . $hash);

                $params = array(
                    'hash' => $hash,
                    'raccourci' => $raccourci
                );

                $this->commercial_model->save_infos($params, $commercial->id_com);
            } else {
                if (!$commercial->raccourci) {
                    // On génère le raccourci
                    $raccourci = raccourcir_lien(site_url('partage/') . $commercial->hash);

                    $params = array(
                        'raccourci' => $raccourci
                    );

                    $this->commercial_model->save_infos($params, $commercial->id_com);
                }
            }

            $this->session->set_userdata('token_com', md5(time()));
            $this->session->set_userdata('nom_com', $commercial->nom_prenom);
            $this->session->set_userdata('email_com', $commercial->email);
            $this->session->set_userdata('hash', $commercial->hash);
            $this->session->set_userdata('raccourci', $commercial->raccourci);
            redirect('commercial');
        } else {
            $this->session->set_flashdata('message', "Nom d'utilisateur ou mot de passe incorrect");
            $this->session->set_flashdata('nom_util', $nom_util);
            redirect('commercial/connexion');
        }
    }

    public function traitement_retrait()
    {
        $this->load->model('retrait_model');
        $this->load->model('commercial_model');

        $commercial = $this->commercial_model->par_email($this->session->userdata('email_com'));

        $montant = $this->input->post('montant');
        $numero = $this->input->post('numero');

        $retrait = new Retrait_model();
        $retrait->montant_retrait = $montant;
        $retrait->num_ret = $numero;
        $retrait->id_com = $commercial->id_com;

        if ($retrait->ajouter()) {
            redirect('commercial');
        }
    }

    public function ressources()
    {
        if (!$this->est_connecte()) {
            redirect('commercial/connexion');
        }

        //Récupération de toutes les ressources
        $this->load->model('ressource_model');

        $commercial = $this->commercial_model->par_email($this->session->userdata('email_com'));

        $tuples = $this->ressource_model->par_commercial($commercial->id_com);

        $images = array();
        $videos = array();
        $documents = array();

        foreach ($tuples as $tuple) {
            if ($tuple->type_res == 'Image') array_push($images, $tuple);
            else if ($tuple->type_res == 'Vidéo') array_push($videos, $tuple);
            else if ($tuple->type_res == 'Document') array_push($documents, $tuple);
        }

        $data = array(
            "images"    => $images,
            "documents" => $documents,
            "videos"    => $videos,
            "id_com"    => $commercial->id_com,
        );

        //Affichage de la vue de listing des ressources
        afficher("back/commercial/ressources", $data);
    }

    public function partages()
    {
        if (!$this->est_connecte()) {
            redirect('commercial/connexion');
        }

        $commercial = $this->commercial_model->par_email($this->session->userdata('email_com'));

        $this->load->model('ressource_partage_model');

        $partages = $this->ressource_partage_model->pour_commercial($commercial->id_com);

        $data = array(
            'id_com' => $commercial->id_com,
            'partages' => $partages,
        );

        afficher('back/commercial/partages', $data);
    }

    public function transactions()
    {
        if (!$this->est_connecte()) {
            redirect('commercial/connexion');
        }

        $commercial = $this->commercial_model->par_email($this->session->userdata('email_com'));

        $this->load->model('retrait_model');

        $retraits = $this->retrait_model->liste_pour_commercial($commercial->id_com);

        $data = array(
            'id_com' => $commercial->id_com,
            'retraits' => $retraits,
        );

        afficher('back/commercial/transactions', $data);
    }

    private function est_connecte()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $token_com = $CI->session->userdata('token_com');

        return $token_com != null;
    }

    public function reinitialiser_mot_de_passe()
    {
        $this->load->view('back/commercial/mot_de_passe_oublie');
    }

    public function traitement_mot_de_passe()
    {
        $email = $this->input->post('email');
        if ($commercial = $this->commercial_model->par_email($email)) {

            $nouveau_mot_passe = rand(1000, 9999);

            if ($this->commercial_model->modifier_mot_de_passe($commercial->id_com, $nouveau_mot_passe)) {

                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: Ecole 241 Business <contact@business.ecole241.org>\r\n";

                $message = "Il est maintenant possible de vous connecter via $nouveau_mot_passe";

                mail($commercial->email,  'Ecole 241 Business - Nouveau mot de passe', $message, $headers);

                $this->session->set_flashdata('message-success', "Verifiez votre boite mail");
                $this->session->set_flashdata('email-com', $commercial->nom_util);

                redirect('commercial/connexion');
            } else {
                echo 'Bien';
            }
        } else {
            $this->session->set_flashdata('message-error', "Votre email n'existe pas");
            redirect('commercial/reinitialiser_mot_de_passe');
        }
    }
}
