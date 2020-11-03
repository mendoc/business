<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistique_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function candidats_par_commercial($id)
    {
        $sql = "SELECT COUNT(id_can)
        FROM eb_candidat 
        WHERE id_res_part IS NOT NULL
        AND eb_candidat.id_res_part IN (
        SELECT id_res_part 
        FROM eb_ressource_partage
        WHERE id_com = ?;))";
        return $this->db->query($sql, array($id));
    }


    public function nombre_candidat_ligne() //Nbre de tous les candidats en ligne
    {
        $sql = "SELECT COUNT(id_can)
        FROM eb_candidat
        WHERE type_cours = \"L\"";

        return $this->db->query($sql);
    }

    public function nombre_candidat_presentiel() // Nbre de tous les candidats en presentiel
    {
        $sql = "SELECT COUNT(id_can)
        FROM eb_candidat
        WHERE type_cours = \"P\"";

        return $this->db->query($sql);
    }

    public function nombre_apprenat_ligne() //Nbre de tous les apprenants en Ligne
    {
        $sql = " SELECT COUNT(eb_candidat.id_can)
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"L\"
        GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) = 90000";
    }

    public function nombre_apprenant_presentiel() //Nbre de tous les apprenants en presentiel
    {
        $sql = "  SELECT COUNT(eb_candidat.id_can)
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"L\"
        GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) = 155000";

        return $this->db->query($sql);
    }

    public function nombre_commerciaux() // Nbre de tous les commerciaux
    {
        $sql = "SELECT COUNT(id_com)
        FROM eb_commercial";

        return $this->db->query($sql);
    }

    public function somme_retraits() //somme de tous les retraits
    {
        $sql = "SELECT SUM(montant)
        FROM  eb_paiement";

        return $this->db->query($sql);
    }
} 
