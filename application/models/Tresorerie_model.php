<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tresorerie_model extends CI_Model
{
    public $motif;
    public $montant;
    public $date_ret;
    public $id_gest;
    

    // Nom de la table
    private $table = 'tresorerie';

    // Clé primaire de la table
    private $id = 'id_tres';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function creer()
    {
        return $this->db->insert($this->table, $this);
    }
}