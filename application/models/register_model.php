<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class register_model extends CI_Model
{
 public function insertuser($data)
 {
  return $this->db->insert('t_n_usr', $data);
 }

 public function verifyemail($key)
  {
   $data = array('status' => 1);
     $this->db->where('md5(email)', $key);
     return $this->db->update('t_n_usr', $data);
  }
 }
