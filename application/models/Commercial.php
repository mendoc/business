<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial extends CI_Model
{

    public $nom_prenom;
    public $num_tel;
    public $num_what;
    public $email;
    public $sexe;
    public $date_n;
    public $nom_util;
    public $mot_passe;

    public function __construct()
    {
        $this->load->database();
    }

    public function tous_les_commerciaux()
    {
        $query = $this->db->get('eb_commercial');
        return $query->result();
    }

    public function connexion($params)
    {
        $this->nom_util   = $params['nom_util'];
        $this->mot_passe  = $params['mot_passe'];
        $query = $this->db->get_where('eb_commercial', array('nom_util' => $params['nom_util'], 'mot_passe' => $params['mot_passe']));

        return $query->row();
    }

    public function supprimer_commercial($params)
    {
        $this->nom_prenom = $params['nom_prenom']; // please read the below note
        $this->num_tel    = $params['num_tel'];
        $this->num_what   = $params['num_what'];
        $this->email      = $params['email'];
        $this->sexe       = $params['sexe'];
        $this->date_n     = $params['date_n'];
        $this->nom_util   = $params['nom_util'];
        $this->mot_passe  = $params['mot_passe'];

        return $this->db->delete('eb_commercial', array('id' => $params['id']));
    }

    public function modifier_commercial($params)
    {
        $this->nom_prenom = $params['nom_prenom']; // please read the below note
        $this->num_tel    = $params['num_tel'];
        $this->num_what   = $params['num_what'];
        $this->email      = $params['email'];
        $this->sexe       = $params['sexe'];
        $this->date_n     = $params['date_n'];
        $this->nom_util   = $params['nom_util'];
        $this->mot_passe  = $params['mot_passe'];

        return $this->db->update('eb_commercial', $this, array('id' => $params['id']));
    }

    public function ajouter_commercial($params)
    {
        $this->nom_prenom = $params['nom_prenom']; // please read the below note
        $this->num_tel    = $params['num_tel'];
        $this->num_what   = $params['num_what'];
        $this->email      = $params['email'];
        $this->sexe       = $params['sexe'];
        $this->date_n     = $params['date_n'];
        $this->nom_util   = $params['nom_util'];
        $this->mot_passe  = $params['mot_passe'];

        return $this->db->insert('eb_commercial', $this);
    }
}
