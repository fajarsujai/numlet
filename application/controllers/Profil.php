<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
			 parent::__construct();
			 $this->load->model('profil_model');
	 }

	public function index()
	{
		$id = $this->session->id;
		$x['data']=$this->profil_model->get_profile($id);
		$data = [
			"p_title" 	=> "Home - Profil | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pprofile",
			"n_active"  => "profile",
			"profile" => $x['data'],
			"p_datatable" => "component/cprofil_dt"
		];

		$this->load->view('layout/layout_dashboard',$data);
	}
}
