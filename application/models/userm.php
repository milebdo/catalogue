<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userm extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	function cek_user($username,$password)
	{
		$this->db->select("id, usrname, passwd");
		$this->db->from("user");
		$this->db->where("usrname = '".$username."' and passwd = md5('".$password."')");
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