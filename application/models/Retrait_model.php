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
    public $justificatif;



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
        $query = $this->db->get_where($this->table, array($this->id => $id));
        return $query->row();
    } 

    public function pour_commercial($id_com)
    {
        $this->db->select_sum('montant_retrait');
        $this->db->where('date_fin !=', NULL);
        $query = $this->db->get_where($this->table, array('id_com' => $id_com));
        return $query->row();
    }

    public function liste_pour_commercial($id_com)
    {
        $this->db->join('gestionnaire', "gestionnaire.id_gest = {$this->table}.id_gest");
        $this->db->where('id_com', $id_com);
        $query = $this->db->get($this->table);
        return $query->result();
    } 

    //Lister les retraits traités
    public function total_retrait()
    {
        $this->db->select_sum('montant_retrait');
        $query = $this->db->get_where($this->table, 'date_fin !=', null);
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
    //Les retraits d'un commercial
    public function retraits_commercial($id){

        $sql =" SELECT * 
                FROM eb_retrait
                WHERE id_com = ?
                AND date_fin IS NOT NULL; ";
       return $this->db->query($sql, array($id))->result();
       
    }
    //Les retraits non traités d'un commercial
    public function demande_retraits_commercial($id){

        $sql =" SELECT * 
                FROM eb_retrait
                WHERE id_com = ?; ";
        return $this->db->query($sql, array($id))->result();
        
    }

    // Renvoie le nombre de transactions effectues
    public function nombre_retraits()
    {
        return $this->db->count_all($this->table);
    }

    // Renvoie le nombre de transactions dans un intervalle precis
    public function recuperer_retraits($limite, $debut)
    {
        $this->db->limit($limite, $debut);
        return $this->db->get($this->table)->result();
    }
}
