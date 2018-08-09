<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profil_model extends CI_Model
{
 	public function get_profile($id)
 	{
 		$this->db->where('id', $id);
 		return $this->db->get('t_n_usr')->result_array();
 	}
}
