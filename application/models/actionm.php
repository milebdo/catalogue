<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actionm extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function record_count() {
    	$num = $this->db->count_all('data_log');
		return $num;
    }
    
    function rec_count() {
    	return $this->db->count_all('actionset');
    }
    
    function read_data($limit, $start)
    {
    	$this->db->limit($limit, $start);
    	$this->db->select("*");
    	$this->db->order_by("id asc");
    	$query = $this->db->get('actionset');
    	if ($query->num_rows() > 0) {
    		foreach ($query->result_array() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}else{
    		return null;
    	}
    }
    
    function read_records($limit, $start)
    {
    	$this->db->limit($limit, $start);
    	$this->db->select("a.title, a.icon, b.nama, d.id, d.imsi, d.date");
    	$this->db->where("a.id_category = b.id and d.id_item = a.id");
    	$query = $this->db->get("item a, category b, data_log d");
    	if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}else{
			return null;
		}
    }
    
	function read_action()
	{
		$this->db->select('*');
		$this->db->from('actionset');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function read_act()
	{
		$this->db->select('*');
		$this->db->from('reg');
		$this->db->order_by("id","asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
    
    function get_data($id)
    {
    	$this->db->select("id_set, wait, shortcode, message, tracking");
    	$this->db->from("reg");
    	$this->db->where("id_set",$id);
    	$this->db->order_by("id asc");
    
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
    
    function get_action($idget)
    {
    	$this->db->select("*");
    	$this->db->from("actionset");
    	$this->db->where("id", $idget);
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
	
	function get_pass()
	{
		$this->db->select("*");
		$this->db->from("user");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_limit($idget)
	{
		$this->db->select("id");
		$this->db->from("limiter");
		$this->db->where("id",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function get_slimit($idget)
	{
		$this->db->select("id");
		$this->db->from("sms_limiter");
		$this->db->where("id",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	//-----------
	function get_smsx()
	{
		$this->db->select("*");
		$this->db->from("smsdisclaimer");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	//-----------
	
	function get_sms($idget)
	{
		$this->db->select("id");
		$this->db->from("smsdisclaimer");
		$this->db->where("id",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function update_title($datasource,$id)
	{
		$this->db->where("id", $id);
		return $this->db->update('title', $datasource);
	}
	
	function get_title($id)
	{
		$this->db->select("id, ntitle");
		$this->db->from("title");
		$this->db->where("id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function read_limit()
	{
		$this->db->select("id, time, type");
		$this->db->from("limiter");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function read_slimit()
	{
		$this->db->select("id, time");
		$this->db->from("sms_limiter");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function read_disc()
	{
		$this->db->select("*");
		$this->db->from("smsdisclaimer");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	

	function regdis()
	{
		$this->db->select("id, iddisc");
		$this->db->from("reg_disc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function read_title()
	{
		$this->db->select("id, ntitle");
		$this->db->from("title");
		$this->db->order_by("id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function actionparent($id)
	{
		$this->db->select("id_set");
		$this->db->from("reg");
		$this->db->where("id_set", $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			foreach($query->result_array() as $getid)
			{
				return $getid['id_set'];
			}
		}
		else
			return 0;
	}
	
	function insert_limit($datasource)
	{
		$this->db->insert('limiter', $datasource);
		return $this->db->insert_id();
	}
	function insert_slimit($datasource)
	{
		$this->db->insert('sms_limiter', $datasource);
		return $this->db->insert_id();
	}
	function insert_sms($datasource)
	{
		$this->db->insert('smsdisclaimer', $datasource);
		return $this->db->insert_id();
	}
	
	function insert_title($datasource)
	{
		$this->db->insert('title', $datasource);
		return $this->db->insert_id();
	}
	
	function delete_limit($datasource)
	{
		$this->db->where('id', $datasource);
		$this->db->delete('limiter');
	}
	function delete_slimit($datasource)
	{
		$this->db->where('id', $datasource);
		$this->db->delete('sms_limiter');
	}
	
	function delete_sms($datasource)
	{
		$this->db->where('id', $datasource);
		$this->db->delete('smsdisclaimer');
	}
	
	function delete_reg($datasource)
	{
		$this->db->where('id_set', $datasource);
		$this->db->delete('reg');
	}
	
	function update_limit($dataapp, $idf)
	{
		$this->db->where("id", $idf);
    	return $this->db->update('limiter', $dataapp);
	}
	function update_pass($dataapp, $idf)
	{
		$this->db->where("id", $idf);
		return $this->db->update('user', $dataapp);
	}
	function update_slimit($dataapp, $idf)
	{
		$this->db->where("id", $idf);
		return $this->db->update('sms_limiter', $dataapp);
	}
	
	function update_sms($dataapp, $idf)
	{
		$this->db->where("id", $idf);
		return $this->db->update('smsdisclaimer', $dataapp);
	}
	
	function update_actionset($dataapp, $id)
	{
		$this->db->where("id", $id);
		return $this->db->update('actionset', $dataapp);
	}
	
	function add_action($datasource)
	{
		$this->db->insert('actionset', $datasource);
		return $this->db->insert_id();
	}
	
	function add_reg($datasource)
	{
		$this->db->insert('reg', $datasource);
		return $this->db->insert_id();
	}
	
	function update_action($datasource,$iditem)
	{
		$this->db->where("id", $iditem);
		return $this->db->update('reg', $datasource);
	}
	
	function delete_action($kode)
	{
		$this->db->where('id', $kode);
		$this->db->delete('actionset');
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	function getitemcategoryreg()
	{
		$this->db->select('r.shortcode, r.message, r.wait, r.tracking');
		$this->db->from('actionset i, reg r');
		$this->db->where('i.id = r.id_set');
		$this->db->order_by("i.id asc");
		$this->db->order_by("r.id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
}

?>
