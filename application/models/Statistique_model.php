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
}
