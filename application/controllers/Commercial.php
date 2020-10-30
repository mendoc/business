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
		$this->load->view('front/commercial/connexion');
    }
    









	/*public function traitement_inscription()
	{
        //methode1

        // récupération des données
        
        $nom = $this->input->post('name');
        $prenom = $this->input->post('name');
        $sexe = $this->input->post('name');
        $dateNais = $this->input->post('name');
        $email = $this->input->post('name');
        $numTel = $this->input->post('name');
        $numTel = $this->input->post('name');
        $name = $this->input->post('name');
        $name = $this->input->post('name');
        $name = $this->input->post('name');
        $name = $this->input->post('name');


        // vérification des données

        //chargement du modèle

        $this->load->model(inscription_model)

        //insertion d'information
        //$succes = $this->inscription_model->inserer_inscription()

        //redirection vers lapage d'acceuil
		afficher('back/commercial/statistiques');
	}*/
}
