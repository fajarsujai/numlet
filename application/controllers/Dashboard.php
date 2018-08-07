<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->library('session');
			$model = [
				'mastersurat_model',
				'masteruser_model'
			];
			$this->load->model($model);
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
	public function api_mastersurat()
	{
		$list = $this->mastersurat_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $id = $field->id_srt;
            $nama = $this->mastersurat_model->get_user($id)->result_array();
            $nama = $nama[0]['nama_user'];
            $row = array(); 
            
            $row[] = $no;
            $row[] = $field->no_surat;
            $row[] = $nama;
            $row[] = $field->perihal;
            $row[] = $field->waktu_dibuat;
            $row[] = '
                <a class="btn btn-sm btn-success m-1" href="javascript:void(0)" title="Konfirmasi" onclick="konfirmasi_surat('."'".$field->id_srt."'".')"><i class="icon-ok icon-white"></i></a>
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Tolak!" onclick="tolak_surat('."'".$field->id_srt."','0'".')"><i class="icon-remove icon-white"></i></a>
                <a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" title="Detail" onclick="detail_surat('."'".$field->id_srt."'".')"><i class="icon-info-sign icon-white"></i></a>
                        ';
                
            $data[] = $row;
            
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mastersurat_model->count_all(),
            "recordsFiltered" => $this->mastersurat_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	function api_surat(){
		$action = $this->input->get('action');
		if($action == 'konfirmasi'){
			$id = $this->input->get('id');
			if($this->mastersurat_model->konfirmasi($id) == 'success')
			{
				$data = [
					'message' => 'Konfirmasi Sukses'
				];
			}
			else {
				$data = [
					'message' => 'Konfirmasi Gagal'
				];
			}
			echo json_encode($data);
		}
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
	public function api_masteruser()
	{
		$list = $this->masteruser_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array(); 
            
            $row[] = $no;
            $row[] = $field->nip;
            $row[] = $field->nama_user;
            $row[] = $field->email;
            $row[] = $field->departemen;
            $row[] = $field->jabatan;
            $row[] = $field->status;
                
            $data[] = $row;
            
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->masteruser_model->count_all(),
            "recordsFiltered" => $this->masteruser_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	public function profil()
	{
		$data = [
			"p_title" 	=> "Home - Profil | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pprofile",
			"n_active"  => "profile"
		];
		$this->load->view('layout/layout_dashboard',$data);
	}
}