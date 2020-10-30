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
    
    public function traitement_connexion()
	{
        //récupération des données
        $params = [
            'nom_util'   => $this->input->post('nom_util'),
            'mot_passe'  => $this->input->post('mot_passe')
        ];

        /*vérification des données
        $this->form_validation->set_rules('username', 'nom_util', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'mot_passe', 'trim|required|min_length[8]');*/

        //chargement du modèle
        $this->load->model(commercial);

        //insertion d'information
        $succes = $this->commercial->connexion($params);

        if ($succes) {
            redirect('commercial/statistiques');
        }
        else {
            redirect('commercial/connexion');
        }
    }
    
    
	public function statistiques()
	{
		$this->load->view('front/commercial/statistiques');
    }
    









	/*public function traitement_inscription()
	{
        //methode1

        // récupération des données
        $params = [
            'nom_prenom'   => $this->input->post('nom_prenom'),
            'num_tel'      => $this->input->post('num_tel'),
            'num_what'     => $this->input->post('num_what'),
            'email'        => $this->input->post('email'),
            'sexe'         => $this->input->post('sexe'),
            'date_n'       => $this->input->post('date_n'),
            'nom_util'     => $this->input->post('nom_util'),
            'mot_passe'    => $this->input->post('mot_passe')
        ];


        //chargement du modèle

        $this->load->model(commercial)
        
        // insertion des informations
        //$succes = $this->commercial->ajouter_commercial($params)

        //redirection vers lapage d'acceuil
        if ($succes) {
            redirect('commercial/statistiques');
        }
        else {
            redirect('commercial/inscription');
        }
		
	}*/
}
