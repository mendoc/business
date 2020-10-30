<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Model
{

    public $mot_passe;
    public $nom_prenom;
    public $email_gest;

    public function __construct()
    {
        $this->load->database();
    }

    public function tous_les_gestionnaires()
    {
        $query = $this->db->get('eb_gestionnaire', 10);
        return $query->result();
    }

    public function ajout_gestionnaire($params)
    {
        $this->nom_prenom    = $params['nom_prenom'];
        $this->email_gest  = $params['email_gest'];
        $this->mot_passe     = $params['mot_passe'];

        $this->db->insert('eb_gestionnaire', $this);
    }
}
