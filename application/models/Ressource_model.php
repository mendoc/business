<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ressource_model extends CI_Model
{
    public $nom_res;
    public $lien;
    public $fichier;
    public $type_res;
    public $id_them;
    public $id_gest;

    // Nom de la table
    private $table = 'ressource';

    // Clé primaire de la table
    private $id = 'id_res';

    public function __construct()
    {
        $this->load->database();
    }

    //lister toutes les ressources 
    public function tout()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('thematique', "thematique.id_them = {$this->table}.id_them");
        $query = $this->db->get();
        return $query->result();
    }

    //lister toutes les ressources 
    public function par_commercial($id_com)
    {
        $sql = "SELECT
                    `eb_ressource`.`id_res`,`nom_res`,`lien`,`fichier`,`date_res`,`type_res`, `lien_gen`
                FROM
                    `eb_ressource`
                INNER JOIN
                    `eb_ressource_partage` ON `eb_ressource_partage`.`id_res` = `eb_ressource`.`id_res`
                WHERE
                    `id_com` = ?
                UNION
                SELECT
                    `id_res`,`nom_res`,`lien`,`fichier`,`date_res`,`type_res`, NULL
                FROM
                    `eb_ressource`
                WHERE
                    `id_res` NOT IN(
                    SELECT
                    `id_res`
                    FROM
                    `eb_ressource_partage`
                    WHERE
                    `id_com` = ?
                );";

        return $this->db->query($sql, [$id_com, $id_com])->result();
    }

    //Ajouter ressource
    public function inserer()
    {
        return $this->db->insert($this->table, $this);
    }

    // Mettre à jour des ressources
    public function modifier($id)
    {
        return $this->db->update($this->table, $this, array($this->id => $id));
    }

    // Supprimer une ressource
    public function supprimer($id)
    {
        return $this->db->delete($this->table, array($this->id => $id));
    }
}
