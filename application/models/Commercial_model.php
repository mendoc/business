<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commercial_model extends CI_Model
{

    public $nom_prenom;
    public $num_tel;
    public $num_what;
    public $email;
    public $sexe;
    public $date_n;
    //public $nom_util;
    public $mot_passe;
    public $hash;
    public $raccourci;

    // Nom de la table
    private $table = 'commercial';

    // Clé primaire de la table
    private $id = 'id_com';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function array_commerciaux()
    {
        $this->db->select('id_com, nom_prenom, num_tel, num_what, email, sexe, date_n, nbr_visite');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function connexion($email, $mot_passe)
    {
        $query = $this->db->get_where($this->table, array('email' => $email, 'mot_passe' => $mot_passe));

        return $query->row();
    }

    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }

    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    public function creer()
    {
        return $this->db->insert($this->table, $this);
    }


    public function recuperer_un($id)
    {
        $query = $this->db->get_where($this->table, array($this->id => $id));
        return $query->row();
    }

    public function nombre_affilie_ligne($id) //fonction pour récupérer le nombre d'affilié d'un commercial en ligne
    {
        $sql = "SELECT COUNT(*) 
        FROM eb_candidat 
        WHERE id_com = ?
        AND id_can 
        AND type_cours = \"L\"
        AND IN ( SELECT id_can
        FROM eb_paiement 
        GROUP BY id_can 
        HAVING SUM(montant) = PRIX_EN_LIGNE)";
        return $this->db->query($sql, $id);
    }

    public function nombre_affilie_presentiel($id) //fonction pour récupérer le nombre d'affilié d'un commercial en présentiel
    {
        $sql = "SELECT COUNT(*) 
        FROM eb_candidat 
        WHERE id_com = ?
        AND id_can
        AND type_cours = \"P\"
        AND IN ( SELECT id_can
        FROM eb_paiement 
        GROUP BY id_can 
        HAVING SUM(montant) = PRIX_PRESENTIEL)";
        return $this->db->query($sql, $id);
    }

    public function nombre_inscrit_ligne_com($id) //fonction pour récupérer le nombre d'affilié d'un commercial en ligne
    {
        $sql = "SELECT COUNT(*) 
        FROM eb_candidat 
        WHERE type_cours = \"L\"
        AND id_com = ?";
        return $this->db->query($sql, $id);
    }

    public function nombre_inscrit_presentiel($id) //fonction pour récupérer le nombre d'affilié d'un commercial en présentiel
    {
        $sql = "SELECT COUNT(*) 
        FROM eb_candidat 
        WHERE type_cours = \"P\"
        AND id_com = ?";
        return $this->db->query($sql, $id);
    }


    public function dernier_paiement_commercial($id)
    {
        $sql = "SELECT nom_prenom, montant, date 
        FROM eb_candidat 
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can
        WHERE id_com = ?
        ORDER BY date DESC";

        return $this->db->query($sql, array($id));
    }
    //Recupérer un gestionnaire en fonction de son adresse e-mail
    public function par_email($email)
    {
        $query = $this->db->get_where($this->table, array('email' => $email));
        return $query->row();
    }

    public function par_hash($hash)
    {
        $query = $this->db->get_where($this->table, array('hash' => $hash));
        return $query->row();
    }

    public function save_infos($params, $id)
    {
        return $this->db->update($this->table, $params, array($this->id => $id));
    }

    public function modifier_mot_de_passe($id, $mot_de_passe)
    {
        return $this->db->update($this->table, array('mot_passe' => $mot_de_passe), array($this->id => $id));
    }

    public function incrementer_visite($hash)
    {
        $query = $this->db->get_where($this->table, array('hash' => $hash));
        $commercial = $query->row();

        if ($commercial) {
            return $this->db->update($this->table, array('nbr_visite' => $commercial->nbr_visite + 1), array($this->id => $commercial->id_com));
        } else {
            return FALSE;
        }
    }

    public function classement()
    {
        $sql = "SELECT
                    `eb_commercial`.`id_com`,
                    `nom_prenom`,
                    `nbr_visite`,
                    `com`.`nb_candidats`
                FROM
                    `eb_commercial`
                LEFT JOIN (
                    SELECT `eb_commercial`.`id_com`,
                        COUNT(eb_candidat.id_com) AS nb_candidats
                    FROM
                        `eb_commercial`
                    INNER JOIN eb_candidat ON eb_candidat.id_com = eb_commercial.id_com
                    GROUP BY
                        eb_candidat.id_com
                ) AS com ON `eb_commercial`.`id_com` = com.`id_com`
                ORDER BY `com`.`nb_candidats` DESC, `nbr_visite` ASC;";

        return $this->db->query($sql)->result();
    }

    //listing des paiements qui octroient des commissions au commercial

    public function paiement_commission_presentiel($id)
    {
        $sql = "SELECT nom_prenom, date 
        FROM eb_candidat 
        WHERE id_com = ?
        AND type_cours = \"P\"
        AND id_can IN ( SELECT id_can
        FROM eb_paiement 
        GROUP BY id_can 
        HAVING SUM(montant) = ?)";
        return $this->db->query($sql, array($id, PRIX_PRESENTIEL));
    }

    public function paiement_commission_ligne($id)
    {
        $sql = "SELECT nom_prenom, date 
        FROM eb_candidat 
        WHERE id_com = ?
        AND type_cours = \"L\"
        AND id_can IN ( SELECT id_can
        FROM eb_paiement 
        GROUP BY id_can 
        HAVING SUM(montant) = ?)";
        return $this->db->query($sql, array($id, PRIX_EN_LIGNE));
    }

    public function inscrit_non_paye_com($id, $limite, $debut) //listing des inscrits qui n'ont encore rien payé
    {
        $sql = "SELECT * FROM `eb_candidat` WHERE id_com = ? 
        AND id_can
        NOT IN (SELECT eb_candidat.id_can FROM eb_candidat 
        INNER JOIN eb_paiement 
        ON eb_candidat.id_can = eb_paiement.id_can )
        LIMIT ?,?";

        return $this->db->query($sql, array($id,$debut,$limite))->result();
    }

    public function nb_inscrit_non_paye_com($id) //listing des inscrits qui n'ont encore rien payé
    {
        $sql = "SELECT COUNT(`eb_candidat`.`id_can`) AS nb_inscrit_non_paye FROM `eb_candidat` WHERE id_com = ? 
        AND id_can
        NOT IN (SELECT eb_candidat.id_can FROM eb_candidat 
        INNER JOIN eb_paiement 
        ON eb_candidat.id_can = eb_paiement.id_can )
        ";

        $query = $this->db->query($sql, $id)->row();
        return $query->nb_inscrit_non_paye;
    }

    public function aspirant_com ($id) //Nombre des aspirants
    {
        $sql = "SELECT COUNT(eb_candidat.id_can) AS nb_aspirant_com 
        FROM eb_candidat 
        INNER JOIN eb_paiement ON eb_candidat.id_can = eb_paiement.id_can
        WHERE id_com = ?
        AND eb_paiement.id_can NOT IN ( SELECT id_can
        FROM eb_paiement 
        GROUP BY id_can
        HAVING SUM(montant) = ?) ";
        return $this->db->query($sql, array($id, PRIX_PRESENTIEL))->row();
    }

    public function recherche_commercial($nom_prenom)
    {
        $this->db->like('nom_prenom', $nom_prenom);
        return $this->db->get($this->table)->result();
    }

    // Renvoie le nombre de commerciaux
    public function nombre_commerciaux()
    {
        return $this->db->count_all($this->table);
    }

    // Renvoie le nombre de commerciaux dans un intervalle precis
    public function interval_commercial($limite, $debut)
    {
        $this->db->limit($limite, $debut);
        return $this->db->get($this->table)->result();
    }


    // listing commerciaux par affilié, aspirant, nb_inscrit et visite

    public function listing_com()
    {
        $sql="SELECT
        eb_commercial.nom_prenom,
        `nombre d'affilié`,
        nb_aspirant_com,
        nb_inscrit,
        nbr_visite
        FROM eb_commercial
        LEFT JOIN (SELECT eb_candidat.id_com,COUNT(eb_commercial.id_com) AS \"nombre d'affilié\"
    FROM
        eb_candidat
    INNER JOIN eb_commercial ON eb_candidat.id_com = eb_commercial.id_com
    WHERE
        (
            type_cours = \"L\" AND eb_candidat.id_can IN(
            SELECT
                eb_paiement.id_can
            FROM
                eb_paiement
            GROUP BY
                eb_paiement.id_can
            HAVING
                SUM(montant) = 90000
        )
        ) OR(
            type_cours = \"P\" AND eb_candidat.id_can IN(
            SELECT
                eb_paiement.id_can
            FROM
                eb_paiement
            GROUP BY
                eb_paiement.id_can
            HAVING
                SUM(montant) = 155000
        )
        )
    GROUP BY
        eb_commercial.id_com)AS com ON eb_commercial.id_com=com.id_com
    LEFT JOIN(
       SELECT
        eb_candidat.id_com,
        COUNT(eb_paiement.id_can) AS nb_aspirant_com
    FROM
        eb_candidat
    INNER JOIN eb_paiement ON eb_candidat.id_can = eb_paiement.id_can
    WHERE
        type_cours = \"P\" AND eb_paiement.id_can NOT IN(
        SELECT
            id_can
        FROM
            eb_paiement
        GROUP BY
            id_can
        HAVING
            SUM(montant) = 155000
    )
    GROUP BY eb_candidat.id_com
    ) AS alpha
    ON
        eb_commercial.id_com = alpha.id_com
    LEFT JOIN(
       SELECT eb_candidat.id_com,COUNT(*) AS nb_inscrit
    FROM eb_candidat INNER JOIN eb_commercial ON eb_candidat.id_com = eb_commercial.id_com
    WHERE  id_can
        NOT IN (SELECT eb_candidat.id_can
    FROM eb_candidat
        INNER JOIN eb_paiement
        ON eb_candidat.id_can = eb_paiement.id_can )
        GROUP BY eb_candidat.id_com
        )
     AS beta
    ON
        eb_commercial.id_com = beta.id_com
        ORDER BY `nombre d'affilié`DESC, nb_aspirant_com DESC, nb_inscrit DESC, nbr_visite ASC";
         return $this->db->query($sql)->result();
    }

    public function listing_meilleurs_com($limite, $debut)
    {
        $sql="SELECT
        eb_commercial.id_com,
        eb_commercial.nom_prenom,
        eb_commercial.email,
        `nb_affilie`,
        nb_aspirant_com,
        nb_inscrit,
        nbr_visite
        FROM eb_commercial
            LEFT JOIN (SELECT eb_candidat.id_com,COUNT(eb_commercial.id_com) AS \"nb_affilie\"
        FROM
            eb_candidat
        INNER JOIN eb_commercial ON eb_candidat.id_com = eb_commercial.id_com
        WHERE
            (
                type_cours = \"L\" AND eb_candidat.id_can IN(
                SELECT
                    eb_paiement.id_can
                FROM
                    eb_paiement
                GROUP BY
                    eb_paiement.id_can
                HAVING
                    SUM(montant) = 90000
            )
            ) OR(
                type_cours = \"P\" AND eb_candidat.id_can IN(
                SELECT
                    eb_paiement.id_can
                FROM
                    eb_paiement
                GROUP BY
                    eb_paiement.id_can
                HAVING
                    SUM(montant) = 155000
            )
            )
        GROUP BY
            eb_commercial.id_com)AS com ON eb_commercial.id_com=com.id_com
        LEFT JOIN(
       SELECT
        eb_candidat.id_com,
        COUNT(eb_paiement.id_can) AS nb_aspirant_com
        FROM
            eb_candidat
        INNER JOIN eb_paiement ON eb_candidat.id_can = eb_paiement.id_can
        WHERE
            type_cours = \"P\" AND eb_paiement.id_can NOT IN(
            SELECT
                id_can
            FROM
                eb_paiement
            GROUP BY
                id_can
            HAVING
                SUM(montant) = 155000
        )
        GROUP BY eb_candidat.id_com
        ) AS alpha
        ON
            eb_commercial.id_com = alpha.id_com
        LEFT JOIN(
        SELECT eb_candidat.id_com,COUNT(*) AS nb_inscrit
        FROM eb_candidat INNER JOIN eb_commercial ON eb_candidat.id_com = eb_commercial.id_com
        WHERE  id_can
            NOT IN (SELECT eb_candidat.id_can
        FROM eb_candidat
            INNER JOIN eb_paiement
            ON eb_candidat.id_can = eb_paiement.id_can )
            GROUP BY eb_candidat.id_com
            )
        AS beta
        ON
        eb_commercial.id_com = beta.id_com
        ORDER BY `nb_affilie`DESC, nb_aspirant_com DESC, nb_inscrit DESC, nbr_visite ASC";

        $this->db->limit($limite, $debut);

        return $this->db->query($sql)->result();
    }


}

