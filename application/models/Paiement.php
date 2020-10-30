<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paiement extends CI_Model
{

    public $montant;
    public $motif;

    public function __construct()
    {
        $this->load->database();
    }

    public function tous_paiements()
    {
        $query = $this->db->get('eb_paiement');
        return $query->result();
    }
}
