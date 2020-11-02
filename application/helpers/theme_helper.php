<?php
defined('BASEPATH') or exit('No direct script access allowed');

function theme_url()
{
    return base_url() . 'theme/';
}

function afficher($vue, $data = array())
{
    $CI = &get_instance();

    $CI->load->view('zones/head', $data);
    $CI->load->view('zones/top', $data);
    $CI->load->view($vue, $data);
    $CI->load->view('zones/footer', $data);
}
