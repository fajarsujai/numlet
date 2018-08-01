<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __Construct(){
	 parent::__Construct();
	 $this->load->helper(array('form', 'url'));
	 $this->load->library(array('session', 'form_validation', 'email'));
	 $this->load->database();
	 $this->load->model('register_model');
		}


	public function index()
	{
		$data = [
			"p_title" 	=> "Register | Sistem Informasi Surat Keluar",
			"p_content"	=> "pages/pregister"
		];
		$this->load->view('layout/layout_form',$data);
	}


   public function registration()
   {
    //validate input value with form validation class of codeigniter
    $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[t_n_usr.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('konfirmasi_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('departemen', 'Departemen', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation -> set_message ( 'required' ,  'Anda Tidak Boleh Mengosongkan Field!' );
		$this->form_validation -> set_message ( 'is_unique' ,  'Email Sudah Terpakai!' );
		$this->form_validation -> set_message ( 'matches' ,  'Password Tidak Sama!' );
		$this->form_validation -> set_message ( 'min_length' ,  'Password Minimal {param} Karakter!' );

      //$this->form_validation->set_message('is_unique', 'This %s is already exits');
      if ($this->form_validation->run() == FALSE)
      {
        return $this->index();
      }
      else
      {
        $nama_user = $_POST['nama_user'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passhash = hash('md5', $password);
				$nip = $_POST['nip'];
				$departemen = $_POST['departemen'];
				$jabatan = $_POST['jabatan'];
        //md5 hashing algorithm to decode and encode input password
        //$salt    = uniqid(rand(10,10000000),true);
     $saltid   = md5($email);
     $status   = 0;

		 //memasukan data ke database
     $data = array('nama_user' => $nama_user,
         'email' => $email,
         'password' => $passhash,
				 'nip' => $nip,
				 'departemen' => $departemen,
				 'jabatan' => $jabatan,
         'status' => $status);


     if($this->register_model->insertuser($data))
     {
      if($this->sendemail($email, $saltid))
      {
       // successfully sent mail to user email
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');
            redirect(base_url());
      }
      else
      {
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');
            redirect(base_url());
          }
     }
     else
     {
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
            redirect(base_url());
     }
      }
   }


   function sendemail($email,$saltid){
    // configure the email setting
    	$config['protocol'] = 'smtp';
      $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
      $config['smtp_port'] = '465'; //smtp port number
      $config['smtp_user'] = 'riyadramadhan31@gmail.com';
      $config['smtp_pass'] = 'septemberrain'; //$from_email password
      $config['mailtype'] = 'html';
      $config['charset'] = 'iso-8859-1';
      $config['wordwrap'] = TRUE;
      $config['newline'] = "\r\n"; //use double quotes
      $this->email->initialize($config);
      $url = base_url()."Register/confirmation/".$saltid;
      $this->email->from('riyadramadhan31@gmail.com', 'CodesQuery');
    $this->email->to($email);
    $this->email->subject('Please Verify Your Email Address');
    $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";
    $this->email->message($message);
    return $this->email->send();
    }

    public function confirmation($key)
    {
      if($this->register_model->verifyemail($key))
      {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
        redirect(base_url());
      }
      else
      {
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
        redirect(base_url());
      }
    }

}
