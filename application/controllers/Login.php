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
		//Form validation rules
		$this->form_validation->set_rules('email', 'Email', 'required','xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required','xss_clean');

		//Form validation message
		$this->form_validation->set_message( 'required' ,  'Anda Tidak Boleh Mengosongkan Field!' );
		$this->form_validation->set_message( 'xss_clean' ,  'Jangan coba-coba!' );

		if ($this->form_validation->run() == FALSE)
      	{
        	return $this->index();
      	}
      	else {
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
					return $this->notactive();
				}
				else{
					if($dt[0]['departemen'] == 'bagian_umum')
					{
						redirect(base_url('dashboard'));
					}
					else {
						redirect(base_url('home'));
					}
				}

			}
			else {
				return $this->index();
			}
      	}
	}
}
