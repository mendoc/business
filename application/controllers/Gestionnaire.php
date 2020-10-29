<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestionnaire extends CI_Controller {




	public function index()
	{
		afficher('back/gestionnaire/candidats');
	}
}
