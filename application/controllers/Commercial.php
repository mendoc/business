<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commercial extends CI_Controller {

	
	public function index()
	{
		$this->load->view('front/commercial/connexion');
    }

    public function inscription()
	{
		$this->load->view('front/commercial/inscription');
    }

    public function statistiques()
	{
		afficher('back/commercial/statistiques');
    }



    public function traitement_inscription()
	{
        // récupération des données
        $nom_complet = $this->input->post('nom') .' '. $this->input->post('prenom');
        $params = [
            'nom_prenom'   => $nom_complet,
            'num_tel'      => $this->input->post('num_tel'),
            'num_what'     => $this->input->post('num_what'),
            'email'        => $this->input->post('email'),
            'sexe'         => $this->input->post('sexe'),
            'date_n'       => $this->input->post('date_n'),
            'nom_util'     => $this->input->post('nom_util'),
            'mot_passe'    => $this->input->post('mot_passe')
        ];

        //chargement du modèle
        $this->load->model('commercial_model');
        
        // insertion des informations
        $inscrit = $this->commercial_model->ajouter_commercial($params);

        //redirection vers la page d'acceuil
        if ($inscrit) {
            redirect('commercial/statistiques');
        }
        else {
            redirect('commercial/inscription');
        }
		
	}
      
    public function traitement_connexion()
	{
        //récupération des données
        $params = [
            'nom_util'   => $this->input->post('nom_util'),
            'mot_passe'  => $this->input->post('mot_passe')
        ];

        //chargement du modèle
        $this->load->model('commercial_model');

        //insertion d'information
        $succes = $this->commercial_model->connexion($params);

        if ($succes) {
            redirect('commercial/statistiques');
        }
        else {
            redirect('commercial');
        }
    }
    

}
