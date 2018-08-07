<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Login_model extends CI_Model
{
  function login_process($data)
  {
    return $this->db->get_where('t_n_usr',$data);
  }
}
