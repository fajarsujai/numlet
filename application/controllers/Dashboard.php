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
		$surat_baru = $this->mastersurat_model->get_new_surat()->result_array();
		$banyak_surat = $this->mastersurat_model->get_new_surat()->num_rows();
		$i = 0;
		foreach ($surat_baru as $sb) {
			if($sb['status'] == 0)
			{
				$surat_baru[$i]['status'] = "Belum dibaca";
			}
			elseif ($sb['status'] == 1) {
				$surat_baru[$i]['status'] = "Sudah dikonfirmasi";
			}
			elseif ($sb['status'] == 2) {
				$surat_baru[$i]['status'] = "Ditolak";
			}
			$i++;
		}
		
		$user_baru = $this->masteruser_model->get_new_user()->result_array();
		$banyak_user = $this->masteruser_model->get_new_user()->num_rows();

		$a = 0;
		foreach ($user_baru as $ub) {
			if($ub['status'] == 0)
			{
				$user_baru[$a]['status'] = "Belum dikonfirmasi";
			}
			elseif ($ub['status'] == 1) {
				$user_baru[$a]['status'] = "Aktif";
			}
			elseif ($ub['status'] == 2) {
				$user_baru[$a]['status'] = "Nonaktif";
			}
			$a++;
		}


		$data = [
			"p_title" 	=> "Dashboard | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pdashboard",
			"n_active"  => "dashboard",
			"surat_baru" => $surat_baru,
			"user_baru" => $user_baru,
			"banyak_user" => $banyak_user,
			"banyak_surat" => $banyak_surat
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
            $id = $field->pembuat;
            $nama = $this->mastersurat_model->get_user($id)->result_array();
            $nama = $nama[0]['nama_user'];

            $row = array();


            if($field->status == '0')
            {
            	$status = ' <span class="label">Belum Dilihat</span>';
            	$no_dis = '';
            	$field->no_surat = "Belum ada";
            }
            elseif($field->status == '1')
            {
            	$status = ' <span class="label label-success">Sudah dikonfirmasi</span>';
            	$no_dis = 'disabled="true"';
            }
            elseif($field->status == '2')
            {
            	$status = ' <span class="label label-important">Ditolak</span>';
            	$no_dis = 'disabled="true"';
            }
            $row = array(); 
            

            $row[] = $no;
            $row[] = $field->no_surat.$status;
            $row[] = $nama;
            $row[] = $field->perihal;
            $row[] = $field->waktu_dibuat;
            $row[] = '
                <button class="btn btn-sm btn-success m-1" href="javascript:void(0)" title="Konfirmasi" onclick="konfirmasi_surat('."'".$field->id_srt."'".')" '.$no_dis.'><i class="icon-ok icon-white"></i></button>
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
        	if($field->status == 0){
        		$status = ' <span class="label">Nonaktif</span>';
        		$action = '<a class="btn btn-sm btn-success m-1" href="javascript:void(0)" title="Aktivasi" onclick="aktivasi_user('."'".$field->id."'".')"><i class="icon-ok icon-white"></i></a>';
        	}
        	elseif ($field->status == 1) {
        		$status = ' <span class="label label-info">Aktif</span>';
        		$action = '<a class="btn btn-sm btn-danger m-1" href="javascript:void(0)" title="Nonaktifkan" onclick="nonaktif_user('."'".$field->id."','0'".')"><i class="icon-remove icon-white"></i></a>';
        	}
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $field->nip.$status;
            $row[] = $field->nama_user;
            $row[] = $field->email;

            $row[] = $field->departemen.','.$field->jabatan;
            $row[] = $action;


            $row[] = $field->jabatan.', '.$field->departemen;
            $row[] = $action;
                

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
	function api_user()
	{
		$action = $this->input->get('action');
		//AKTIVASI USER
		if($action == 'aktivasi'){
			$id = $this->input->get('id');
			if($this->masteruser_model->aktivasi($id) == 'success')
			{
				$config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'christ.16062@student.unsika.ac.id',
                'smtp_pass' => 'memory543',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        		);

            $this->load->library('email', $config);
				$this->email->from('christ.16062@student.unsika.ac.id', 'Your Name');
				$this->email->to('christmemory5@gmail.com');
				$this->email->set_newline("\r\n");   
				$this->email->subject('Email Test');
				$this->email->message('Testing the email class.');

				if($this->email->send()){
					$data = [
						'Email' => 'Kirim Sukses'
					];
				}
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
		//NONAKTIFKAN USER
		elseif ($action == 'nonaktif') {
			$id = $this->input->get('id');
			if($this->masteruser_model->nonaktif($id) == 'success')
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
