<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial extends CI_Controller
{
    public function index()
    {
        if (est_connecte()) {
            afficher('back/commercial/statistiques');
        } else {
            redirect('commercial/connexion');
        }
    }

    public function inscription()
    {
        $this->load->view('front/commercial/inscription');
    }

    public function connexion()
    {
        $this->load->view('front/commercial/connexion');
    }

    public function deconnexion()
    {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('nom');
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

        // insertion des informations
        $inscrit = $commercial->creer();

        //redirection en fonction du résultat de la requete
        if ($inscrit) {
            $this->session->set_userdata('token', md5(time()));
            $this->session->set_userdata('nom', $commercial->nom_prenom);
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
            $this->session->set_userdata('token', md5(time()));
            $this->session->set_userdata('nom', $commercial->nom_prenom);
            redirect('commercial');
        } else {
            $this->session->set_flashdata('message', "Nom d'utilisateur ou mot de passe incorrect");
            $this->session->set_flashdata('nom_util', $nom_util);
            redirect('commercial/connexion');
        }
    }

    public function ressources()
    {
        if (est_connecte()) {
            afficher('back/commercial/ressources');
        } else {
            redirect('commercial/connexion');
        }
    }

    public function partages()
    {
        if (est_connecte()) {
            afficher('back/commercial/partages');
        } else {
            redirect('commercial/connexion');
        }
    }

    public function transactions()
    {
        if (est_connecte()) {
            afficher('back/commercial/transactions');
        } else {
            redirect('commercial/connexion');
        }
    }
}
