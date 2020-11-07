<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retrait_model extends CI_Model
{

    public $montant_retrait;
    public $date_fin;
    public $date_debut;
    public $id_com;
    public $num_ret;
    public $id_gest;


    // Nom de la table
    private $table = 'retrait';

    // Clé primaire de la table
    private $id = 'id_ret';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    //Selectionner un retrait
    public function un($id)
    {
        $query = $this->db->get($this->table, array($this->id => $id));
        return $query->row();
    } 

    public function pour_commercial($id_com)
    {
        $this->db->select_sum('montant_retrait');
        $query = $this->db->get($this->table, array('id_com' => $id_com));
        return $query->row();
    }

    public function liste_pour_commercial($id_com)
    {
        $this->db->join('gestionnaire', "gestionnaire.id_gest = {$this->table}.id_gest");
        $this->db->where('id_com', $id_com);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function total_retrait()
    {
        $this->db->select_sum('montant_retrait');
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function ajouter()
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
}
