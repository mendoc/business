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
    public $nom_util;
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

    public function connexion($nom_util, $mot_passe)
    {
        $query = $this->db->get_where($this->table, array('nom_util' => $nom_util, 'mot_passe' => $mot_passe));

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

    public function nombre_affilié($id) //fonction pour récupérer le nombre d'affilié d'un candidat
    {
        $sql = "SELECT COUNT * 
        FROM eb_candidat 
        WHERE id_res_part IS NOT NULL
        AND eb_candidat.id_res_part 
            IN (
            SELECT id_res_part 
            FROM eb_ressource_partage
            WHERE id_com = ? 
            AND eb_ressource_partage.id_cand
                IN (
                SELECT id_canD'accord
                FROM eb_paiement 
                GROUP BY id_cand 
                HAVING SUM(montant) = 155000 ))";
        return $this->db->query($sql, $id);
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
}
