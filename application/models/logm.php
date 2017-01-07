<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logm extends CI_Model {
	
	function insert_log($datasource)
	{
		$this->db->insert("data_log", $datasource);
		return $this->db->insert_id();
	}
}

?>