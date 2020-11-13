<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leaderboard extends CI_Controller
{
    public function index()
    {
        $coms = $this->commercial_model->classement();

        if (!$coms) $coms = array();

        foreach ($coms as $commercial){

           $commercial->nb_candidats = $commercial->nb_candidats ? $commercial->nb_candidats : 0;
        }
        $data = array(
            'commerciaux' => $coms
        );

        $this->load->view('front/leaderboard/classement', $data);
    }

    public function data()
    {
        $classement = array();

        $this->load->model('statistique_model');

        $result = $this->statistique_model->nombre_candidat_commercial();

        if ($result) {
            $classement = $result;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($classement));
    }
}
