<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorym extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function record_count() {
    	$num = $this->db->count_all('category');
		return $num-1;
    }
    
    function read_data($limit, $start)
    {
    	$this->db->limit($limit, $start);
    	$this->db->where("id_parent != 0");
    	$this->db->order_by("id desc");
    	$query = $this->db->get('category');
    	if ($query->num_rows() > 0) {
    		foreach ($query->result() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}else{
    		return null;
    	}
    }

	function findall()
	{
		$this->db->select("id, nama");
		$this->db->from("category");
		$this->db->where("id_parent != 0");
		$this->db->order_by("id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function get_category($id)
	{
		$this->db->select("id, nama, icon");
		$this->db->from("category");
		$this->db->where("id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function update_category($datasource,$idcategory)
	{
		$this->db->where("id", $idcategory);
		return $this->db->update('category', $datasource);
	}
	
	function categoryselected($idselect)
	{
		$this->db->select("id, nama, icon");
		$this->db->from("category");
		$this->db->where("id_parent != 0 and id = ".$idselect);
		$this->db->order_by("id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_data($kode)
    {
    	$this->db->where('id', $kode);
    	$query = $this->db->get('category');
    	if($query->num_rows() > 0){
    		return $query->row();
    	}
    	else{
    		return null;
    	}
    }
	
	function get_title($kode)
    {
    	$this->db->where('id', $kode);
    	$query = $this->db->get('title');
    	if($query->num_rows() > 0){
    		return $query->row();
    	}
    	else{
    		return null;
    	}
    }
    
	function delete_title($datasource)
	{
		$this->db->where('id', $datasource);
		$this->db->delete('title');
	}
	
    function delete_category($kode)
    {
    	$this->db->where('id', $kode);
    	$this->db->delete('category');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
	
	function add_category($datasource)
	{
		$this->db->insert('category', $datasource);
		return $this->db->insert_id();
	}
	
	function add_title($datasource)
	{
		$this->db->insert('title', $datasource);
		return $this->db->insert_id();
	}
}

?>