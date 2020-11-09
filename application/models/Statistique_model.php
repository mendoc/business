<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistique_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function visites_par_commercial_old($id)
    {
        $sql = "SELECT
                    SUM(`nbr_visite`) AS nb_visites_com
                FROM
                    `eb_ressource_partage`
                WHERE
                    `id_com` = ?";
        
        return $this->db->query($sql, array($id))->row();
    }

    public function visites_par_commercial($id)
    {
        $sql = "SELECT
                    nbr_visite AS nb_visites_com
                FROM
                    `eb_commercial`
                WHERE
                    `id_com` = ?";
        
        return $this->db->query($sql, array($id))->row();
    }

    public function candidats_com_presentiel($id)
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_candidats_com_presentiel
                FROM
                    eb_candidat
                WHERE
                    type_cours = 'P' AND id_res_part IS NOT NULL AND id_res_part IN(
                    SELECT
                    id_res_part
                    FROM
                    eb_ressource_partage
                    WHERE
                    id_com = ?
                )";
        
        return $this->db->query($sql, array($id))->row();
    }

    public function candidats_com_ligne($id)
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_candidats_com_ligne
                FROM
                    eb_candidat
                WHERE
                    type_cours = 'L' AND id_res_part IS NOT NULL AND id_res_part IN(
                    SELECT
                    id_res_part
                    FROM
                    eb_ressource_partage
                    WHERE
                    id_com = ?
                )";
        
        return $this->db->query($sql, array($id))->row();
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

    public function nombre_apprenant_ligne() //Nbre de tous les apprenants en Ligne
    {
        $sql = "SELECT COUNT(eb_candidat.id_can)
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"L\"
        GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) = ?";

        return $this->db->query($sql, [PRIX_EN_LIGNE]);
    }

    public function nombre_apprenant_presentiel() //Nbre de tous les apprenants en presentiel
    {
        $sql = "SELECT COUNT(eb_candidat.id_can) as nb_apprenants_presentiel
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"P\"
        GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) = ?";

        return $this->db->query($sql, [PRIX_PRESENTIEL])->row();
    }

    public function nombre_commerciaux() // Nbre de tous les commerciaux
    {
        $sql = "SELECT COUNT(id_com) as nombre_commerciaux
        FROM eb_commercial";

        return $this->db->query($sql)->row();
    }

    public function somme_retraits() //somme de tous les retraits
    {
        $sql = "SELECT SUM(montant)
        FROM  eb_paiement";

        return $this->db->query($sql);
    }

    public function affilies_com_presentiel($id) //Les affiliés d'un commercial en présentiel
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_affilies_com_presentiel
                FROM
                    eb_candidat
                WHERE
                    type_cours = 'P' AND id_res_part IS NOT NULL AND eb_candidat.id_res_part IN(
                    SELECT
                    id_res_part
                    FROM
                    eb_ressource_partage
                    WHERE
                    id_com = ?
                ) AND id_can IN(
                SELECT
                    id_can
                FROM
                    eb_paiement
                GROUP BY
                    id_can
                HAVING
                    SUM(montant) = ?
                )";

        return $this->db->query($sql, array($id, PRIX_PRESENTIEL))->row();
    }

    public function affilies_com_ligne($id) //Les affiliés d'un commercial en ligne
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_affilies_com_ligne
                FROM
                    eb_candidat
                WHERE
                    type_cours = 'L' AND id_res_part IS NOT NULL AND eb_candidat.id_res_part IN(
                    SELECT
                    id_res_part
                    FROM
                    eb_ressource_partage
                    WHERE
                    id_com = ?
                ) AND id_can IN(
                SELECT
                    id_can
                FROM
                    eb_paiement
                GROUP BY
                    id_can
                HAVING
                    SUM(montant) = ?
                )";

        return $this->db->query($sql, array($id, PRIX_EN_LIGNE))->row();
    }
}
