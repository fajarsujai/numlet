<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$data = [
			"p_title" 	=> "Register | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pregister"
		];
		$this->load->view('layout/layout_form',$data);
	}
}
