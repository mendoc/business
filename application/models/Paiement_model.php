<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paiement_model extends CI_Model
{
    public function __construct()
    {
        // Chargement de la base de donnees 
        $this->load->database();
    }

    // Verifie si un candicat a paye son inscription :
    // id_can : int - l'identifiant d'un candidat
    // Retourne true si il est dans le tableau sinon false
    public function est_un_apprenant($id_can)
    {
        $this->db->where('id_can', $id_can);
        $query = $this->db->get('paiement');
        return $query->num_rows() == 1 ? true : false;
    }

    public function tous_paiements()
    {
        $query = $this->db->get('paiement');
        return $query->result();
    }
}
