<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __Construct(){
	 parent::__Construct();
	 $this->load->helper(array('form', 'url'));
	 $this->load->library(array('session', 'form_validation', 'email'));
	 $this->load->database();
	 $this->load->model('home_model');
		}

	public function index()
	{
		if($this->session->userdata('status') != "login"){
				redirect(base_url("login"));
			}
		$data = [
			"p_title" 	=> "Home | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/phome",
			"n_active"  => "home"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
	public function ajukan()
	{
		if($this->session->userdata('status') != "login"){
				redirect(base_url("login"));
			}
		$data = [
			"p_title" 	=> "Home - Ajukan | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pajukan",
			"n_active"  => "home"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}

	public function postAjukan()
	{
		$tujuan		= $_POST['tujuan'];
		$penerima	= $_POST['penerima'];
		$perihal	= $_POST['perihal'];
		$alamat		= $_POST ['alamat'];
		$id = $this->session->id;

		$data = array(
				'tujuan' => $tujuan,
				'penerima_srt' => $penerima,
				'perihal' => $perihal,
				'alamat' => $alamat,
				'pembuat' => $id
				);

		if($this->home_model->insertAjukan($data)){
			redirect(base_url('Home/arsip'));
		}


	}




	public function arsip()
	{
		if($this->session->userdata('status') != "login"){
				redirect(base_url("login"));
			}
		$data = [
			"p_title" 	=> "Home - Arsip | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/parsip",
			"n_active"  => "arsip",
			"p_datatable" => "component/carsipsurat_dt"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}


	function apiArsipSurat()
	{
		$list = $this->home_model->get_datatables();
				$data = array();
				$no = $_POST['start'];
				foreach ($list as $field) {
					if($field->pembuat == $this->session->id){
						$no++;
						$id = $field->pembuat;
						$nama = $this->home_model->get_user($id)->result_array();
						$nama = $nama[0]['nama_user'];
						$row = array();

						$row[] = $no;
						$row[] = $field->no_surat;
						$row[] = $nama;
						$row[] = $field->perihal;
						$row[] = $field->waktu_dibuat;
						$row[] = 'rr
						';

						$data[] = $row;
					}

				}
				$output = array(
					"recordsTotal" => $this->home_model->count_all(),
						"draw" => $_POST['draw'],
						"recordsFiltered" => $this->home_model->count_filtered(),
						"data" => $data,
				);
				//output dalam format JSON
				echo json_encode($output);
	}
}
