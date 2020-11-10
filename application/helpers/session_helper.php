<?php
defined('BASEPATH') or exit('No direct script access allowed');

function est_connecte()
{
    $CI = &get_instance();

    $CI->load->library('session');

    $token_gest = $CI->session->userdata('token_gest');

    $token_com = $CI->session->userdata('token_com');

    return $token_gest != null OR $token_com != null;
}

function est_un_gestionnaire()
{
    $CI = &get_instance();

    $CI->load->library('session');

    return $CI->session->userdata('token_gest') != null;
}