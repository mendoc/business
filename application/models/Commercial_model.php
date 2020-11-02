<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial_model extends CI_Model
{

    public $nom_prenom;
    public $num_tel;
    public $num_what;
    public $email;
    public $sexe;
    public $date_n;
    public $nom_util;
    public $mot_passe;

    // Nom de la table
    private $table = 'commercial';

    // Clé primaire de la table
    private $id = 'id_com';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function connexion($nom_util, $mot_passe)
    {
        $query = $this->db->get_where($this->table, array('nom_util' => $nom_util, 'mot_passe' => $mot_passe));

        return $query->row();
    }

    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }

    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    public function creer()
    {
        return $this->db->insert($this->table, $this);
    }
}
