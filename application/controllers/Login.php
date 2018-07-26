<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$data = [
			"p_title" 	=> "Login | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/plogin" 
		];
		$this->load->view('layout/layout_form',$data);
	}
}
