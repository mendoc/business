<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paiement_model extends CI_Model
{

    // Nom de la table
    private $table = 'paiement';

    // Clé primaire de la table
    private $id = 'id_paie';

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
        return $query->num_rows() >= 1 ? true : false;
    }

    public function tous()
    {
        $query = $this->db->get('paiement');
        return $query->result();
    }

    public function chiffre_affaire()
    {
        $query = $this->db->get('paiement');
        
        $this->db->select_sum('montant');
        $query = $this->db->get('paiement');
        return $query->row();
    }

    // Les paiements d'un candidats specifique
    // public function mes_paiements($id)
    // {
    //     $query = $this->db->get_where('eb_paiement', array('id_can' => $id));
    // }

    // Recuperer un paiement(Ligne)
    // Renvoie false si le candidat n'a effectue aucun paiement
    public function recuperer($id)
    {
        $query = $this->db->get_where($this->table, array('id_can' => $id));
        return !empty($query->result()) ? $query->result() : false;
    }

    public function recuperer_tout_le_montant($id)
    {
        $paiements = $this->db->get_where($this->table, array('id_can' => $id))->result();
        $montant_total = 0;
        if (!empty($paiements)) {
            foreach ($paiements as $paiement) {
                $montant_total += (int)$paiement->montant;
            }
        }

        return $montant_total;
    }

    public function modifier($paiement)
    {
        $this->db->where('id_paie', $paiement->id_paie);
        return $this->db->update($this->table, $paiement);
    }

    // Inserer un paiement dans la base de donnees
    public function inserer($paiement)
    {
        return $this->db->insert($this->table, $paiement);
    }
}
