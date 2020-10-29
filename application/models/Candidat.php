<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidat extends CI_Model
{

    public $title;
    public $content;
    public $num_tel;
    public $num_what;
    public $date;
    public $date;
    public $date;
    public $date;
    public $date;
    public $date;
    public $date;
    public $date;
    public $date;

    public function __construct()
    {
        $this->load->database();
    }

    public function tous_les_candidats()
    {
        $query = $this->db->get('candidat');
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
