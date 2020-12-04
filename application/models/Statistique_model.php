<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistique_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
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
                    id_com = ? AND type_cours = 'P'";

        $result = $this->db->query($sql, array($id));

        return ($result ? $result->row() : FALSE);
    }

    public function candidats_com_ligne($id)
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_candidats_com_ligne
                FROM
                    eb_candidat
                WHERE
                    id_com = ? AND type_cours = 'L'";

        $result = $this->db->query($sql, array($id));

        return ($result ? $result->row() : FALSE);
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
        $sql = "SELECT COUNT(eb_candidat.id_can) as nb_apprenants_ligne
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"L\"
        GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) = ?";

        return $this->db->query($sql, [PRIX_EN_LIGNE])->num_rows();
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

    public function nb_apprenant_presentiel() //Nbre de tous les apprenants en presentiel
    {
        $sql = "SELECT COUNT(eb_candidat.id_can) as nb_apprenants_presentiel
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE type_cours =\"P\"GROUP BY eb_paiement.id_can 
        HAVING SUM(montant) > 0";

        return $this->db->query($sql)->num_rows();
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
                    id_com = ? AND id_can IN(
                    SELECT
                    id_can
                    FROM
                    eb_paiement
                    GROUP BY
                    id_can
                    HAVING
                    SUM(montant) = ?
                )";

        $result = $this->db->query($sql, array($id, PRIX_PRESENTIEL));

        return ($result ? $result->row() : FALSE);
    }
    public function aspirant_commercial($id) //Les affiliés d'un commercial en présentiel
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_aspirants
                FROM
                    eb_candidat
                WHERE
                    id_com = ? AND type_cours = 'P' AND id_can IN(
                    SELECT
                    id_can
                    FROM
                    eb_paiement
                    GROUP BY
                    id_can
                    HAVING
                    SUM(montant) > 0 AND SUM(montant) < ?
                )";

        $result = $this->db->query($sql, array($id, PRIX_PRESENTIEL));

        return ($result ? $result->row() : FALSE);
    }

    public function affilies_com_ligne($id) //Les affiliés d'un commercial en ligne
    {
        $sql = "SELECT
                    COUNT(id_can) AS nb_affilies_com_ligne
                FROM
                    eb_candidat
                WHERE
                    id_com = ? AND id_can IN(
                    SELECT
                    id_can
                    FROM
                    eb_paiement
                    GROUP BY
                    id_can
                    HAVING
                    SUM(montant) = ?
                    )";
        $result = $this->db->query($sql, array($id, PRIX_EN_LIGNE));

        return ($result ? $result->row() : FALSE);
    }

    public function nombre_candidat_commercial()
    {
        $sql = "SELECT
                        eb_commercial.nom_prenom, COUNT(eb_candidat.id_com) AS nb_candidat
                    FROM
                    `eb_commercial` INNER JOIN eb_candidat ON eb_candidat.id_com = eb_commercial.id_com
                    GROUP BY eb_candidat.id_com 
                    ORDER BY nb_candidat DESC";

        return $this->db->query($sql)->result();
    }

    public function nombre_visite_commercial()
    {
        $sql = "SELECT `nom_prenom`, `nbr_visite`
                    FROM
                    eb_commercial ORDER BY `nbr_visite` DESC";


        return $this->db->query($sql)->result();
    }

    public function nombre_viste_total()
    {
        $sql = "SELECT SUM(`nbr_visite`)  AS nbr_visite
                     FROM  `eb_commercial`";

        return $this->db->query($sql)->row();
    }

    public function listing_paiement()
    {
        $sql = "SELECT nom_prenom, montant, date 
        FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        ORDER BY date DESC
        LIMIT 5";

        return $this->db->query($sql);
    }

    public function nb_inscrit_jour()
    {
        $sql = " SELECT DATE(date_enrg) AS `jour`, COUNT(*) AS `nombre_inscrits`
            FROM eb_candidat
            GROUP BY `Jour`
            ORDER BY `Jour` DESC";

        return $this->db->query($sql)->result();
    }

    public function nb_inscrit_jour_array()
    {
        $sql = " SELECT DATE(date_enrg) AS `jour`, COUNT(*) AS `nombre_inscrits`
            FROM eb_candidat
            GROUP BY `Jour`
            ORDER BY `Jour` DESC";

        return $this->db->query($sql)->result_array();
    }

    public function nb_affilie_jour_ligne()
    {
        $sql = "SELECT DATE(date) AS 'Jour' ,COUNT(eb_paiement.id_can)
        FROM eb_paiement  
        INNER JOIN eb_candidat ON eb_candidat.id_can = eb_paiement.id_can 
        WHERE type_cours = 'L' 
        GROUP BY 'Jour'
        HAVING SUM(montant) =  PRIX_EN_LIGNE";

        return $this->db->query($sql)->result();
    }

    public function nb_affilie_jour_presentiel()
    {
        $sql = "SELECT DATE(date) AS 'Jour' ,COUNT(eb_paiement.id_can)
        FROM eb_paiement  
        INNER JOIN eb_candidat ON eb_candidat.id_can = eb_paiement.id_can 
        WHERE type_cours = 'P' 
        GROUP BY 'Jour'
        HAVING SUM(montant) =  PRIX_PRESENTIEL";

        return $this->db->query($sql)->result();
    }
}
