<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('front/landing/accueil');
	}

	public function commercial()
	{
		$this->load->view('front/landing/commercial');
	}

	public function partage($hash)
	{

		if (isset($hash)) {
			$this->session->set_userdata('hash', $hash);
			
			// Récupération de la ressource partagée
			$this->load->model('ressource_partage_model');
			
			// Incrémmentation du nombre de visites
			$this->ressource_partage_model->incrementer_visite($hash);
		}
		
		//var_dump($hash);
		//die;
		//$this->load->view('front/landing/accueil');

		redirect('');
	}
}
