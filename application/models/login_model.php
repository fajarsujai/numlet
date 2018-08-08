<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Login_model extends CI_Model
{
  function login_process($data)
  {
    return $this->db->get_where('t_n_usr',$data);
  }
  function get_userdata($email,$password)
  {
    $this->db->select('id');
    $this->db->where('email', $email);
    $this->db->where('password' ,$password);
    return $this->db->get('t_n_usr')->result_array();
  }
}
