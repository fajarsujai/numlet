<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile_model extends CI_Model
{
  function show_profile(){
        $hasil=$this->db->query("SELECT * FROM t_n_usr");
        return $hasil;
    }
}
