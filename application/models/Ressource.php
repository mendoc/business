<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ressource extends CI_Model {

public $id_res;
public $nom_res;
public $lien;
public $fichier;
public $date_res;
public $type_res;
public $id_them;
public $id_gest;

public function __construct()
{
    $this->load->database();
}

//lister toutes les ressources 

public function tous()
{
        $query = $this->db->get('eb_ressource');
        return $query->result();
}

//Ajouter ressource

public function inserer($params)
{
    $this->nom_res    = $params['$nom_res'];     
    $this->lien       = $params['lien'];     
    $this->fichier    = $params['fichier'];    
    $this->type_res   = $params['type_res'];     
    $this->id_them    = $params['id_them'];     
    $this->id_gest    = $params['id_gest'];     

    return $this->db->insert('eb_ressource', $this);
}

    // Mettre à jour des ressources

    public function modifier($params)
    {
        $this->nom_res    = $params['$nom_res'];     
        $this->lien       = $params['lien'];     
        $this->fichier    = $params['fichier'];       
        $this->type_res   = $params['type_res'];     
        $this->id_them    = $params['id_them'];     
        $this->id_gest    = $params['id_gest']; 

        return $this->db->update('eb_ressource', $this, array('id_res' => $params['id_res']));
    }

    // Supprimer une ressource

    public function supprimer_une_ressource($params)
    {
        $this->nom_res    = $params['$nom_res'];     
        $this->lien       = $params['lien'];     
        $this->fichier    = $params['fichier'];       
        $this->type_res   = $params['type_res'];     
        $this->id_them    = $params['id_them'];     
        $this->id_gest    = $params['id_gest']; 

        return $this->db->delete('eb_ressource', array('id_res' => $params['id_res']));
    }

}
