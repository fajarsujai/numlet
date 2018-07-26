<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$data = [
			"p_title" 	=> "Dashboard | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pdashboard" 
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
}