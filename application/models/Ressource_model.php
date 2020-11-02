<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ressource_model extends CI_Model
{
    public $nom_res;
    public $lien;
    public $fichier;
    public $date_res;
    public $type_res;
    public $id_them;
    public $id_gest;

    // Nom de la table
    private $table = 'ressource';

    // Clé primaire de la table
    private $id = 'id_res';

    public function __construct()
    {
        $this->load->database();
    }

    //lister toutes les ressources 
    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    //Ajouter ressource
    public function inserer()
    {
        return $this->db->insert($this->table, $this);
    }

    // Mettre à jour des ressources
    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    // Supprimer une ressource
    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }
}
