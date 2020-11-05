<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ressource_partage_model extends CI_Model
{
    public $lien_gen;
    public $nbr_visite;
    public $id_res;
    public $id_com;

    // Nom de la table
    private $table = 'ressource_partage';

    // Clé primaire de la table
    private $id = 'id_res_part';

    public function __construct()
    {
        $this->load->database();
    }

    //Selectionner tous les Ressource_partage
    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function creer()
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
    //Selectionner tous les Ressource_partage

    public function un($id)
    {
        $query = $this->db->get($this->table, array($this->id => $id));
        return $query->result();
    }

    public function incrementer_visite($hash)
    {
        $query = $this->db->get_where($this->table, array('lien_gen' => $hash));
        $ressource = $query->row();

        if ($ressource) {
            return $this->db->update($this->table, array('nbr_visite' => $ressource->nbr_visite + 1), array($this->id => $ressource->id_res_part));
        } else {
            return FALSE;
        }
    }

    public function par_hash($hash)
    {
        $query = $this->db->get_where($this->table, array('lien_gen' => $hash));
        return $query->row();
    }
}
