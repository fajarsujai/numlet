<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->library('session');
	}
	public function index()
	{
		$data = [
			"p_title" 	=> "Dashboard | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pdashboard",
			"n_active"  => "dashboard"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
	public function mastersurat()
	{
		$data = [
			"p_title" 	=> "Dashboard | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pmastersurat",
			"p_datatable" => "component/cmastersurat_dt" ,
			"n_active"  => "mastersurat"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
	public function masteruser()
	{
		$data = [
			"p_title" 	=> "Dashboard | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pmasteruser",
			"p_datatable" => "component/cmasteruser_dt" ,
			"n_active"  => "masteruser"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
}