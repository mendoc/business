<?php
defined('BASEPATH') or exit('No direct script access allowed');

function est_connecte()
{
    $CI = &get_instance();

    $CI->load->library('session');

    $token = $CI->session->userdata('token');

    return $token != null;
}

function est_un_gestionnaire()
{
    $CI = &get_instance();

    $CI->load->library('session');

    return $CI->session->userdata('gestionnaire') != null;
}