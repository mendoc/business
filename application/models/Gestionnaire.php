<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gestionnaire extends CI_Model
{

    public $nom_prenom;
    public $email_gest;
    public $mot_passe;

    public function __construct()
    {
        $this->load->database();
    }

    public function tous_les_gestionnaires()
    {
        $query = $this->db->get('eb_gestionnaire');
        return $query->result();
    }
    public function recuperer_un_gestionnaire($params)
    {
        return $query = $this->db->get('eb_ressource', array('email_gest' => $params['email_gest']));
    }
    //inscription d'un gestionnaire
    public function ajout_gestionnaire($params)
    {
        $this->nom_prenom    = $params['nom_prenom'];
        $this->email_gest  = $params['email_gest'];
        $this->mot_passe     = $params['mot_passe'];

        return $this->db->insert('eb_gestionnaire', $this);
    }
    //modifier les informations d'un gestionnaire
    public function modifier_gestionnaire($params)
    {
        $this->nom_prenom = $params['nom_prenom']; 
        $this->email_gest    = $params['email_gest'];
        $this->mot_passe   = $params['mot_passe'];

        return $this->db->update('eb_gestionnaire', $this, array('id_gest' => $params['id_gest']));
    }
    // supprimer un gestionnaire
    public function supprimer_gestionnaire($params)
    {
        $this->nom_prenom = $params['nom_prenom']; 
        $this->email_gest    = $params['email_gest'];
        $this->mot_passe   = $params['mot_passe'];

        return $this->db->delete('eb_gestionnaire', array('id_gest' => $params['id_gest']));
    }
    //connexion d'un gestionnaire
    public function connexion($params)
    {
        $this->nom_util   = $params['email_gest'];
        $this->mot_passe  = $params['mot_passe'];
        $query = $this->db->get_where('eb_gestionnaire', array('email_gest' => $params['email_gest'], 'mot_passe' => $params['mot_passe']));

        return $query->row();
    }
    //listing des commerciaux par le gestionnaire
    public function lister_commerciaux()
    {
        $query = $this->db->get('eb_commercial');
        return $query->result();
    }
    //listing des candidats par le gestionnaire
    public function lister_candidats()
    {
        $query = $this->db->get('eb_candidat');
        return $query->result();
    }
    //ajout thematique par le gestionnaire
    public function ajout_thematique($params)
    {
        $this->titre    = $params['titre'];
        $this->auteur  = $params['auteur'];
        $this->type     = $params['type'];
        $this->description    = $params['description'];
        $this->id_gest  = $params['id_gest'];

        return $this->db->insert('eb_thematique', $this);
    }
    //ajout d'une ressource par le gestionnaire
    public function ajout_ressource($params)
    {
        $this->nom_res    = $params['nom_res'];
        $this->lien  = $params['lien'];
        $this->fichier     = $params['fichier'];
        $this->type_res    = $params['type_res'];
        $this->id_them    = $params['id_them'];
        $this->id_gest  = $params['id_gest'];

        return $this->db->insert('eb_ressource', $this);
    }
    //supression d'une ressource par le gestionnaire
    public function supprimer_ressource($params)
    {
        $this->nom_res    = $params['nom_res'];
        $this->lien  = $params['lien'];
        $this->fichier     = $params['fichier'];
        $this->type_res    = $params['type_res'];
        $this->id_them    = $params['id_them'];
        $this->id_gest  = $params['id_gest'];

        return $this->db->delete('eb_ressource', array('id_res' => $params['id_res']));
    }
    //listing des ressources par le gestionnaire
    public function lister_ressources()
    {
        $query = $this->db->get('eb_ressource');
        return $query->result();
    }
}
