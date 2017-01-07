<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Itemm extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function record_count() {
    	return $this->db->count_all('item');
    }

	function findall()
	{
		$this->db->select("*");
		$this->db->from("item");
		$this->db->order_by("id desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function finditembyid($iditem)
	{
		$this->db->select("*");
		$this->db->from("item");
		$this->db->where("id = ".$iditem);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function findallbycategory($idcategory)
	{
		$this->db->select("i.*");
		$this->db->from("item i, category c");
		$this->db->where("i.id_category = c.id and c.id = ".$idcategory);
		$this->db->order_by("i.id desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function read_data($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by("id desc");
		$query = $this->db->get('item');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}else{
			return null;
		}
	}
	
	function get_item($idget)
	{
		$this->db->select("*");
		$this->db->from("item");
		$this->db->where("id",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	function get_480($idget)
	{
		$this->db->select("*");
		$this->db->from("ico_480");
		$this->db->where("iditem",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function get_320($idget)
	{
		$this->db->select("*");
		$this->db->from("ico_320");
		$this->db->where("iditem",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function get_240($idget)
	{
		$this->db->select("*");
		$this->db->from("ico_240");
		$this->db->where("iditem",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function get_220($idget)
	{
		$this->db->select("*");
		$this->db->from("ico_220");
		$this->db->where("iditem",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	function get_176($idget)
	{
		$this->db->select("*");
		$this->db->from("ico_176");
		$this->db->where("iditem",$idget);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function add_item($datasource)
    {
		$this->db->insert('item', $datasource);
		return $this->db->insert_id();
    }
    
    function add_img480($datasource)
    {
    	$this->db->insert('ico_480', $datasource);
    	return $this->db->insert_id();
    }
    function add_img320($datasource)
    {
    	$this->db->insert('ico_320', $datasource);
    	return $this->db->insert_id();
    }
    function add_img240($datasource)
    {
    	$this->db->insert('ico_240', $datasource);
    	return $this->db->insert_id();
    }
    function add_img220($datasource)
    {
    	$this->db->insert('ico_220', $datasource);
    	return $this->db->insert_id();
    }
    function add_img176($datasource)
    {
    	$this->db->insert('ico_176', $datasource);
    	return $this->db->insert_id();
    }

	function update_item($datasource,$iditem)
    {
		$this->db->where("id", $iditem);
		return $this->db->update('item', $datasource);
    }
    function update_img480($datasource,$iditem)
    {
    	$this->db->where("iditem", $iditem);
    	return $this->db->update('ico_480', $datasource);
    }
    function update_img320($datasource,$iditem)
    {
    	$this->db->where("iditem", $iditem);
    	return $this->db->update('ico_320', $datasource);
    }
    function update_img240($datasource,$iditem)
    {
    	$this->db->where("iditem", $iditem);
    	return $this->db->update('ico_240', $datasource);
    }
    function update_img220($datasource,$iditem)
    {
    	$this->db->where("iditem", $iditem);
    	return $this->db->update('ico_220', $datasource);
    }
    function update_img176($datasource,$iditem)
    {
    	$this->db->where("iditem", $iditem);
    	return $this->db->update('ico_176', $datasource);
    }
    
    function get_data($kode)
    {
    	$this->db->where('id', $kode);
    	$query = $this->db->get('item');
    	if($query->num_rows() > 0){
    		return $query->row();
    	}
    	else{
    		return null;
    	}
    }
    
    function delete_tofeatured($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('featuredtoitem');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_toreca($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('recatoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_torecb($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('recbtoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_tocfeatured($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('categorytofeatured');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_tocreca($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('catrecatoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_tocrecb($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('catrecbtoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_tonew($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('newappstoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_tocnew($kode)
    {
    	$this->db->where('id_item', $kode);
    	$this->db->delete('catnewappstoscreen');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    function delete_item($kode)
    {
    	$this->db->where('id', $kode);
    	$this->db->delete('item');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function delete_480($kode)
    {
    	$this->db->where('iditem', $kode);
    	$this->db->delete('ico_480');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function delete_320($kode)
    {
    	$this->db->where('iditem', $kode);
    	$this->db->delete('ico_320');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function delete_240($kode)
    {
    	$this->db->where('iditem', $kode);
    	$this->db->delete('ico_240');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function delete_220($kode)
    {
    	$this->db->where('iditem', $kode);
    	$this->db->delete('ico_220');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    function delete_176($kode)
    {
    	$this->db->where('iditem', $kode);
    	$this->db->delete('ico_176');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
}

?>