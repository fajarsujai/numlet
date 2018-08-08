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
				'masteruser_model',
				'profil_model'
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
            if($field->status == '0')
            {
            	$status = ' <span class="label">Belum Dilihat</span>';
            }
            elseif($field->status == '1')
            {
            	$status = ' <span class="label label-success">Sudah dikonfirmasi</span>';
            }
            elseif($field->status == '2')
            {
            	$status = ' <span class="label label-important">Ditolak</span>';
            }
            $row = array(); 
            
            $row[] = $no;
            $row[] = $field->no_surat.$status;
            $row[] = $nama;
            $row[] = $field->perihal;
            $row[] = $field->waktu_dibuat;
            $row[] = '
                <a class="btn btn-sm btn-success m-1" href="javascript:void(0)" title="Konfirmasi" onclick="konfirmasi_surat('."'".$field->id_srt."'".')"><i class="icon-ok icon-white"></i></a>
                <a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Tolak!" onclick="tolak_surat('."'".$field->id_srt."','0'".')"><i class="icon-remove icon-white"></i></a>
                <a class="btn btn-sm btn-primary m-1" href="javascript:void(0)" title="Detail" onclick="detail_surat('."'".$field->id_srt."'".')"><i class="icon-info-sign icon-white"></i></a>
                <a class="btn btn-sm btn-primary m-1" href="edit_surat?id='.$field->id_srt.'" title="Edit" ><i class="icon-pencil icon-white"></i></a>';
                
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
	function api_surat()
	{
		$action = $this->input->get('action');
		//KONFIRMASI SURAT
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
		//TOLAK SURAT
		elseif ($action == 'tolak') {
			$id = $this->input->get('id');
			if($this->mastersurat_model->tolak($id) == 'success')
			{
				$data = [
					'message' => 'Tolak Sukses'
				];
			}
			else {
				$data = [
					'message' => 'Tolak Gagal'
				];
			}
			echo json_encode($data);
		}
		//DETAIL SURAT
		elseif ($action == 'detail') {
			$id = $this->input->get('id');
			if($this->mastersurat_model->detail($id))
			{
				$data = $this->mastersurat_model->detail($id);
				if($data[0]['status'] == '0')
	            {
	            	$data[0]['status'] = ' Belum Dilihat';
	            }
	            elseif($data[0]['status'] == '1')
	            {
	            	$data[0]['status'] = ' Sudah dikonfirmasi';
	            }
	            elseif($data[0]['status'] == '2')
	            {
	            	$data[0]['status'] = ' Ditolak';
	            }
				echo json_encode($data);
			}
			else
			{
				$data = [
					'message' => 'Tolak Gagal'
				];
			}
		}
	}
	public function edit_surat()
	{
		$id = $this->input->get('id');
		
		if(null!==$this->input->get('process'))
		{
			$tujuan = $this->input->post('tujuan');
			$penerima = $this->input->post('penerima');
			$perihal = $this->input->post('perihal');
			$alamat = $this->input->post('alamat');

			$data = [
				'tujuan' => $tujuan,
				'penerima_srt' => $penerima,
				'perihal' => $perihal,
				'alamat' => $alamat
			];

			if($this->mastersurat_model->update_data($data,$id))
			{
				redirect(base_url('dashboard/mastersurat'));
			}
			else {
				redirect(base_url('dashboard/mastersurat'));	
			}
		}
		else {
			$detail = $this->mastersurat_model->detail($id);

			$data = [
				"p_title" 	=> "Edit Surat | Sistem Informasi Surat Keluar",
				"p_content"	=> "pages/peditsurat",
				"detail" => $detail,
				"n_active"  => "mastersurat",
				"id" => $id
			];
			$this->load->view('layout/layout_dashboard',$data);
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