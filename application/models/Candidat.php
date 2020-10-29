<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidat extends CI_Model {

public $nom_prenom ;
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


public function tous_les_candidats()
{
        $query = $this->db->get('eb_candidat');
        return $query->result();
}

}