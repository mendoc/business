<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thematique_model extends CI_Model
{

    public $titre;
    public $description;

    // Nom de la table
    private $table = 'thematique';
    
    // Clé primaire de la table
    private $id = 'id_them';
    
    public function __construct()
    {
        $this->load->database();
    }

    //lister toutes les thematiques
    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    //Modifier une thematique 
    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }
    
    //supprimer une thematique
    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }

    //ajouter thematique
    public function creer()
    {
        return $this->db->insert($this->table, $this);
    }
}
