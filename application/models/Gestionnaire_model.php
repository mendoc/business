<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire_model extends CI_Model
{

    public $nom_prenom;
    public $email_gest;
    public $mot_passe;

    // Nom de la table
    private $table = 'gestionnaire';

    // Clé primaire de la table
    private $id = 'id_gest';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function transactions()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function recuperer_un_gestionnaire($id)
    {
        $query = $this->db->get($this->table, array($this->id => $id));
        return $query->row();
    }

    //inscription d'un gestionnaire
    public function creer()
    {
        return $this->db->insert($this->table, $this);
    }

    //modifier les informations d'un gestionnaire
    public function modifier_gestionnaire($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    // supprimer un gestionnaire
    public function supprimer_gestionnaire($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }

    //connexion d'un gestionnaire
    public function connexion($email, $mot_passe)
    {
        $query = $this->db->get_where($this->table, array('email_gest' => $email));
        if ($gestionnaire = $query->row()) {
            if (password_verify($mot_passe, $gestionnaire->mot_passe)) {
                return $gestionnaire;
            } else {
                return false;
            }
        }
    }

    //Recupérer un gestionnaire en fonction de son adresse e-mail
    public function par_email($email)
    {
        $query = $this->db->get_where($this->table, array('email_gest' => $email));
        return $query->row();
    }

    public function modifier_mot_de_passe($id, $mot_de_passe)
    {
        return $this->db->update($this->table, array('mot_passe' => $mot_de_passe), array($this->id => $id));
    }

    // Renvoie le nombre de gestionnaire
    public function nombre_gestionnaire()
    {
        return $this->db->count_all($this->table);
    }

    // Renvoie le nombre de gestionnaire dans un intervalle precis
    public function recuperer_gestionnaire($limite, $debut)
    {
        $this->db->limit($limite, $debut);
        return $this->db->get($this->table)->result();
    }


}
