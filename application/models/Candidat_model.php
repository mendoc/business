<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat_model extends CI_Model
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

    // Nom de la table
    private $table = 'candidat';

    // Clé primaire de la table
    private $id = 'id_can';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function s_enregistrer()
    {
        return $this->db->insert($this->table, $this);
    }

    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }

    public function recuperer($id)
    {
        $query = $this->db->get_where($this->table, array($this->id => $id));
        return $query->row();
    }

    public function recherche_candidat($nom_prenom)
    {
        $this->db->like('nom_prenom', $nom_prenom);
        return $this->db->get($this->table)->result();
    }

    public function interval_candidat($limite, $debut)
    {
        $this->db->limit($limite, $debut);
        return $this->db->get($this->table)->result();
    }

    public function nombre_candidats()
    {
        return $this->db->count_all($this->table);
    }
}
