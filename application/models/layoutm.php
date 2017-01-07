<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layoutm extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_home_featured()
	{
		$this->db->select("a.id_screen, a.id_item, b.image");
		$this->db->from("featuredtoitem a, item b");
		$this->db->where("a.category_id_page = 1 and a.id_item = b.id");
		$this->db->order_by("a.id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function get_category_featured($idcat)
	{
		$this->db->select("a.id_screen, a.id_item, b.image");
		$this->db->from("categorytofeatured a, item b, category c");
		$this->db->where("a.category_id_page = 1 and a.id_item = b.id and c.id = a.id_category and c.id = ".$idcat);
		$this->db->order_by("a.id asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_home_categorytoscreen()
	{
		$this->db->select("a.id_category, b.nama");
		$this->db->from("categorytoscreen a, category b");
		$this->db->where("a.category_id_page = 1 and a.id_category = b.id");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	//---------------
	
	function get_home_newsapptoscreen()
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("newsapptoscreen a, item b");
		$this->db->where("a.category_id_page = 1 and a.id_item = b.id");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function get_home_recatoscreen()
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("recatoscreen a, item b");
		$this->db->where("a.category_id_page = 1 and a.id_item = b.id");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function get_home_recbtoscreen()
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("recbtoscreen a, item b");
		$this->db->where("a.category_id_page = 1 and a.id_item = b.id");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
		else
			return array();
	}
	
	function get_cat_newsapptoscreen($idcategory)
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("catnewappstoscreen a, item b");
		$this->db->where("a.id_item = b.id and a.id_category = ".$idcategory);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_cat_recatoscreen($idcategory)
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("catrecatoscreen a, item b");
		$this->db->where("a.id_item = b.id and a.id_category = ".$idcategory);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}
	
	function get_cat_recbtoscreen($idcategory)
	{
		$this->db->select("a.id_item, b.title");
		$this->db->from("catrecbtoscreen a, item b");
		$this->db->where("a.id_item = b.id and a.id_category = ".$idcategory);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
			return array();
	}

	function insert_featureditem($datalayout)
    {
		$this->db->insert('featuredtoitem', $datalayout);
		return $this->db->insert_id();
    }
    
    function insert_featuredcat($datalayout)
    {
    	$this->db->insert('categorytofeatured', $datalayout);
    	return $this->db->insert_id();
    }
	
	function delete_featureditem($idcategorypage)
	{
		$this->db->where('category_id_page', $idcategorypage);
		$this->db->delete('featuredtoitem'); 
	}
	
	function delete_featuredcat($idcategorypage)
	{
		$this->db->where('id_category', $idcategorypage);
		$this->db->delete('categorytofeatured');
	}
	
	function insert_catscreen($dataapp)
    {
		$this->db->insert('categorytoscreen', $dataapp);
		return $this->db->insert_id();
    }
	
	function delete_catscreen($idcategorypage)
	{
		$this->db->where('category_id_page', $idcategorypage);
		$this->db->delete('categorytoscreen'); 
	}
	
	function insert_newsapp($dataapp)
    {
		$this->db->insert('newsapptoscreen', $dataapp);
		return $this->db->insert_id();
    }
    
    function insert_newcatapps($dataapp)
    {
    	$this->db->insert('catnewappstoscreen', $dataapp);
    	return $this->db->insert_id();
    }
	
    function delete_newsapp($idcategorypage)
    {
    	$this->db->where('category_id_page', $idcategorypage);
    	$this->db->delete('newsapptoscreen');
    }
    
	function delete_catnewcatapp($idcategorypage)
	{
		$this->db->where('id_category', $idcategorypage);
		$this->db->delete('catnewappstoscreen');
	}
	
	function insert_reca($dataapp)
    {
		$this->db->insert('recatoscreen', $dataapp);
		return $this->db->insert_id();
    }
    function delete_reca($idcategorypage)
    {
    	$this->db->where('category_id_page', $idcategorypage);
    	$this->db->delete('recatoscreen');
    }
    
    function insert_catreca($dataapp)
    {
    	$this->db->insert('catrecatoscreen', $dataapp);
    	return $this->db->insert_id();
    }
	
	function delete_catreca($idcategorypage)
	{
		$this->db->where('id_category', $idcategorypage);
		$this->db->delete('catrecatoscreen'); 
	}
	
	function insert_recb($dataapp)
    {
		$this->db->insert('recbtoscreen', $dataapp);
		return $this->db->insert_id();
    }
    function delete_recb($idcategorypage)
    {
    	$this->db->where('category_id_page', $idcategorypage);
    	$this->db->delete('recbtoscreen');
    }
    
    function insert_catrecb($dataapp)
    {
    	$this->db->insert('catrecbtoscreen', $dataapp);
    	return $this->db->insert_id();
    }
	
	function delete_catrecb($idcategorypage)
	{
		$this->db->where('id_category', $idcategorypage);
		$this->db->delete('catrecbtoscreen'); 
	}
	
	function update_user($iccid,$istatus)
    {
		$data = array(
			'istatus' => $istatus
		);
		$this->db->where("iccid = '".$iccid."'");
		return $this->db->update('t_trx_scan_in_detail', $data);
    }
}

?>