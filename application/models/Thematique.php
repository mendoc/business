<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thematique extends CI_Model
{

    public $titre;
    public $auteur;
    public $type;
    public $description;
    public $id_gest;

    public function __construct()
    {
        $this->load->database();
    }

    //lister toutes les thematiques
    public function tous()
    {
        $query = $this->db->get('eb_thematique');
        return $query->result();
    }

    //supprimer une thematique
    public function supprimer($params)
    {

        return $this->db->delete('eb_thematique', array('id_them' => $params['id_them']));
    }

    //Modifier une thematique 
    public function modifier($params)
    {
        $this->titre     = $params['titre'];
        $this->auteur    = $params['auteur'];
        $this->type      = $params['type'];
        $this->description = $params['description'];
        $this->id_gest     = $params['id_gest'];

        return $this->db->update('eb_thematique', $this, array('id_them' => $params['id_them']));
    }

    //ajouter thematique
    
    public function ajouter($params)
    {
        $this->titre     = $params['titre'];
        $this->auteur    = $params['auteur'];
        $this->type      = $params['type'];
        $this->description = $params['description'];
        $this->id_gest     = $params['id_gest'];

        return $this->db->insert('eb_thematique', $this);
    }
}
