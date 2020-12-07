<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leaderboard extends CI_Controller
{
    public function index()
    {
        $this->load->model('statistique_model');
        $coms = $this->commercial_model->classement();
        $commerciaux = $this->commercial_model->listing_com();

        // var_dump($commerciaux);
        // die;

        // if (!$coms) $coms = array();

        // foreach ($coms as $commercial){

        //    $commercial->nb_candidats = $commercial->nb_candidats ? $commercial->nb_candidats : 0;
           
        //     // Nombre d'affiliés en présentiel du commercial
        //     $result = $this->statistique_model->affilies_com_presentiel($commercial->id_com);
        //     if ($result) $nb_affilies_com_presentiel = $result->nb_affilies_com_presentiel;
        //     else $nb_affilies_com_presentiel = 0;

        //     // Nombre d'affiliés en ligne du commercial
        //     $result = $this->statistique_model->affilies_com_ligne($commercial->id_com);
        //     if ($result) $nb_affilies_com_ligne = $result->nb_affilies_com_ligne;
        //     else $nb_affilies_com_ligne = 0;

        //     $commercial->nb_affilies = $nb_affilies_com_ligne + $nb_affilies_com_presentiel;

        //     // Nombre d'aspirant
        //     $result = $this->commercial_model->aspirant_com($commercial->id_com);
        //     if ($result) $commercial->nb_aspirant = $result->nb_aspirant_com;
        //     else $commercial->nb_aspirant = 0;
        // }

        // usort($coms, function ($a, $b){
        //     if ($a->nb_affilies == $b->nb_affilies) {
        //         if ($a->nb_aspirant == $b->nb_aspirant) {
        //             if ($a->nb_candidats == $b->nb_candidats) {
        //                 if ($a->nbr_visite == $b->nbr_visite) return 0;
        //                 return $a->nbr_visite < $b->nbr_visite ? -1 : 1;
        //             }
        //             return $a->nb_candidats < $b->nb_candidats ? 1 : -1;
        //         }
        //         return $a->nb_aspirant < $b->nb_aspirant ? 1 : -1;
        //     }

        //     return $a->nb_affilies < $b->nb_affilies ? 1 : -1;
        // });

        $nb_apprenant_presentiel = $this->statistique_model->nb_apprenant_presentiel();
        $nb_apprenant_ligne = $this->statistique_model->nombre_apprenant_ligne();

        $data = array(
            'commerciaux' => $commerciaux,
            'nb_apprenant_presentiel' => $nb_apprenant_presentiel,
            'nb_apprenant_ligne' => $nb_apprenant_ligne
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
