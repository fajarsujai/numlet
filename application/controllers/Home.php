<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = [
			"p_title" 	=> "Home | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/phome",
			"n_active"  => "home"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
	public function ajukan()
	{
		$data = [
			"p_title" 	=> "Home - Ajukan | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pajukan",
			"n_active"  => "home"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
	public function arsip()
	{
		$data = [
			"p_title" 	=> "Home - Arsip | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/parsip",
			"n_active"  => "arsip"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
}