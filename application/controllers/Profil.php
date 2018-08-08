<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
			 parent::__construct();
			 $this->load->model('profile_model');
	 }

	public function index()
	{
		$x['data']=$this->profile_model->show_profile();
		$data = [
			"p_title" 	=> "Home - Profil | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pprofile",
			"n_active"  => "profile",
		];
		$this->load->view('layout/layout_dashboard',$data);
	}

	function editProfile(){

        $this->load->view('pages/pprofile',$x);
    }
}
