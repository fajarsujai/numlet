<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
	}
	public function index()
	{
		$data = [
			"p_title" 	=> "Login | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/plogin"
		];
		$this->load->view('layout/layout_form',$data);
	}

	public function auth()
	{
		/*//Form validation rules
		$this->form_validation->set_rules('email', 'Email', 'required','xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required','xss_clean');

		//Form validation message
		$this->form_validation->set_message( 'required' ,  'Anda Tidak Boleh Mengosongkan Field!' );
		$this->form_validation->set_message( 'xss_clean' ,  'Jangan coba-coba!' );*/

		/*if ($this->form_validation->run() == FALSE)
      	{
        	return $this->index();
      	}
      	else {*/
      		$email = $this->input->post('email');
			$password = $this->input->post('password');

			$password = hash('md5', $password);

			$data = [
				"email" => $email,
				"password" => $password
			];
			if($this->login_model->login_process($data)->num_rows() > 0)
			{
				$dt = $this->login_model->login_process($data)->result_array();
				if($dt[0]['status'] == 0 )
				{
					redirect(base_url('login/notactive'));
				}
				else{
					if($dt[0]['level'] == 1)
					{
						$id = $this->login_model->get_userdata($email,$password);
						$id = $id[0]['id'];
						$data_session = [
							"email" => $email,
							"status" => "login",
							"id" => $id
						];
						$this->session->set_userdata($data_session);
						redirect(base_url('dashboard'));
					}
					else {
						$id = $this->login_model->get_userdata($email,$password);
						$id = $id[0]['id'];
						$data_session = [
							"email" => $email,
							"status" => "login",
							"id" => $id
						];
						$this->session->set_userdata($data_session);
						redirect(base_url('home'));
					}
				}

			}
			else {
				$this->session->set_flashdata('message', 'Email/Password Salah!');
				redirect(base_url());
			}
      	#}
	}

	public function nonactive()
	{
		$data = [
			"p_title" 	=> "Akun Nonaktif | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pnonactive"
		];
		$this->load->view('layout/layout_form',$data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
