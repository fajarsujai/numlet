<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mastersurat_model extends CI_Model
{
	//DATATABLES
    var $table = 't_n_srt'; 
    var $column_order = array(null,'id_srt', 'no_surat','perihal','tujuan','pembuat','status','waktu_dibuat'); 
    var $column_search = array('no_surat','perihal','tujuan','pembuat','status','waktu_dibuat'); 
    var $order = array('id_srt' => 'desc');  
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    //DATATABLES

    public function get_user($id)
    {
        $this->db->select('nama_user');
        $this->db->where('id',$id);
        return $this->db->get('t_n_usr');
    }
    public function konfirmasi($id)
    {
        $data = [
            'status' => 1,
            'waktu_konfir' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_srt',$id);
        $do = $this->db->update('t_n_srt',$data);
        if($do)
        {
            return "success";
        }
        else {
            return "false";
        }
    }
    public function tolak($id)
    {
        $data = [
            'status' => 2,
        ];
        $this->db->where('id_srt',$id);
        $do = $this->db->update('t_n_srt',$data);
        if($do)
        {
            return "success";
        }
        else {
            return "false";
        }
    }
    function update_data($data,$id)
    {
        $this->db->where('id_srt',$id);
        return $this->db->update('t_n_srt',$data);
    }
    public function detail($id)
    {
        $this->db->where('id_srt',$id);
        return $this->db->get('t_n_srt')->result_array();
    }
}