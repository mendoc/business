<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidat  extends CI_Controller {


	//La fonction qui affiche la vue candidat
	public function index()
	{
		$this->load->view('front/candidat/inscription_candidat');
	}

	// la fonction qui réupere les donnees du formulaire
	
	public function recuperation_donnees_candidat()
	{
		// Récupération des donnees
		$nom_complet = $this->input->post('nom') . ' ' . $this->input->post('prenom');
		$params = [
            'nom_prenom'   => $nom_complet,
            'num'      => $this->input->post('telephone'),
            'num_what'     => $this->input->post('numero-whatsapp'),
            'email'        => $this->input->post('email'),
            'sexe'         => $this->input->post('sexe'),
            'date_n'       => $this->input->post('date'),
            'domaine_act'  => $this->input->post('domaine'),
            'type_serv' => $this->input->post('service'),
            'attentes'      => $this->input->post('attentes'),
            'horaire'      => $this->input->post('horaire')
		];
		
        // Chargement du modele
		$this->load->model('candidat');
		// Insertion d'informations
        $success = $this->candidat->inserer_inscription($params);

        if ($success) {
            // Redirection vers la page d'accueil
			redirect('front\candidat\message_inscription');
			
			// Chargement de la librairie email
			$this -> load -> library ( 'email' );
			
			$this -> email -> from ('christadinsi@gmail.com',  'ecole241business'); 
			$this -> email -> to ( $params[email] ); 
			$this -> email -> subject (ecole241business); 
			$this -> email -> message ('Félicitation' .$nom_complet. 'Votre inscription a été bien enregistrée.');
			$this -> email -> send ();
			
        } else {
            // Redirection vers le formulaire
            redirect('front\candidat\inscription_candidat.php');
        }

	}

}
