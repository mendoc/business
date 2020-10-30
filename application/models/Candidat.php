<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Model
{

    public $nom_prenom;
    public $num_tel;
    public $num_what;
    public $email;
    public $sexe;
    public $date_n;
    public $domaine_act;
    public $type_serv;
    public $attentes;
    public $horaire;
    public $id_res_part;

    public function __construct()
    {
        $this->load->database();
    }


    public function tous_les_candidats() // fonction pour lister tous les candidats
    {

        $query = $this->db->get('eb_candidat');
        return $query->result();
    }

    public function ajouter_candidat($params) //fonction pour ajouter un candidat
    {
        $this->nom_prenom = $params['nom_prenom']; 
        $this->num_tel    = $params['num_tel'];
        $this->num_what   = $params['num_what'];
        $this->email      = $params['email'];
        $this->sexe       = $params['sexe'];
        $this->date_n     = $params['date_n'];
        $this->domaine_act   = $params['domaine_act'];
        $this->type_serv = $params['type_serv'];
        $this->attentes = $params['attentes'];
        $this->horaire = $params['horaire'];
        $this->id_res_part = $params['id_res_part'];

        return $this->db->insert('eb_candidat', $this);
    }
}
